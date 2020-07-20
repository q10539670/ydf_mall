<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Logistics;
use App\Models\Ship;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Ship
 * 配送方式接口
 * @package App\Http\Controllers\Admin
 */
class ShipController extends Controller
{
    /**
     * index
     * 配送方式列表
     * @queryParam per_page required 每页显示数量 Example: 10
     * @queryParam current_page required 当前页 Example:1
     * @param  Request  $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $perPage = ($request->input('per_page') != '') ? $request->input('per_page') : 10;
        $currentPage = $request->input('current_page') != '' ? $request->input('current_page') : 1;
        $query = Ship::orderBy('sort', 'asc');
        $ships = self::paginator($query, $currentPage, $perPage);
        return Helper::Json(1, '查询成功', ['ships' => $ships]);
    }

    /**
     * create
     * 创建配送方式
     *
     * @return JsonResponse
     */
    public function create()
    {
        $logistics = Logistics::orderBy('sort', 'asc')->get();
        return Helper::Json(1, '查询成功', ['logistics' => $logistics]);
    }

    /**
     * store
     * 保存配送方式
     * @bodyParam name string required 配送方式名称 Example:配送方式1
     * @bodyParam type int required 计算方式[1:按重量 2:按件数] Example:1
     * @bodyParam has_cod int required 是否货到付款[1:不是 2:是] Example:1
     * @bodyParam firstunit int required 首重(单位:克) Example:500
     * @bodyParam continueunit int required 续重(单位:克) Example:500
     * @bodyParam def_area_fee int required 按地区设置配送费用是否启用默认配送费用[1:启用 2:不启用] Example:1
     * @bodyParam area_type int required 地区类型[1:全部地区 2:指定地区] Example:1
     * @bodyParam firstunit_price float required 首重费用 Example: 10.00
     * @bodyParam continueunit_price float required 续重费用 Example: 5:00
     * @bodyParam logi_name string required
     * @bodyParam logi_code required
     * @bodyParam is_def required
     * @bodyParam sort required
     * @bodyParam status required
     * @bodyParam free_postage required
     * @bodyParam goodsmoney required
     * @param  Request  $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        if ($request->has('area_fee') && is_array($request->area_fee)) {
            $request->merge(['area_fee' => implode(',', $request->area_fee)]);
        }
        $ship = Ship::create($request->all());
        return Helper::Json(1,'创建成功', ['ship' => $ship]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
