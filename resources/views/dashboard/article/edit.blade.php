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
  <div class="panel-heading">修改文章</div>
  <div class="panel-body">

  {!! Form::model($article,['route'=>['dashboard.articles.update',$article->id],'class'=>'validate form-horizontal','method'=>'PATCH','id'=>'form']) !!}
     @include('dashboard.article.partials.form',['submitButtonText'=>'保存','path'=>$article->pic_url])
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
