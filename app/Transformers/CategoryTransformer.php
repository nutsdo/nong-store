<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2016/12/31
 * Time: 上午10:52
 */

namespace App\Transformers;


class CategoryTransformer extends BaseTransformer
{
    public function transformData($model)
    {
        // TODO: Implement transformData() method.
        return [
            'id'            => $model->id,
            'category_name' => $model->category_name,
            'father_id'     => $model->father_id,
        ];
    }
}