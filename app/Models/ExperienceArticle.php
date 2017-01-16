<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExperienceArticle extends Model
{
    use SoftDeletes;

    protected $table = 'experiencer_article';

    protected $dates = ['delete_time'];

    const CREATED_AT = 'created_time';
    const UPDATED_AT = 'updated_time';
    const DELETED_AT = 'deleted_time';

    protected $guarded = ['id'];

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
