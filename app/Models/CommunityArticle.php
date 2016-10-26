<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommunityArticle extends Model
{
    use SoftDeletes;

    protected $table = 'bbs_article';

    protected $dates = ['delete_time'];

    const CREATED_AT = 'created_time';
    const UPDATED_AT = 'updated_time';
    const DELETED_AT = 'deleted_time';

    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo('App\Models\CommunityCategory','category_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment','id','article_id');
    }
}
