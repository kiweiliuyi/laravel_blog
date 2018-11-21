<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\ArticleTag;

class ArticleController extends Controller
{
    /**
     * 
     * 文章首页
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $title = '文章列表';
        $article = DB::table('articles')
            ->orderBy('id', 'desc')
            ->get();
        $assign = [
            'title' => $title,
            'article' => $article,
        ];
     
        return view('admin/article/index',$assign);

    }

    /**
     * 新增文章
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = '新增文章';
        $category = Category::all();
        $tag = Tag::all();
        $assign = compact('title', 'category','tag');
        return view('admin/article/create', $assign);
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
        $tag_ids = $data['tag_ids'];
        unset($data['tag_ids']);
        $result = DB::table('articles')->insert($data);
        $articleTag = new ArticleTag();
        $articleTag->addTagIds($result, $tag_ids);
        
        return redirect('admin/article/index');
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
     * 修改文章
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = '编辑文章';
        $article = Article::withTrashed()->find($id);
        $article->tag_ids = ArticleTag::where('article_id', $id)->pluck('tag_id')->toArray();
        
        $category = Category::all();
        $tag = Tag::all();
        $assign = compact('article', 'title','category','tag');
        return view('admin/article/edit', $assign);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, ArticleTag $articleTagModel)
    {
        $data = $request->except('_token');

       
        // 为文章批量添加标签
        $tag_ids = $data['tag_ids'];
        unset($data['tag_ids']);
        $articleTagModel->addTagIds($id, $tag_ids);
         DB::table('articles')->where('id', $id)->update($data);
        return redirect()->back();
    }

    /**
     * 删除文章
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('articles')->where('id', $id)->delete();
        return redirect()->back();
    }
}
