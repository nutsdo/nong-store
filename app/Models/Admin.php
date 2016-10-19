<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'sys_users';
    protected $dates = ['delete_time'];

    const CREATED_AT = 'created_time';
    const UPDATED_AT = 'updated_time';
    const DELETED_AT = 'deleted_time';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'admin_name', 'admin_email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}