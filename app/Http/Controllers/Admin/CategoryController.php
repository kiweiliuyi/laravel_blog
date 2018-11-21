<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Category;
class CategoryController extends Controller
{
    /**
     * 分类列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = '分类列表';
        $data = DB::table('categories')
                    ->orderBy('id', 'desc')
                    ->get();
        $assign = [
                'title' => $title,
                'data' => $data,
            ];
        // $assign = compact('title', 'category');
        return view('admin/category/index', $assign);
    }

    /**
     * 添加分类
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = '添加分类';
        $assign = compact('title');
        return view('admin/category/create');
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
        $data['sort'] = is_null($data['sort']) ? 0 : $data['sort'];
        DB::table('categories')->insert($data);
        return redirect('admin/category/index');
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
        $title = '编辑分类';
        //使用模型models/category
        $data = Category::find($id);
        $category = Category::all();
        $assign = [
            'title' => $title,
            'data' => $data,
            'category' => $category,
        ];
        // $assign = compact('title', 'data');
        return view('admin/category/edit', $assign);
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
        $data['sort'] = is_null($data['sort']) ? 0 : $data['sort'];
        Category::where('id',$id)->update($data);

        return redirect('admin/category/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->back();
    }
}
