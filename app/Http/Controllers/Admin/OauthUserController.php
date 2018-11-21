<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OauthUser;


class OauthUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $title = '第三方用户管理';
        $data = OauthUser::withTrashed()->get();
        $assign = compact('title', 'data');
        return view('admin/oauthUser/index', $assign);
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
        $data = OauthUser::find($id);
        $assign = compact('data');
        return view('admin/oauthuser/edit', $assign);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, OauthUser $OauthUserModel)
    {
        $data = $request->except('_token');
        $result = OauthUser::where('id', $id)->update($data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        OauthUser::where('id', $id)->delete();
        return redirect()->back();
    }

    //恢复删除数据
    public function restore($id){
        OauthUser::where('id' , $id)->restore();
        return redirect()->back();

    }
    //彻底删除
    public function forceDelete($id){
        OauthUser::where('id', $id)->forceDelete();
        return redirect()->back();
    }

}
