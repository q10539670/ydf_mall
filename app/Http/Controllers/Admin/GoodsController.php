<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GoodsRequest;
use App\Models\Brand;
use App\Models\GoodsCategory;
use App\Models\Images;
use App\Models\Products;
use App\Models\Spec;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Goods;

/**
 * @group Goods
 * 商品接口
 * @package App\Http\Controllers\Admin
 */
class GoodsController extends Controller
{
    /**
     * index
     * 商品列表
     *
     * @queryParam  condition 商品名称  No-example
     * @queryParam  bn 编码 No-example
     * @queryParam  marketable 是否上架 Example: 1
     * @queryParam  current_page required 当前页 Example: 1
     * @queryParam  per_page required 每页显示数量 Example: 10
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
            foreach ($good->product as $product){
                $product->image;
            }
            $pics = explode(',',$good->pics);
            $good['pics'] = Images::whereIn('id',$pics)->get();
            $good->image;
            $good->category;
            $good->type;
            $good->brand;
        }
        return Helper::Json(1, '查询成功', ['goods' => $goods]);
    }

    /**
     * create
     * 创建
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
     * show
     * 查询商品(单一)
     * @urlParam good required 商品ID Example:1
     *
     * @param  GoodsRequest  $id
     * @return JsonResponse
     */
    public function show(GoodsRequest $id)
    {
        $goods = Goods::find($id);
        $goods[0]->product->where('is_del', 1)->first();
        $pics = explode(',',$goods[0]->pics);
        $goods[0]['pics'] = Images::whereIn('id',$pics)->get();
        $goods[0]->image;
        $goods[0]->category;
        $goods[0]->type;
        $goods[0]->brand;
        return Helper::Json(1, '查询成功', ['goods' => $goods]);

    }

