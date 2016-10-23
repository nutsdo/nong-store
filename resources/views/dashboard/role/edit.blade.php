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
  <div class="panel-heading">修改角色信息</div>
  <div class="panel-body">

  {!! Form::model($role,['route'=>['dashboard.role.update',$role->id],'class'=>'validate form-horizontal','method'=>'PATCH','id'=>'form']) !!}
     @include('dashboard.role.partials.form',['submitButtonText'=>'保存','path'=>''])
  {!! Form::close() !!}
  </div>
</div>

@stop

@include('upload.single',['type'=>'admin'])

