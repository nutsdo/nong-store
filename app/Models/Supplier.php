<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table='supplier';

    protected $guarded = [];

    const CREATED_AT = 'created_time';
    const UPDATED_AT = 'updated_time';

}
