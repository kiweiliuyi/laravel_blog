<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Nav;
use DB;

class NavController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = '菜单管理';
        // $nav = Nav::orderBy('id', 'desc')->get();
        $nav = Nav::withTrashed()->get();
        $assign = compact('nav');
        return view('admin.nav.index', $assign);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function create()
    {
        $title = '新增菜单';
        $assign = compact('title');
        return view('admin.nav.create',$assign);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Nav $navModel)
    {
        $data = $request->except('_token');
        $result = $navModel->create($data);
        return redirect(url('admin/nav/index'));
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
        $nav = Nav::find($id);
        $assign = compact('nav');
        return view('admin.nav.edit', $assign);
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
        $data = $request->except('_token');
        Nav::where('id', $id)->update($data);
        return redirect(url('admin/nav/index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Nav $navModel)
    {
        $result = $navModel->where('id', $id)->delete();
     
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     * 恢复软删除的菜单
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        Nav::where('id', $id)->restore();
        return redirect()->back();
    }
    /**
     * 彻底删除菜单
     *
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete($id)
    {
        Nav::where('id', $id)->forceDelete();
        return redirect()->back();
    }
}
