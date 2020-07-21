<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ShipRequest;
use App\Models\Area;
use App\Models\Logistics;
use App\Models\Ship;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * @group Ship
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
        $ships = self::paginator($query, $currentPage, $perPage)->toArray();
        $ships['data'] = self::getAreasFormat($ships['data']);
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
     * @bodyParam logi_name string required 物流公司名称 Example: 顺丰速运
     * @bodyParam logi_code string required 物流公司编码 Example: SF-Express
     * @bodyParam is_def int required 是否默认[1:默认 2:不默认] Example:2
     * @bodyParam sort int required 排序 Example:100
     * @bodyParam status int required 状态[1:正常 2:禁用] Example:1
     * @bodyParam free_postage int required 是否包邮[1:包邮 2:不包邮] Example:2
     * @bodyParam goodsmoney float required 满多少免运费 Example: 0.00
     * @bodyParam area_fee array 地区配送费用 Example:[{"area_id":[10005,2005,25576],"firstunit":"500","continueunit":"500","firstunit_price":"12","continueunit_price":"8"},{"area_id":[1005,9755,2576],"firstunit":"500","continueunit":"500","firstunit_price":"8","continueunit_price":"3"}]
     * @param  ShipRequest  $request
     * @return JsonResponse
     */
    public function store(ShipRequest $request)
    {
        if ($request->has('area_fee') && is_array($areaFees = $request->area_fee)) {
            $area = [];
            foreach ($areaFees as $key => $areaFee) {
                $area[] = json_decode($areaFee, true);
            }
            $request->merge(['area_fee' => json_encode($area, JSON_UNESCAPED_UNICODE)]);
        }
        $ship = Ship::create($request->all());
        return Helper::Json(1, '创建成功', ['ship' => $ship]);
    }

    /**
     * show
     * 查询配送方式
     *
     * @urlParam ship required 配送方式ID Example: 1
     * @param  ShipRequest  $id
     * @return JsonResponse
     */
    public function show(ShipRequest $id)
    {
        $ship = Ship::find($id)->toArray();
        $ship = self::getAreasFormat($ship);
        return Helper::Json(1, '查询成功', ['ship' => $ship]);
    }

    /**
     * edit
     * 编辑
     * @urlParam ship required 配送方式ID Example: 1
     *
     * @param  ShipRequest  $id
     * @return JsonResponse
     */
    public function edit(ShipRequest $id)
    {
        $ships = self::getAreasFormat(Ship::find($id)->toArray());

        $logistics = Logistics::orderBy('sort', 'asc')->get();
        return Helper::Json(1, '查询成功', ['logistics' => $logistics, 'ships' => $ships]);
    }

    /**
     * update
     * 更新
     * @urlParam ship required 配送方式ID Example: 1
     * @bodyParam name string required 配送方式名称 Example:配送方式1
     * @bodyParam type int required 计算方式[1:按重量 2:按件数] Example:1
     * @bodyParam has_cod int required 是否货到付款[1:不是 2:是] Example:1
     * @bodyParam firstunit int required 首重(单位:克) Example:500
     * @bodyParam continueunit int required 续重(单位:克) Example:500
     * @bodyParam def_area_fee int required 按地区设置配送费用是否启用默认配送费用[1:启用 2:不启用] Example:1
     * @bodyParam area_type int required 地区类型[1:全部地区 2:指定地区] Example:1
     * @bodyParam firstunit_price float required 首重费用 Example: 10.00
     * @bodyParam continueunit_price float required 续重费用 Example: 5:00
     * @bodyParam logi_name string required 物流公司名称 Example: 顺丰速运
     * @bodyParam logi_code string required 物流公司编码 Example: SF-Express
     * @bodyParam is_def int required 是否默认[1:默认 2:不默认] Example:2
     * @bodyParam sort int required 排序 Example:100
     * @bodyParam status int required 状态[1:正常 2:禁用] Example:1
     * @bodyParam free_postage int required 是否包邮[1:包邮 2:不包邮] Example:2
     * @bodyParam goodsmoney float required 满多少免运费 Example: 0.00
     * @bodyParam area_fee array 地区配送费用 Example:[{"area_id":[10005,2005,25576],"firstunit":"500","continueunit":"500","firstunit_price":"12","continueunit_price":"8"},{"area_id":[1005,9755,2576],"firstunit":"500","continueunit":"500","firstunit_price":"8","continueunit_price":"3"}]
     * @param  ShipRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ShipRequest $request, $id)
    {
        if ($request->has('area_fee') && is_array($request->area_fee)) {
            $request->merge(['area_fee' => implode(',', $request->area_fee)]);
        }
        $ship = Ship::find($id);
        $ship->fill($request->all());
        return Helper::Json(1, '更新成功', ['ship' => $ship]);
    }

    /**
     * delete
     * 删除
     * @urlParam ship required 配送方式ID Example: 1
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        if (!$ship = Ship::find($id)) {
            return Helper::Json(-1, '该配送方式不存在');
        }
        Ship::destroy($id);
        return Helper::Json(1, '删除成功');

    }

    /**
     * @param $ships
     * @return mixed
     */
    public static function getAreasFormat($ships)
    {
        foreach ($ships as $k => $ship) {
            if ($ship['area_fee'] != '') {
                $areaFee = json_decode($ship['area_fee'], true);
                $ships[$k]['area_fee'] = $areaFee;
                foreach ((array) $areaFee as $kk => $item) {
                    $areaIds = $item['area_id'];
                    $area = Area::whereIn('id', $areaIds)->get();
                    $ships[$k]['area_fee'][$kk]['area'] = $area;
                }
            }
        }
        return $ships;
    }
}
