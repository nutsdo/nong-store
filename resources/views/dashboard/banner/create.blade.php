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
  <div class="panel-heading">添加banner</div>
  <div class="panel-body">

  {!! Form::model(null,['route'=>'dashboard.banner.store','class'=>'validate form-horizontal','method'=>'post','data-ajax'=>'true','id'=>'form']) !!}
     @include('dashboard.banner.partials.form',['submitButtonText'=>'添加','path'=>''])
  {!! Form::close() !!}
  </div>
</div>

@stop

@include('upload.single',['type'=>'products'])

