<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    // 软删除
    use SoftDeletes;

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $fillable = ['name', 'email', 'password'];
}
