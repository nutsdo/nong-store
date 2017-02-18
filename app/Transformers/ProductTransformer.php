<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/2/16
 * Time: 下午9:52
 */

namespace App\Transformers;


use Vinkla\Hashids\Facades\Hashids;

class ProductTransformer extends BaseTransformer
{
    public function transformData($model)
    {
        // TODO: Implement transformData() method.
        return [
            'hashid'         => Hashids::encode($model->id),
            'category_id'    => $model->category_id,
            'title'          => $model->title,
            'number'         => $model->number,
            'market_price'   => $model->market_price,
            'sale_price'     => $model->sale_price,
            'thumb_url'      => $model->thumb_url,
            'body'           => $model->body,
        ];
    }
}