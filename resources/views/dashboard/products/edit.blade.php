<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 8/31/15
 * Time: 11:46 AM
 */
 ?>
@extends('layouts.dashboard')
@section('main')
<div class="panel panel-default">
  <div class="panel-heading">添加商品</div>
  <div class="panel-body">

  {!! Form::model($product,['route'=>'dashboard.products.store','class'=>'validate','method'=>'post','data-ajax'=>'true','id'=>'form']) !!}
     @include('dashboard.products.form',['submitButtonText'=>'保存','path'=>$product->pic_url])
  {!! Form::close() !!}
  </div>
</div>

@stop

@include('upload.single',['type'=>'products'])
