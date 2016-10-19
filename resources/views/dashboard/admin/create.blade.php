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
  <div class="panel-heading">修改管理员信息</div>
  <div class="panel-body">

  {!! Form::model(null,['route'=>['dashboard.admin.store'],'class'=>'validate','method'=>'POST','id'=>'form']) !!}
     @include('dashboard.admin.partials.create_form',['submitButtonText'=>'保存','path'=>''])
  {!! Form::close() !!}
  </div>
</div>

@stop

@include('upload.single',['type'=>'admin'])

