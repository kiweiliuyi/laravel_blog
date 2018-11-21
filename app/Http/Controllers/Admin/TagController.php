<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     * 标签列表
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = '标签列表';
        $data = Tag::withTrashed()->get();
        $assign = compact('title','data');
        return view('admin/tag/index', $assign);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = '添加标签';
        $assign = compact('title');
        return view('admin/tag/create', $assign);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, tag $tagModel)
    {
        $data = $request->except('_token');
        $result = $tagModel->create($data);
        return redirect('admin/tag/index');  

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
        $data = Tag::find($id);
        $assign = compact('data');
        return view('admin/tag/edit', $assign);
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
        $result = Tag::where('id', $id)->update($data);
        return redirect('admin/tag/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id ,Tag $tagModel)
    {
        $result = $tagModel->where('id', $id)->delete();
        return redirect()->back();

    }
    /**
    * 恢复删除的标签
    *
    */
    public function restore($id){
        Tag::where('id' , $id)->restore();
        return redirect('admin/tag/index');
    }
    /**
    * 彻底删除
    *
    */
    public function forceDelete($id){
        Tag::where('id', $id)->forceDelete();
        return redirect('admin/tag/index');
    }
}
