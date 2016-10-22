<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 8/31/15
 * Time: 11:47 AM
 */
 ?>

 <div class="form-group">
     {!! Form::label('admin_name', '管理员帐号',['class'=>'control-label']) !!}
     {!! Form::text('admin_name',null,[
         'class'=>'form-control',
         'data-validate'=>'required',
         'data-message-required'=>'请输入文章标题.',
         'placeholder'=>'文章标题'
     ]) !!}
     {!! $errors->first('title') !!}
 </div>
<div class="form-group">
    {!! Form::label('admin_email', '邮箱',['class'=>'control-label']) !!}
    {!! Form::text('admin_email',null,[
        'class'=>'form-control',
        'placeholder'=>'邮箱'
    ]) !!}
    {!! $errors->first('admin_email') !!}
</div>

<div class="form-group">
 {!! Form::label('avatar', '头像',['class'=>'control-label']) !!}
 {!! Form::text('avatar',null,[
     'class'=>'form-control',
     'placeholder'=>'头像'
 ]) !!}
 {!! $errors->first('avatar') !!}
</div>
<div class="form-group">
<a href="javascript:;" onclick="jQuery('#upload').modal('show', {backdrop: 'fade'});" class="btn btn-primary btn-single btn-sm">上传</a>
</div>

<div class="form-group" id="preview_pic">
@if($path)
{!! Form::image($path,null,['id'=>'pic_path','width'=>'80']) !!}
@endif
</div>

<div class="form-group">
    {!! Form::label('role_id', '选择角色') !!}
    {!! Form::select('role_id', $roles, $role_id, [ 'class' => 'form-control' ,'placeholder' => '请选择']) !!}
    {!! $errors->first('role_id') !!}
</div>

<div class="form-group">
    {!! Form::label('is_banned', '状态') !!}<br/>
    <div class="col-sm-2">
        {!! Form::radio('is_banned', '1', true) !!}禁用
    </div>
    <div class="col-sm-2">
        {!! Form::radio('is_banned', '0', true) !!}正常
    </div>
    {!! $errors->first('is_banned') !!}
</div>
<br>
<div class="form-group">
    {!! Form::submit($submitButtonText,['class'=>'btn btn-success']) !!}
    {!! Form::reset('重置',['class'=>'btn btn-white']) !!}
</div>