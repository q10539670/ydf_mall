<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LogisticsRequest;
use App\Models\Logistics;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @group Logistics
 * 物流公司接口
 * @package App\Http\Controllers\Admin
 */
class LogisticsController extends Controller
{
    /**
     * index
     * 物流公司列表
     * @queryParam name 物流公司名称 No-example
     * @queryParam code 物流公司编码 No-example
     * @queryParam per_page required 每页显示数量 Example: 10
     * @queryParam current_page required 当前页 Example:1
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $name = $request->input('name');
        $code = $request->input('code');
        $perPage = ($request->input('per_page') != '') ? $request->input('per_page') : 10;
        $currentPage = $request->input('current_page') != '' ? $request->input('current_page') : 1;
        $query = Logistics::when($name != '', function ($query) use ($name) {
            return $query->where('name', 'like', '%'.$name.'%');
        })
            ->when($code !='',function ($query) use ($code) {
                return $query->where('code', 'like', '%'.$code.'%');
            });
        $query->orderBy('sort','asc');
        $logistics = self::paginator($query,$currentPage,$perPage);
        return Helper::Json(1,'查询成功',['logistics' => $logistics]);
    }

    /**
     * store
     * 保存
     *
     * @bodyParam logi_name string required 物流公司名称 Example: 顺丰速运
     * @bodyParam logi_code string required 物流公司编码 Example: SF-Express
     * @bodyParam sort numeric required 排序 Example: 100
     * @param  LogisticsRequest  $request
     * @return JsonResponse
     * @response {
    "code": 1,
    "message": "创建成功",
    "data": {
    "logistics": {
    "logi_name": "顺丰速运",
    "logi_code": "SF-Express",
    "sort": "100",
    "updated_at": "2020-07-17 11:44:44",
    "created_at": "2020-07-17 11:44:44",
    "id": 1
    }
    }
     * }
     */
    public function store(LogisticsRequest $request)
    {
        $logistics = Logistics::create($request->all());
        return Helper::Json(1,'创建成功', ['logistics' =>$logistics]);
    }

    /**
     * edit
     * 编辑
     * @urlParam logi required 物流ID Example: 1
     * @param  LogisticsRequest  $id
     * @return JsonResponse
     */
    public function edit(LogisticsRequest $id)
    {
        $logistics = Logistics::find($id);
        return Helper::Json(1,'查询成功', ['logistics' =>$logistics]);
    }

    /**
     * update
     * 更新
     * @urlParam logi required 物流ID Example: 1
     * @bodyParam logi_name string required 物流公司名称 Example: 顺丰速运
     * @bodyParam logi_code string required 物流公司编码 Example: SF-Express
     * @bodyParam sort numeric required 排序 Example: 100
     * @param  LogisticsRequest  $request
     * @param  int  $id
     * @return JsonResponse
     * @response {
    "code": 1,
    "message": "更新成功",
    "data": {
    "logistics": {
    "logi_name": "顺丰速运",
    "logi_code": "SF-Express",
    "sort": "100",
    "updated_at": "2020-07-17 11:44:44",
    "created_at": "2020-07-17 11:44:44",
    "id": 1
    }
    }
     * }
     */
    public function update(LogisticsRequest $request, $id)
    {
        if (!$logistics = Logistics::find($id)) return Helper::Json(-1,'更新失败,ID参数错误');
        $logistics->fill($request->all());
        $logistics->save();
        return Helper::Json(1,'更新成功',['logistics'=>$logistics]);

    }

    /**
     * delete
     * 删除物流公司
     *
     * @urlParam logi required 物流ID Example: 1
     * @param  int  $id
     * @return JsonResponse
     * @response {
    "code": 1,
    "message": "删除成功",
    "data": []
     * }
     */
    public function destroy($id)
    {
        if (!$logistics = Logistics::find($id)) return Helper::Json(-1,'删除失败,ID参数错误');
        Logistics::destroy($id);
        return Helper::Json(-1,'删除成功');
    }
}
