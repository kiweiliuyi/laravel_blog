<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GitProject;


class GitProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = '开源项目管理';
        $data = GitProject::orderBy('sort')
            ->withTrashed()
            ->get();
        $gitProjectType = [
            1 => 'github',
            2 => 'gitee'
        ];
        $assign = compact('title', 'data', 'gitProjectType');
        return view('admin/gitProject/index', $assign);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/gitProject/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $result = GitProject::create($data);
        return redirect('admin/gitProject/index');
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
        $data = GitProject::find($id);
        $assign = compact('data');
        return view('admin/gitProject/edit', $assign);
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
        $result = GitProject::where('id', $id)->update($data);
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
        $result = GitProject::where('id', $id)->delete();
        return redirect()->back();
    }
    //恢复删除数据
    public function restore($id){
        GitProject::where('id' , $id)->restore();
        return redirect()->back();

    }
    //彻底删除
    public function forceDelete($id){
        GitProject::where('id', $id)->forceDelete();
        return redirect()->back();
    }
}
