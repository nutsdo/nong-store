<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 8/31/15
 * Time: 11:47 AM
 */
 ?>

 <div class="form-group">
     {!! Form::label('name', '用户名',['class'=>'control-label col-sm-2']) !!}
     <div class="col-sm-10">
     {!! Form::text('name',null,[
         'class'=>'form-control',
         'data-validate'=>'required',
         'data-message-required'=>'请输入用户名.',
         'placeholder'=>'用户名'
     ]) !!}
     </div>
     {!! $errors->first('name') !!}
 </div>

<div class="form-group">
    {!! Form::label('email', '邮箱',['class'=>'control-label col-sm-2']) !!}
    <div class="col-sm-10">
    {!! Form::text('email',null,[
        'class'=>'form-control',
        'placeholder'=>'邮箱'
    ]) !!}
    </div>
    {!! $errors->first('email') !!}
</div>

<div class="form-group">
    {!! Form::label('phone', '手机号',['class'=>'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::text('phone',null,[
            'class'=>'form-control',
            'placeholder'=>'手机号'
        ]) !!}
    </div>
    {!! $errors->first('phone') !!}
</div>
@if($is_create)
<div class="form-group">
    {!! Form::label('password', '密码',['class'=>'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::password('password',[
            'class'=>'form-control',
            'placeholder'=>'密码'
        ]) !!}
    </div>
    {!! $errors->first('password') !!}
</div>

<div class="form-group">
    {!! Form::label('password_confirmation', '确认密码',['class'=>'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::password('password_confirmation',[
            'class'=>'form-control',
            'placeholder'=>'确认密码'
        ]) !!}
    </div>
    {!! $errors->first('password_confirmation') !!}
</div>
@endif
<div class="form-group">
 {!! Form::label('avatar', '头像',['class'=>'control-label col-sm-2']) !!}
    <div class="col-sm-9">
     {!! Form::text('avatar',null,[
         'class'=>'form-control',
         'placeholder'=>'头像'
     ]) !!}
    </div>
    <a href="javascript:;" data-input="avatar" class="btn btn-primary btn-single btn-sm file-upload">上传</a>
    {!! $errors->first('avatar') !!}
</div>
@if($path)
<div class="form-group" id="preview_pic">
    {!! Form::label('', '',['class'=>'control-label col-sm-2']) !!}
    <div class="col-sm-9">
    {!! Form::image($path,null,['id'=>'pic_path','width'=>'80']) !!}
    </div>
</div>
@endif

<div class="form-group">
    {!! Form::label('is_banned', '状态',['class'=>'control-label col-sm-2']) !!}
    <div class="checkbox">
        <div class="col-sm-1">
            {!! Form::radio('is_banned', '1', true) !!}禁用
        </div>
        <div class="col-sm-1">
            {!! Form::radio('is_banned', '0', true) !!}正常
        </div>
    </div>
    {!! $errors->first('is_banned') !!}
</div>
<br>
<div class="form-group">
    {!! Form::label('', '',['class'=>'control-label col-sm-2']) !!}
    {!! Form::submit($submitButtonText,['class'=>'btn btn-success']) !!}
    {!! Form::reset('重置',['class'=>'btn btn-white']) !!}
</div>