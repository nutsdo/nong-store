<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExperienceApply extends Model
{

    protected $guarded = [];

    public function scopeOfUser($query, $user_id)
    {
        $query->where('user_id', $user_id);
    }
}
