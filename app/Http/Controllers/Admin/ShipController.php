<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
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
        $query = Ship::orderBy('sort','asc');
        $ships = self::paginator($query,$currentPage,$perPage);
        return Helper::Json(1,'查询成功',['ships' => $ships]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
