<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $table = 'sys_role';
    protected $dates = ['delete_time'];

    const CREATED_AT = 'created_time';
    const UPDATED_AT = 'updated_time';
    const DELETED_AT = 'deleted_time';

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsToMany('App\Models\Admin', 'sys_user_role', 'sys_role_id', 'sys_user_id');
    }

    public function menus()
    {
        return $this->belongsToMany('App\Models\Menu', 'sys_role_function', 'sys_role_id', 'sys_fun_id');
    }

}
