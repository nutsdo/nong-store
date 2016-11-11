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

  {!! Form::model($banner,['route'=>['dashboard.banner.update',$banner->id],'class'=>'validate form-horizontal','method'=>'PATCH','data-ajax'=>'true','id'=>'form']) !!}
     @include('dashboard.banner.partials.form',['submitButtonText'=>'保存','path'=>$banner->image_url])
  {!! Form::close() !!}
  </div>
</div>

@stop

@include('upload.single',['type'=>'products'])
