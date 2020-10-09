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


class ShipController extends Controller
{
    /**
     * @OA\Get (
     *     path="/ship",
     *     tags={"配送方式"},
     *     summary="配送方式列表",
     *     description="返回配送方式列表",
     *     @OA\Parameter(ref="#/components/parameters/per_page"),
     *     @OA\Parameter(ref="#/components/parameters/current_page"),
     *     @OA\Response (
     *         response=200,
     *         description="成功",
     *         @OA\JsonContent(ref="#components/responses/ship")
     *     ),
     *     @OA\Response (
     *         response=500,
     *         description="服务器错误",
     *     )
     * )
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
     * @OA\Post (
     *     path="/ship",
     *     tags={"配送方式"},
     *     summary="保存配送方式",
     *     description="返回保存的配送方式",
     *     @OA\RequestBody(ref="#/components/requestBodies/ship_in_body"),
     *     @OA\Response(
     *         response=200,
     *         description="成功",
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="服务器错误"
     *     )
     * )
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
     * @OA\Get (
     *     path="/ship/{ship}",
     *     tags={"配送方式"},
     *     summary="通过ID查询配送方式",
     *     description="返回查询到的配送方式",
     *     @OA\Parameter(ref="#/components/parameters/ship_in_path_required"),
     *     @OA\Response(
     *         response=200,
     *         description="成功",
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="服务器错误",
     *     ),
     * )
     * @param  ShipRequest  $id
     * @return JsonResponse
     */
    public function show(ShipRequest $id)
    {
        $ship = Ship::find($id)->toArray();
        $ship = self::getAreasFormat($ship);
        return Helper::Json(1, '查询成功', ['ship' => $ship]);
    }

    public function edit(ShipRequest $id)
    {
        $ships = self::getAreasFormat(Ship::find($id)->toArray());

        $logistics = Logistics::orderBy('sort', 'asc')->get();
        return Helper::Json(1, '查询成功', ['logistics' => $logistics, 'ships' => $ships]);
    }

    /**
     * @OA\Patch (
     *     path="/ship/{ship}",
     *     tags={"配送方式"},
     *     summary="通过ID更新配送方式",
     *     description="返回更新后的配送方式",
     *     @OA\Parameter(ref="#/components/parameters/ship_in_path_required"),
     *     @OA\RequestBody (ref="#/components/requestBodies/ship_in_body"),
     *     @OA\Response(
     *         response=200,
     *         description="成功",
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="服务器错误",
     *     ),
     * )
     * @param  ShipRequest  $request
     * @param $id
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
     * @OA\Delete (
     *     path="/ship/{ship}",
     *     tags={"配送方式"},
     *     summary="通过ID删除配送方式",
     *     description="返回是否删除成功",
     *     @OA\Parameter(ref="#/components/parameters/ship_in_path_required"),
     *     @OA\Response(
     *         response=200,
     *         description="成功",
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="服务器错误",
     *     ),
     * )
     * @param $id
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
