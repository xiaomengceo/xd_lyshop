<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //修改表名
    protected $table='admin';
    //修改时间字段验证，不验证时间
    public $timestamps = false; 
    public $primaryKey = 'username';
}
