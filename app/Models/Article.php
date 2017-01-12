<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    protected $table = 'feature_article';

    protected $dates = ['delete_time'];

    const CREATED_AT = 'created_time';
    const UPDATED_AT = 'updated_time';
    const DELETED_AT = 'deleted_time';

    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo('App\Models\ArticleCategory','category_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment','article_id','id');
    }

    public function author()
    {
        return $this->morphTo();
        //return $this->belongsTo('App\Models\User','author_id');
    }

    /**
     * 限制查找已审核的文章。
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeStatus($query,$status=1)
    {
        return $query->where('status', $status);
    }
}
