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
  <div class="panel-heading">添加用户信息</div>
  <div class="panel-body">

  {!! Form::model(null,['route'=>['dashboard.user.store'],'class'=>'validate form-horizontal','method'=>'POST','id'=>'form']) !!}
     @include('dashboard.user.partials.form',['submitButtonText'=>'创建','is_create'=>true,'path'=>''])
  {!! Form::close() !!}
  </div>
</div>

@stop

@include('upload.single',['type'=>'user'])

