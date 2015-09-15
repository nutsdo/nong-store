<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 8/29/15
 * Time: 11:06 AM
 */
 ?>

 <div class="form-group">
     {!! Form::label('article_category_id', '所属分类') !!}
     {!! Form::select('article_category_id', $categories, null, [ 'class' => 'form-control' ]) !!}
     {!! $errors->first('article_category_id') !!}
 </div>

<div class="form-group">
    {!! Form::label('title', '页面标题',['class'=>'control-label']) !!}
    {!! Form::text('title',null,[
        'class'=>'form-control',
        'data-validate'=>'required',
        'data-message-required'=>'请输入页面标题.',
        'placeholder'=>'页面标题'
    ]) !!}
</div>

<div class="form-group">
    {!! Form::label('keywords', '关键词',['class'=>'control-label']) !!}
    {!! Form::text('keywords',null,[
        'class'=>'form-control',
        'placeholder'=>'关键词'
    ]) !!}
</div>

<div class="form-group">
    {!! Form::label('description', '页面描述',['class'=>'control-label']) !!}
    {!! Form::text('description',null,[
        'class'=>'form-control',
        'placeholder'=>'页面描述'
    ]) !!}
</div>

<div class="form-group">
    {!! Form::label('body', '页面内容',['class'=>'control-label']) !!}
    {!! Form::text('body',null,[
        'class'=>'form-control',
        'placeholder'=>'页面内容'
    ]) !!}
</div>

<div class="form-group">
    {!! Form::label('template_name', '模版名',['class'=>'control-label']) !!}
    {!! Form::text('template_name',null,[
        'class'=>'form-control',
        'placeholder'=>'模版名'
    ]) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText,['class'=>'btn btn-success']) !!}
    {!! Form::reset('重置',['class'=>'btn btn-white']) !!}
</div>