<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class nav extends Model
{
	// 软删除
    use SoftDeletes;
	/**
     * 允许赋值的字段
     *
     * @var array
     */
    protected $fillable = ['sort', 'name', 'url'];

   
	
 }
