<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class ArticleCategory extends Model
{
    use NodeTrait;
    //
    protected $table = 'feature_article_category';

    const CREATED_AT = 'created_time';
    const UPDATED_AT = 'updated_time';

    //const PARENT_ID = 'father_id';

    protected $guarded = ['id'];

    protected $visible  = ['id','father_id','category_name','children'];

    public function getParentIdName()
    {
        return 'father_id'; // TODO: Change the autogenerated stub
    }

    public function articles()
    {
        return $this->hasMany('App\Models\Article','category_id');
    }
}
