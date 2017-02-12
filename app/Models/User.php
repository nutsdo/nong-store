<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\DB;

class User extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'app_users';

    const CREATED_AT = 'created_time';
    const UPDATED_AT = 'updated_time';
    const DELETED_AT = 'deleted_time';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function articles()
    {
        return $this->morphMany('App\Models\Article', 'author');
    }

    //是否关注指定用户
    public function isFollowing($user_id)
    {
        $s = DB::table('user_follow')->where('user_id', $this->id)->where('follow_id', $user_id)->count();
        return $s;
    }

    //是否被指定用户关注
    public function isFollower($user_id)
    {
        $s = DB::table('user_follow')->where('user_id', $user_id)->where('follow_id', $this->id)->count();
        return $s;
    }

    //关注粉丝列表
    public function followers()
    {
        return $this->belongsToMany('App\Models\User','user_follow','user_id','follow_id');
    }
    //关注其他用户列表
    public function following()
    {
        return $this->belongsToMany('App\Models\User','user_follow','follow_id','user_id');
    }
    //用户点赞的所有文章、帖子
    public function likes()
    {
        //return $this->morphMany('App\Models\Like', 'like');
    }

    //用户收藏的文章
    public function article_collections()
    {
        return $this->morphedByMany('App\Models\Article', 'collection');
    }

    //用户收藏的帖子
    public function posts_collections()
    {
        return $this->morphedByMany('App\Models\CommunityArticle', 'collection');
    }

    //用户专栏
    public function blog()
    {
        return $this->hasOne('App\Models\Blog');
    }
}
