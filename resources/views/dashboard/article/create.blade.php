<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 8/31/15
 * Time: 11:46 AM
 */
 ?>
@extends('layouts.dashboard')
@section('style')
    {!! Html::style("assets/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css") !!}
@stop
@section('main')
<div class="panel panel-default">
  <div class="panel-heading">添加商品</div>
  <div class="panel-body">

  {!! Form::model($data,['route'=>'dashboard.articles.store','class'=>'validate form-horizontal','method'=>'post','id'=>'form']) !!}
     @include('dashboard.article.partials.form',['submitButtonText'=>'添加','path'=>''])
  {!! Form::close() !!}
  </div>
</div>

@stop
@section('others')
    @include('upload.single',['type'=>'articles'])
@stop

@section('editor')
    @include('dashboard.date-time')
    {!! Html::script('assets/ckeditor/ckeditor.js') !!}
    {!! Html::script('assets/ckfinder/ckfinder.js') !!}
    <script>
        var editor = CKEDITOR.replace( 'body' );
        CKFinder.setupCKEditor( editor, '/ckfinder/' );
    </script>
@stop
