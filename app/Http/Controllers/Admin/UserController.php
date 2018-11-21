<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = '管理员列表';
        $data = User::withTrashed()->get();
        $assign = compact('title', 'data');
        return view('admin/user/index', $assign);
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
        $data = User::find($id);
        $assign = compact('data');
        return view('admin/user/edit', $assign);
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
        // 如果不修改密码 则去掉password字段
        // $data = array_filter($data);
        if (!empty($data['password'])) {
            $data['password']=bcrypt($data['password']);
        }
      
        $result = User::where('id', $id)->update($data);
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
        User::where('id', $id)->delete();
        return redirect()->back();
    }
    /**
    * 恢复删除
    *
    */
    public function restore($id){
        User::where('id', $id)->restore();
        return redirect()->back();
    }
    /**
    * 彻底删除
    *
    */
    public function forceDelete(){
        Usre::where('id', $id)->forceDelete();
        return rdirect()->back();
    }
}
