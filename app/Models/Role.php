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
}
