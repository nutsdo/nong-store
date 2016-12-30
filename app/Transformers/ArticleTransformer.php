<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2016/12/29
 * Time: 下午9:31
 */

namespace App\Transformers;


class ArticleTransformer extends BaseTransformer
{
    public function transformData($model)
    {
        return $model->attributesToArray();
    }
}