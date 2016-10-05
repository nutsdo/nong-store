<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2016/10/1
 * Time: 下午1:47
 */
?>
@extends('layouts.front')
{{ $product->title }}
<br>
价格：{{ $product->price }}
{!! Html::image($product->pic_url) !!}
<button href="javascript:;">立即购买</button>