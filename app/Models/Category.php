<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\Node;

class Category extends Node
{
    //
    protected $guarded = ['id'];
}
