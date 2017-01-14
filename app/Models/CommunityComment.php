<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommunityComment extends Model
{
    protected $table = 'bbs_article_comment';

    protected $dates = ['delete_time'];

    const CREATED_AT = 'created_time';
    const UPDATED_AT = 'updated_time';
    const DELETED_AT = 'deleted_time';

    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo('App\Models\User','comment_user_id');
    }

    /**
     * 限制查找用户的评论。
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUser($query,$user_id)
    {
        return $query->where('comment_user_id', $user_id);
    }
}
