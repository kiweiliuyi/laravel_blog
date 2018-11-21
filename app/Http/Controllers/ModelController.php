<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ModelController extends Controller
{
    /**
      *调用模型
    */
    public function index(Article $articleModel){
    	// $data = $articleModel->get();
    	// dump($data);
    	// dump($data->toArray());
    	// $articleModel = new Article();
    	// $data = $articleModel->get();
    	// dump($data->toArray());
    	// $data = Article::get();
    	// dump($data);
    	// $data = $articleModel->articleList();
    	$data = Article::withTrashed()->get();
    	dump($data->toArray());

    }

    /**
	 * 查询数据
	 */
	public function get()
	{
	    $data = Article::select('category_id', 'title', 'content')
	        ->where('title', '<>', '文章1')
	        ->whereIn('id', [1, 2, 3])
	        ->groupBy('category_id')
	        ->orderBy('id', 'desc')
	        ->get();
	    dump($data->toArray());
	}
	/**
	 * 插入数据
	 */
	public function store(Article $articleModel)
	{
	    $data = [
	        'category_id' => 6,
	        'title' => '文章6',
	        'content' => '内容6'
	    ];
	    $result = $articleModel->create($data);
	     dump($result->id);
    	$id = $articleModel->create($data)->id;
    	dump($id);
	}
	/**
	 * 修改数据
	 */
	public function update(Article $articleModel)
	{
	    $id = 6;
	    $data = [
	        'category_id' => 2,
	        'title' => '文章6',
	        'content' => '内容666'
	    ];
	    $result = $articleModel->where('id', $id)->update($data);
	    dump($result);
	}
	/**
	 * 删除数据,软删除
	 */
	public function delete(Article $articleModel)
	{
	    $id = 6;
	    $result = $articleModel->where('id', $id)->delete();
	    dump($result);
	}
	/**
	*恢复删除
	*/
	public function restore(Article $articleModel){
		$id = 6;
		$result = $articleModel->where('id', $id)->restore();
		dump($result);
	}
	/**
	*彻底删除
	*/
	public function forceDelete(Article $articleModel){
		$id = 6;
		$articleModel->where('id', $id)->forceDelete();
		dump($result);
	}
}
