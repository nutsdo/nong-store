<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 8/31/15
 * Time: 11:47 AM
 */
 ?>
<div class="form-group">
    {!! Form::label('father_id', '上级菜单') !!}
    {!! Form::select('father_id', $categories, null, [ 'class' => 'form-control' ]) !!}
    {!! $errors->first('father_id') !!}
</div>

<div class="form-group">
 {!! Form::label('fun_name', '菜单名称',['class'=>'control-label']) !!}
 {!! Form::text('fun_name',null,[
     'class'=>'form-control',
     'data-validate'=>'required',
     'data-message-required'=>'请输入菜单名称.',
     'placeholder'=>'菜单名称'
 ]) !!}
 {!! $errors->first('title') !!}
</div>
<div class="form-group">
    {!! Form::label('fun_route_name', '菜单路由名称',['class'=>'control-label']) !!}
    {!! Form::text('fun_route_name',null,[
        'class'=>'form-control',
        'placeholder'=>'菜单路由名称，如dashboard.menu.create'
    ]) !!}
    {!! $errors->first('fun_route_name') !!}
</div>
<div class="form-group">
    {!! Form::label('fun_url', '菜单URL',['class'=>'control-label']) !!}
    {!! Form::text('fun_url',null,[
        'class'=>'form-control',
        'placeholder'=>'菜单URL，如dashboard/menu/create'
    ]) !!}
    {!! $errors->first('fun_url') !!}
</div>

<div class="form-group">
    {!! Form::label('fun_icon', '菜单图标',['class'=>'control-label']) !!}
    {!! Form::text('fun_icon',null,[
        'class'=>'form-control',
        'placeholder'=>'菜单图标'
    ]) !!}
    {!! $errors->first('fun_icon') !!}
</div>

<div class="form-group">
    {!! Form::label('sort', '排序',['class'=>'control-label']) !!}
    {!! Form::text('sort',null,[
        'class'=>'form-control',
        'placeholder'=>'排序'
    ]) !!}
    {!! $errors->first('fun_icon') !!}
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