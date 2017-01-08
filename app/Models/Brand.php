<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brand';

    protected $guarded = [];

    const CREATED_AT = 'created_time';
    const UPDATED_AT = 'updated_time';

    public function supplier()
    {
        return $this->belongsTo('App\Models\Supplier','supplier_id');
    }
}
