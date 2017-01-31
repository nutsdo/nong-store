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
    }

    public function collection()
    {
        return $this->morphTo();
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

    /**
     * 限制查找用户的文章。
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfUserId($query,$user_id=1)
    {
        return $query->where('author_id', $user_id)->where('author_type','user');
    }

    /**
     * 搜索。
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query,$keyword)
    {
        return $query->where('title','like', "%$keyword%");
    }
}
