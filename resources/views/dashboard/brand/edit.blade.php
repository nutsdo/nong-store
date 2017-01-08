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
  <div class="panel-heading">修改品牌</div>
  <div class="panel-body">

  {!! Form::model($brand,['route'=>['dashboard.brand.update',$brand->id],'class'=>'validate form-horizontal','method'=>'PATCH','data-ajax'=>'true','id'=>'form']) !!}
     @include('dashboard.brand.partials.form',['submitButtonText'=>'保存'])
  {!! Form::close() !!}
  </div>
</div>

@stop
