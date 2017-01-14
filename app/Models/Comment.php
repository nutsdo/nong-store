<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    protected $table = 'feature_article_comment';

    protected $dates = ['delete_time'];

    const CREATED_AT = 'created_time';
    const UPDATED_AT = 'updated_time';
    const DELETED_AT = 'deleted_time';

    protected $guarded = ['id'];

    public function article()
    {
        return $this->belongsTo('App\Models\Article','article_id');
    }

    public function posts()
    {
        return $this->belongsTo('App\Models\CommunityArticle','bbs_article_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User','app_user_id');
    }

    /**
     * 限制查找用户的评论。
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfUser($query,$user_id)
    {
        return $query->where('app_user_id', $user_id);
    }
}
