<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 8/31/15
 * Time: 11:47 AM
 */
 ?>

<div class="form-group">
 {!! Form::label('role_name', '角色名称',['class'=>'control-label col-sm-2']) !!}
    <div class="col-sm-10">
     {!! Form::text('role_name',null,[
         'class'=>'form-control',
         'data-validate'=>'required',
         'data-message-required'=>'请输入角色名称.',
         'placeholder'=>'角色名称'
     ]) !!}
    </div>
 {!! $errors->first('title') !!}
</div>
<div class="form-group">
    {!! Form::label('display_name', '显示名称',['class'=>'control-label col-sm-2']) !!}
    <div class="col-sm-10">
    {!! Form::text('display_name',null,[
        'class'=>'form-control',
        'placeholder'=>'显示名称'
    ]) !!}
    </div>
    {!! $errors->first('display_name') !!}
</div>

<div class="form-group">
 {!! Form::label('description', '描述',['class'=>'control-label col-sm-2']) !!}
    <div class="col-sm-10">
     {!! Form::text('description',null,[
         'class'=>'form-control',
         'placeholder'=>'描述'
     ]) !!}
    </div>
 {!! $errors->first('description') !!}
</div>

<div class="form-group">
    {!! Form::label('is_banned', '状态',['class'=>'control-label col-sm-2']) !!}
    <div class="checkbox">
        <div class="col-sm-2">
            {!! Form::radio('is_banned', '1', true) !!}禁用
        </div>
        <div class="col-sm-2">
            {!! Form::radio('is_banned', '0', true) !!}正常
        </div>
    </div>
    {!! $errors->first('is_banned') !!}
</div>
<div class="form-group">
    {!! Form::label('', '',['class'=>'control-label col-sm-2']) !!}
    <div class="col-sm-10">
    {!! Form::submit($submitButtonText,['class'=>'btn btn-success']) !!}
    {!! Form::reset('重置',['class'=>'btn btn-white']) !!}
    </div>
</div>