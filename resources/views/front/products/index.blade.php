<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2016/10/1
 * Time: 下午1:36
 */
?>
@extends('layouts.front')
@foreach($products as $product)
    <a href="{{ url('products/show/'.$product->id) }}">{{ $product->title }}</a>
@endforeach