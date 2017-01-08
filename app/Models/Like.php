<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'user_likes';
    public $timestamps = false;
    protected $guarded = ['id'];

    public function like()
    {
        return $this->morphTo();
    }
}
