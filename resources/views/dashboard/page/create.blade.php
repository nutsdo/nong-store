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
  <div class="panel-heading">添加页面</div>
  <div class="panel-body">

  {!! Form::model($data,['route'=>'dashboard.pages.store','class'=>'validate','method'=>'post','id'=>'form']) !!}
     @include('dashboard.page.partials.form',['submitButtonText'=>'保存'])
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
