<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    const CREATED_AT = 'created_time';
    const UPDATED_AT = 'updated_time';

    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
