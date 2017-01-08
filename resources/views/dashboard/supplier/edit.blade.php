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
  <div class="panel-heading">修改供应商</div>
  <div class="panel-body">

  {!! Form::model($supplier,['route'=>['dashboard.supplier.update',$supplier->id],'class'=>'validate form-horizontal','method'=>'PATCH','data-ajax'=>'true','id'=>'form']) !!}
     @include('dashboard.supplier.partials.form',['submitButtonText'=>'保存'])
  {!! Form::close() !!}
  </div>
</div>

@stop
