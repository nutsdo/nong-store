<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 8/29/15
 * Time: 11:06 AM
 */
 ?>
<div class="form-group">
    {!! Form::label('title', '分类名称',['class'=>'control-label']) !!}
    {!! Form::text('title',null,[
        'class'=>'form-control',
        'data-validate'=>'required',
        'data-message-required'=>'请输入您的分类名称.',
        'placeholder'=>'分类名称'
    ]) !!}
</div>

<div class="form-group">
    {!! Form::label('description', '分类描述',['class'=>'control-label']) !!}
    {!! Form::text('description',null,[
        'class'=>'form-control',
        'placeholder'=>'分类描述'
    ]) !!}
</div>

<div class="form-group">
    {!! Form::label('icon', '分类图标',['class'=>'control-label']) !!}
    {!! Form::text('icon',null,[
        'class'=>'form-control',
        'placeholder'=>'分类图标'
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label('parent_id', '上级分类') !!}
    {!! Form::select('parent_id', $categories, null, [ 'class' => 'form-control' ]) !!}
    {!! $errors->first('parent_id') !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText,['class'=>'btn btn-success']) !!}
    {!! Form::reset('重置',['class'=>'btn btn-white']) !!}
</div>