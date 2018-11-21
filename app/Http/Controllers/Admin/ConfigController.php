<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cache;
use App\Models\Config;
use Artisan;

class ConfigController extends Controller
{
    /**
    * email 配置
    */
    public function email()
    {
    	$config = cache('config');
        $assign = compact('config');
        return view('admin.config.email', $assign);
    }
    /**
    * 第三方配置
    */
    public function oauth()
    {
    	$config = cache('config');
        $assign = compact('config');
        return view('admin.config.oauth', $assign);
    }
    /**
    * qq群设置
    */
    public function qqQun()
    {
        $config = cache('config');
        $assign = compact('config');
        return view('admin.config.qqQun', $assign);
    }
    /**
    * 其他配置 
    */
    public function edit()
    {
        $config = cache('config');
        $assign = compact('config');
        return view('admin.config.edit', $assign);
    }
    /**
     * 清空各种缓存
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function clear()
    {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        Artisan::call('clear-compiled');
        flash_success('操作成功');
        return redirect()->back();
    }
}
