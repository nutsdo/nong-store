<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Vinkla\Hashids\Facades\Hashids;

class Product extends Model
{
    use SoftDeletes;

    protected $dates = ['delete_time'];

    const CREATED_AT = 'created_time';
    const UPDATED_AT = 'updated_time';
    const DELETED_AT = 'deleted_time';


    //const PARENT_ID = 'father_id';

    protected $guarded = ['id'];

    public function comments()
    {
        return $this->hasMany('App\Models\ProductComment');
    }

    public function scopeWhereHashOrSlug($query, $value){
        //check for hashid (decode method returns empty array when hash is invalid)
        if(count(Hashids::decode($value)) > 0){
            $id = Hashids::decode($value)[0];
            return $query->whereId($id);
        }
//        //find by slug if hashid is invalid
//        else {
//            return $query->whereSlug($value);
//        }
    }

    public function images()
    {
        return $this->hasMany('App\Models\ProductImage');
    }

}
