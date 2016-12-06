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

  {!! Form::model($data,['route'=>'dashboard.community-articles.store','class'=>'validate form-horizontal','method'=>'post','id'=>'form']) !!}
     @include('dashboard.community_article.partials.form',['submitButtonText'=>'添加','path'=>''])
  {!! Form::close() !!}
  </div>
</div>

@stop

@include('upload.single',['type'=>'articles'])
@section('editor')
    {!! Html::script('assets/ckeditor/ckeditor.js') !!}
    {!! Html::script('assets/ckfinder/ckfinder.js') !!}
    <script>
        var editor = CKEDITOR.replace( 'body' );
        CKFinder.setupCKEditor( editor, '/ckfinder/' );
    </script>
@stop
