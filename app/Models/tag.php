<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tag extends Model
{
    //
    // 软删除
    use SoftDeletes;
    protected $fillable = ['name'];
}
