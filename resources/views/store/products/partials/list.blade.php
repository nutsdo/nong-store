<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/2/14
 * Time: 下午10:34
 */
?>
@unless($products->isEmpty())
    @foreach($products as $product)
        <div class="col-md-3 col-sm-4 col-xs-6 grid-item">
            <div class="album-image thumbnail">
                <a href="{{ route('product.show', $product->id) }}" class="thumb" data-action="edit">
                    {!! Html::image($product->thumb_url,$product->title,['class'=>'img-responsive']) !!}
                </a>
                <div class="caption">
                    <p><a href="{{ route('product.show', $product->id) }}" class="text-gray">{{ $product->title }}</a></p>
                    <p><strong class="text-red sale-price"><i class="fa fa-rmb"></i>{{ $product->sale_price }}</strong>  <del class="market-price"><i class="fa fa-rmb"></i>{{ $product->market_price }}</del></p>
                    <p>
                        <span href="#" class="" role="button">销量 <span class="badge badge-info">{{ $product->sale_count }}</span></span> |
                        <span href="#" class="" role="button">评论 <span class="badge badge-info">979</span></span>
                    </p>
                </div>
            </div>
        </div>
    @endforeach
@endunless
