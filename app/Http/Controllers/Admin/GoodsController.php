<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GoodsRequest;
use App\Models\Brand;
use App\Models\GoodsCategory;
use App\Models\Products;
use App\Models\Spec;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Goods;
use Illuminate\Http\Response;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $condition = $request->input('condition');      //商品名称
        $bn = $request->input('bn');                    //编码
        $marketable = $request->input('marketable');    //是否上架
        $currentPage = $request->input('current_page'); //当前页
        $perPage = $request->input('per_page');         //每页显示数量
        $query = Goods::when($condition != '', function ($query) use ($condition) {
            return $query->where('name', 'like', '%'.$condition.'%');
        })
            ->when($bn != '', function ($query) use ($bn) {
                return $query->where('bn', '%'.$bn.'%');
            })
            ->when($marketable == 1 || $marketable == 2, function ($query) use ($marketable) {
                return $query->where('marketable', $marketable);
            });
        $query->orderBy('created_at', 'desc');
        $goods = self::paginator($query, $currentPage, $perPage);
        foreach ($goods as $good) {
            $good->product;
        }
        return Helper::Json(1, '查询成功', ['goods' => $goods]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return JsonResponse
     */
    public function create()
    {
        $cateModel = new GoodsCategory();
        $cates = $cateModel->getCatesWithPrefix();
        $spec = Spec::all();
        $brand = Brand::all();
        return Helper::Json(1, '查询成功', ['cates' => $cates, 'spec' => $spec, 'brand' => $brand]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  GoodsRequest  $request
     * @return JsonResponse
     */
    public function store(GoodsRequest $request)
    {
        $goods = $request->except('products');
        if (is_array($goods['pics'] && empty($goods['label_ids']))) {
            $goods['pics'] = implode(',', $goods['pics']);
        } else {
            $goods['pics'] = '';
        }
        if (is_array($goods['label_ids'] && empty($goods['label_ids']))) {
            $goods['label_ids'] = implode(',', $goods['label_ids']);
        } else {
            $goods['label_ids'] = '';
        }
        $sn = date('Ymd').(Goods::max('id') + 1).rand(100, 999);
        if (!$goods || $goods['bn'] == null) {
            $goods['bn'] = 'G_'.$sn;
        }
        $goods['up_at'] = now()->toDateTimeString();
        $goods = Goods::create($goods);

        if (is_array($products = $request->input('products'))) {
            $stock = 0;
            $freezeStock = 0;
            foreach ($products as $key => $product) {
                $product = json_decode($product, true);
                $product['spec_params'] = json_encode($product['spec_params'],JSON_UNESCAPED_UNICODE);
                $stock += $product['stock'];
                $freezeStock += $product['freeze_stock'];
                $product['goods_id'] = $goods->id;
                //生成货号
                if (!isset($product['barcode']) || $product['barcode'] == null) {
                    $product['barcode'] = 'P_'.$sn.($key + 1);
                }
                Products::create($product);
            }
            $goods->stock = $stock;
            $goods->freeze_stock = $freezeStock;
            $goods->save();
        }
        $goods->product;
        return Helper::Json(1, '创建成功', ['goods' => $goods]);
    }

    /**
     * Display the specified resource.
     *
     * @param  GoodsRequest  $id
     * @return JsonResponse
     */
    public function show(GoodsRequest $id)
    {
        $goods = Goods::find($id);
        $goods[0]->product->where('is_del',1)->first();
        return Helper::Json(1, '查询成功', ['goods' => $goods]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  GoodsRequest  $id
     * @return JsonResponse
     */
    public function edit(GoodsRequest $id)
    {
        $cateModel = new GoodsCategory();
        $cates = $cateModel->getCatesWithPrefix();
        $spec = Spec::all();
        $brand = Brand::all();
        $goods = Goods::find($id);
        $goods[0]->product;
        return Helper::Json(1, '查询成功', ['cates' => $cates, 'spec' => $spec, 'brand' => $brand, 'goods' => $goods]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  GoodsRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(GoodsRequest $request, $id)
    {
        $data = $request->except('products');
        if (is_array($data['pics'] && empty($data['label_ids']))) {
            $data['pics'] = implode(',', $data['pics']);
        } else {
            unset($data['pics']);
        }
        if (is_array($data['label_ids'] && empty($data['label_ids']))) {
            $data['label_ids'] = implode(',', $data['label_ids']);
        } else {
            unset($data['label_ids']);
        }
        if (!$data['bn'] || $data['bn'] == null) {
            unset($data['bn']);
        }
        $goods = Goods::find($id);

        $num = Products::where('goods_id', $id)->count();
        $sn = strstr($goods->bn, '_');
        $productIds = array_reduce(Products::where('goods_id', $id)->get('id')->toArray(), function ($result, $value) {
            return array_merge($result, array_values($value));
        }, array()); //把二维数组的值转成一位数组
        if (is_array($products = $request->input('products'))) {
            $stock = $goods->stock;
            $freezeStock = $goods->freeze_stock;
            $ids = [];
            foreach ($products as $key => $product) {
                $product = json_decode($product, true);
                $product['spec_params'] = json_encode($product['spec_params'],JSON_UNESCAPED_UNICODE); //数组格式转成json
                if (!isset($product['id'])) {  //ID不存在  新增规格
                    $stock += $product['stock'];

                    $freezeStock += $product['freeze_stock'];
                    $product['goods_id'] = $goods->id;
                    //生成货号
                    if (!isset($product['barcode']) || $product['barcode'] == null) {
                        $product['barcode'] = 'P'.$sn.($num += 1);
                    }
                    Products::create($product);
                } else {
                    if (in_array($product['id'], $productIds)) { //ID存在  更新规格
                        $ids[] = $product['id']; //把存在的ID加入数组
                        $prod = Products::find($product['id']);
                        $stock -= $prod->stock;
                        $freezeStock -= $prod->freeze_stock;
                        $stock += $product['stock'];
                        $freezeStock += $product['freeze_stock'];
                        $prod->fill($product);
                        $prod->save();
                    }
                }

            }
            $noIds = array_diff($productIds, $ids);
            $noProds = Products::whereIn('id', $noIds)->where('is_del',0)->get();
            foreach ($noProds as $noProd) {
                $stock -= $noProd->stock;
                $freezeStock -= $noProd->freeze_stock;
                $noProd->is_del = 1;
                $noProd->save();
            }

            $data['stock'] = $stock;
            $data['freeze_stock'] = $freezeStock;
        }
        $goods->fill($data);
        $goods->save();
        $goods->product;
        return Helper::Json(1, '更新成功', ['goods' => $goods]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        if (!$goods = Goods::find($id)) {
            return Helper::Json(-1, '删除失败,ID参数错误');
        }
        if ($goods->is_del == 1) {
            return Helper::Json(-1, '该商品已被删除');
        }
        $goods->is_del = 1;
        $goods->save();
        return Helper::Json(1, '删除成功', ['goods' => $goods]);
    }
}
