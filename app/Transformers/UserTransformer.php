<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2016/12/15
 * Time: 下午10:35
 */

namespace App\Transformers;


class UserTransformer extends BaseTransformer
{
    public function transformData($model)
    {
        // TODO: Implement transformData() method.
        return $model->attributesToArray();
    }
}