    /**
     * edit
     * 编辑商品
     * @urlParam good required 商品ID Example:1
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
     * store
     * 保存商品
     *
     * @bodyParam bn string 商品编码 No-example
     * @bodyParam name string required 商品名称 Example: 三星S10 5G
     * @bodyParam brief string 商品简介 Example: 这是一款神奇的手机
     * @bodyParam price float required 商品价格 Example: 3688.00
     * @bodyParam costprice float required 成本价 Example: 0.00
     * @bodyParam mktprice float required 市场价 Example: 0.00
     * @bodyParam image_id int required 商品主图 Example: 1
     * @bodyParam pics array required 商品图片 Example: [2,3,4]
     * @bodyParam goods_category_id int required 商品分类ID Example: 32
     * @bodyParam goods_type_id int required 商品类型ID Example: 10
     * @bodyParam brand_id int  required 品牌ID Example: 1
     * @bodyParam marketable int 上架标志[1:上架, 2:下架] Example: 1
     * @bodyParam stock int 库存 Example: 100
     * @bodyParam freeze_stock int 冻结库存 Example: 100
     * @bodyParam weight float 重量 Example: 123.5
     * @bodyParam unit string 单位 Example: 克
     * @bodyParam introduction longtext 商品详情 Example: 这是详情
     * @bodyParam sort int required 商品排序 越小越靠前 Example: 100
     * @bodyParam is_recommend int 推荐标志[1:推荐,2:不推荐] Example: 1
     * @bodyParam is_hot int 热门标志[1:是,2:不是] Example: 2
     * @bodyParam is_selected int 精选标志[1:是,2:不是] Example: 2
     * @bodyParam label_ids array 标签ID No-example
     * @bodyParam spec_list varchar 商品规格-当前选中 Example: {"key":"颜色","value":["黑色","白色"]},{"key":"内存","value":["2G","8G"]}
     * @bodyParam spec_desc varchar 商品规格-所有 Example: {"key":"颜色","value":["黑色","白色","金色"]},{"key":"内存","value":["2G","4G","8G]"}
     * @bodyParam is_del int 删除标志[0:正常, 1:删除] Example: 0
     * @bodyParam products array 规格详情 Example: [{"barcode":"","price":"100","costprice":"0","mktprice":"0","stock":"50","freeze_stock":"5","spec_params":[{"key":"颜色","value":"黑色"},{"key":"内存","value":"2G"}],"is_default":"1","image_id":"2","is_del":"0"},{"barcode":"","price":"120","costprice":"0","mktprice":"0","stock":"10","freeze_stock":"2","spec_params":[{"key":"颜色","value":"黑色"},{"key":"内存","value":"4G"}],"is_default":"2","image_id":"3","is_del":"0"}]
     * @param  GoodsRequest  $request
     * @return JsonResponse
     * @response {
    "code": 1,
    "message": "创建成功",
    "data": {
    "goods": {
    "bn": "G_202007142919",
    "name": "三星S10 5G",
    "price": "100.00",
    "costprice": "0.00",
    "mktprice": "0.00",
    "image_id": "1",
    "pics": "",
    "goods_category_id": "32",
    "goods_type_id": "1",
    "brand_id": "1",
    "marketable": "1",
    "stock": 180,
    "freeze_stock": 30,
    "weight": "123.5",
    "unit": "克",
    "introduction": null,
    "sort": "100",
    "is_recommend": "2",
    "is_hot": "1",
    "label_ids": "",
    "spec_list": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\"]}",
    "spec_desc": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\",\"金色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
    "up_at": "2020-07-14 10:22:05",
    "updated_at": "2020-07-14 10:22:05",
    "created_at": "2020-07-14 10:22:05",
    "id": 2,
    "product": [
    {
    "id": 7,
    "goods_id": 2,
    "barcode": "P_2020071429191",
    "sku_code": "",
    "price": "100.00",
    "costprice": "0.00",
    "mktprice": "0.00",
    "marketable": 1,
    "stock": 50,
    "freeze_stock": 5,
    "spec_params": "[{\"key\":\"颜色\",\"value\":\"黑色\"},{\"key\":\"内存\",\"value\":\"2G\"}]",
    "is_default": 1,
    "image_id": 2,
    "created_at": "2020-07-14 10:22:05",
    "updated_at": "2020-07-14 10:22:05",
    "is_del": 0
    },
    {
    "id": 8,
    "goods_id": 2,
    "barcode": "P_2020071429192",
    "sku_code": "",
    "price": "120.00",
    "costprice": "0.00",
    "mktprice": "0.00",
    "marketable": 1,
    "stock": 10,
    "freeze_stock": 2,
    "spec_params": "[{\"key\":\"颜色\",\"value\":\"黑色\"},{\"key\":\"内存\",\"value\":\"4G\"}]",
    "is_default": 2,
    "image_id": 3,
    "created_at": "2020-07-14 10:22:05",
    "updated_at": "2020-07-14 10:22:05",
    "is_del": 0
    },
    {
    "id": 9,
    "goods_id": 2,
    "barcode": "P_2020071429193",
    "sku_code": "",
    "price": "100.00",
    "costprice": "0.00",
    "mktprice": "0.00",
    "marketable": 1,
    "stock": 90,
    "freeze_stock": 18,
    "spec_params": "[{\"key\":\"颜色\",\"value\":\"白色\"},{\"key\":\"内存\",\"value\":\"2G\"}]",
    "is_default": 2,
    "image_id": 4,
    "created_at": "2020-07-14 10:22:05",
    "updated_at": "2020-07-14 10:22:05",
    "is_del": 0
    },
    {
    "id": 10,
    "goods_id": 2,
    "barcode": "P_2020071429194",
    "sku_code": "",
    "price": "150.00",
    "costprice": "0.00",
    "mktprice": "0.00",
    "marketable": 1,
    "stock": 30,
    "freeze_stock": 5,
    "spec_params": "[{\"key\":\"颜色\",\"value\":\"白色\"},{\"key\":\"内存\",\"value\":\"4G\"}]",
    "is_default": 2,
    "image_id": 5,
    "created_at": "2020-07-14 10:22:05",
    "updated_at": "2020-07-14 10:22:05",
    "is_del": 0
    }
    ]
    }
    }
     * }
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
                $product['spec_params'] = json_encode($product['spec_params'], JSON_UNESCAPED_UNICODE);
                $stock += $product['stock'];
                $freezeStock += $product['freeze_stock'];
                $product['goods_id'] = $goods->id;
                //生成货号
                if (!isset($product['sn']) || $product['sn'] == null) {
                    $product['sn'] = 'P_'.$sn.($key + 1);
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
     * update
     * 更新商品
     * @urlParam good required 商品ID Example:2
     * @bodyParam bn string 商品编码 No-example
     * @bodyParam name string required 商品名称 Example: 三星S10 5G
     * @bodyParam brief string 商品简介 Example: 这是一款神奇的手机
     * @bodyParam price float required 商品价格 Example: 3688.00
     * @bodyParam costprice float required 成本价 Example: 0.00
     * @bodyParam mktprice float required 市场价 Example: 0.00
     * @bodyParam image_id int required 商品主图 Example: 1
     * @bodyParam pics array required 商品图片 Example: [2,3,4]
     * @bodyParam goods_category_id int required 商品分类ID Example: 32
     * @bodyParam goods_type_id int required 商品类型ID Example: 10
     * @bodyParam brand_id int  required 品牌ID Example: 1
     * @bodyParam marketable int 上架标志[1:上架, 2:下架] Example: 1
     * @bodyParam stock int 库存 Example: 100
     * @bodyParam freeze_stock int 冻结库存 Example: 100
     * @bodyParam weight float 重量 Example: 123.5
     * @bodyParam unit string 单位 Example: 克
     * @bodyParam introduction longtext 商品详情 Example: 这是详情
     * @bodyParam sort int required 商品排序 越小越靠前 Example: 100
     * @bodyParam is_recommend int 推荐标志[1:推荐,2:不推荐] Example: 1
     * @bodyParam is_hot int 热门标志[1:是,2:不是] Example: 2
     * @bodyParam is_selected int 精选标志[1:是,2:不是] Example: 2
     * @bodyParam label_ids array 标签ID No-example
     * @bodyParam spec_list varchar 商品规格-当前选中 Example: {"key":"颜色","value":["黑色","白色"]},{"key":"内存","value":["2G","8G"]}
     * @bodyParam spec_desc varchar 商品规格-所有 Example: {"key":"颜色","value":["黑色","白色","金色"]},{"key":"内存","value":["2G","4G","8G]"}
     * @bodyParam is_del int 删除标志[0:正常, 1:删除] Example: 0
     * @bodyParam products array 规格详情 Example: [{"barcode":"","price":"100","costprice":"0","mktprice":"0","stock":"50","freeze_stock":"5","spec_params":[{"key":"颜色","value":"黑色"},{"key":"内存","value":"2G"}],"is_default":"1","image_id":"2","is_del":"0"},{"barcode":"","price":"120","costprice":"0","mktprice":"0","stock":"10","freeze_stock":"2","spec_params":[{"key":"颜色","value":"黑色"},{"key":"内存","value":"4G"}],"is_default":"2","image_id":"3","is_del":"0"}]
     * @param  GoodsRequest  $request
     * @return JsonResponse
     * @response {
    "code": 1,
    "message": "更新成功",
    "data": {
    "goods": [
    {
    "id": 1,
    "bn": "G_202007091799",
    "name": "三星S10",
    "brief": "",
    "price": "100.00",
    "costprice": "0.00",
    "mktprice": "0.00",
    "image_id": 1,
    "pics": "",
    "goods_category_id": 2,
    "goods_type_id": 1,
    "brand_id": 1,
    "marketable": 1,
    "stock": 190,
    "freeze_stock": 40,
    "weight": "120.00",
    "unit": "克",
    "introduction": null,
    "comments_count": 0,
    "view_count": 0,
    "buy_count": 0,
    "up_at": "2020-07-09 18:22:34",
    "down_at": null,
    "sort": 10,
    "is_recommend": 2,
    "is_hot": 1,
    "label_ids": "",
    "spec_list": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"8G\"]}",
    "spec_desc": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\",\"金色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
    "created_at": "2020-07-09 18:22:34",
    "updated_at": "2020-07-09 18:34:50",
    "is_del": 1,
    "product": [
    {
    "id": 1,
    "goods_id": 1,
    "barcode": "",
    "sku_code": "",
    "price": "100.00",
    "costprice": "0.00",
    "mktprice": "0.00",
    "marketable": 1,
    "stock": 50,
    "freeze_stock": 5,
    "spec_params": "[{\"key\":\"颜色\",\"value\":\"黑色\"},{\"key\":\"内存\",\"value\":\"2G\"}]",
    "is_default": 1,
    "image_id": 2,
    "created_at": "2020-07-09 18:22:34",
    "updated_at": "2020-07-09 18:22:41",
    "is_del": 0
    },
    {
    "id": 3,
    "goods_id": 1,
    "barcode": "",
    "sku_code": "",
    "price": "100.00",
    "costprice": "0.00",
    "mktprice": "0.00",
    "marketable": 1,
    "stock": 90,
    "freeze_stock": 18,
    "spec_params": "[{\"key\":\"颜色\",\"value\":\"白色\"},{\"key\":\"内存\",\"value\":\"2G\"}]",
    "is_default": 2,
    "image_id": 4,
    "created_at": "2020-07-09 18:22:34",
    "updated_at": "2020-07-09 18:22:41",
    "is_del": 0
    },
    {
    "id": 5,
    "goods_id": 1,
    "barcode": "P__2020070917995",
    "sku_code": "",
    "price": "120.00",
    "costprice": "0.00",
    "mktprice": "0.00",
    "marketable": 1,
    "stock": 10,
    "freeze_stock": 2,
    "spec_params": "[{\"key\":\"颜色\",\"value\":\"黑色\"},{\"key\":\"内存\",\"value\":\"8G\"}]",
    "is_default": 2,
    "image_id": 7,
    "created_at": "2020-07-09 18:22:41",
    "updated_at": "2020-07-09 18:22:41",
    "is_del": 0
    },
    {
    "id": 6,
    "goods_id": 1,
    "barcode": "P__2020070917996",
    "sku_code": "",
    "price": "150.00",
    "costprice": "0.00",
    "mktprice": "0.00",
    "marketable": 1,
    "stock": 40,
    "freeze_stock": 15,
    "spec_params": "[{\"key\":\"颜色\",\"value\":\"白色\"},{\"key\":\"内存\",\"value\":\"8G\"}]",
    "is_default": 2,
    "image_id": 6,
    "created_at": "2020-07-09 18:22:41",
    "updated_at": "2020-07-09 18:22:41",
    "is_del": 0
    }
    ]
    }
    ]
    }
     * }
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
                $product['spec_params'] = json_encode($product['spec_params'], JSON_UNESCAPED_UNICODE); //数组格式转成json
                if (!isset($product['id'])) {  //ID不存在  新增规格
                    $stock += $product['stock'];

                    $freezeStock += $product['freeze_stock'];
                    $product['goods_id'] = $goods->id;
                    //生成货号
                    if (!isset($product['sn']) || $product['sn'] == null) {
                        $product['sn'] = 'P'.$sn.($num += 1);
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
            $noProds = Products::whereIn('id', $noIds)->where('is_del', 0)->get();
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
     * delete
     * 删除商品
     * @urlParam good required 商品ID Example:2
     * @response {
    "code": 1,
    "message": "删除成功",
    "data": {
    "goods": [
    {
    "id": 1,
    "bn": "G_202007091799",
    "name": "三星S10",
    "brief": "",
    "price": "100.00",
    "costprice": "0.00",
    "mktprice": "0.00",
    "image_id": 1,
    "pics": "",
    "goods_category_id": 2,
    "goods_type_id": 1,
    "brand_id": 1,
    "marketable": 1,
    "stock": 190,
    "freeze_stock": 40,
    "weight": "120.00",
    "unit": "克",
    "introduction": null,
    "comments_count": 0,
    "view_count": 0,
    "buy_count": 0,
    "up_at": "2020-07-09 18:22:34",
    "down_at": null,
    "sort": 10,
    "is_recommend": 2,
    "is_hot": 1,
    "label_ids": "",
    "spec_list": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"8G\"]}",
    "spec_desc": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\",\"金色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
    "created_at": "2020-07-09 18:22:34",
    "updated_at": "2020-07-09 18:34:50",
    "is_del": 1,
    "product": [
    {
    "id": 1,
    "goods_id": 1,
    "barcode": "",
    "sku_code": "",
    "price": "100.00",
    "costprice": "0.00",
    "mktprice": "0.00",
    "marketable": 1,
    "stock": 50,
    "freeze_stock": 5,
    "spec_params": "[{\"key\":\"颜色\",\"value\":\"黑色\"},{\"key\":\"内存\",\"value\":\"2G\"}]",
    "is_default": 1,
    "image_id": 2,
    "created_at": "2020-07-09 18:22:34",
    "updated_at": "2020-07-09 18:22:41",
    "is_del": 0
    },
    {
    "id": 3,
    "goods_id": 1,
    "barcode": "",
    "sku_code": "",
    "price": "100.00",
    "costprice": "0.00",
    "mktprice": "0.00",
    "marketable": 1,
    "stock": 90,
    "freeze_stock": 18,
    "spec_params": "[{\"key\":\"颜色\",\"value\":\"白色\"},{\"key\":\"内存\",\"value\":\"2G\"}]",
    "is_default": 2,
    "image_id": 4,
    "created_at": "2020-07-09 18:22:34",
    "updated_at": "2020-07-09 18:22:41",
    "is_del": 0
    },
    {
    "id": 5,
    "goods_id": 1,
    "barcode": "P__2020070917995",
    "sku_code": "",
    "price": "120.00",
    "costprice": "0.00",
    "mktprice": "0.00",
    "marketable": 1,
    "stock": 10,
    "freeze_stock": 2,
    "spec_params": "[{\"key\":\"颜色\",\"value\":\"黑色\"},{\"key\":\"内存\",\"value\":\"8G\"}]",
    "is_default": 2,
    "image_id": 7,
    "created_at": "2020-07-09 18:22:41",
    "updated_at": "2020-07-09 18:22:41",
    "is_del": 0
    },
    {
    "id": 6,
    "goods_id": 1,
    "barcode": "P__2020070917996",
    "sku_code": "",
    "price": "150.00",
    "costprice": "0.00",
    "mktprice": "0.00",
    "marketable": 1,
    "stock": 40,
    "freeze_stock": 15,
    "spec_params": "[{\"key\":\"颜色\",\"value\":\"白色\"},{\"key\":\"内存\",\"value\":\"8G\"}]",
    "is_default": 2,
    "image_id": 6,
    "created_at": "2020-07-09 18:22:41",
    "updated_at": "2020-07-09 18:22:41",
    "is_del": 0
    }
    ]
    }
    ]
    }
     * }
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

    /**
     * set
     * 设置商品属性
     * @urlParam good required 商品ID Example:2
     * @queryParam key required 设置的字段名[marketable,is_recommend,is_hot,is_selected] Example:marketable
     * @queryParam value 设置的字段值[1:(上架or是),2:(下架or否)] Example:2
     * @param  GoodsRequest  $request
     * @param $id
     * @return JsonResponse
     */
    public function setGoodsAttribute(GoodsRequest $request, $id)
    {
        $keyArr = ['marketable','is_recommend','is_hot','is_selected'];
        $key = $request->input('key');
        $value = $request->input('value');
        if (!in_array($key,$keyArr)) return Helper::Json(-1,'设置失败,字段名无效');
        if (!in_array($value,[1,2])) return Helper::Json(-1,'设置失败,字段值无效');
        $goods = Goods::find($id);
        $goods->fill([$key => $value]);
        $goods->save();
        return Helper::Json(1, '设置成功', ['goods' => $goods]);
    }
}
