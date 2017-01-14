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
        return $this->belongsTo('App\Models\CommunityCategory','bbs_category_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\CommunityComment','bbs_article_id','id');
    }

    //所有点赞的用户
    public function likes()
    {
        return $this->morphMany('App\Models\Like', 'like');
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
        return $query->where('user_id', $user_id);
    }
}
