<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 8/31/15
 * Time: 11:47 AM
 */
 ?>

<div class="form-group">
 {!! Form::label('name', '配置名称',['class'=>'control-label col-sm-2']) !!}
    <div class="col-sm-10">
     {!! Form::text('name',null,[
         'class'=>'form-control',
         'data-validate'=>'required',
         'data-message-required'=>'请输入配置名称',
         'placeholder'=>'配置名称'
     ]) !!}
    </div>
 {!! $errors->first('name') !!}
</div>
<div class="form-group">
    {!! Form::label('value', '配置值',['class'=>'control-label col-sm-2']) !!}
    <div class="col-sm-10">
    {!! Form::text('value',null,[
        'class'=>'form-control',
        'placeholder'=>'配置值'
    ]) !!}
    </div>
    {!! $errors->first('value') !!}
</div>

<div class="form-group">
 {!! Form::label('type', '配置类型',['class'=>'control-label col-sm-2']) !!}
    <div class="col-sm-10">
     {!! Form::text('type',null,[
         'class'=>'form-control',
         'placeholder'=>'配置类型'
     ]) !!}
    </div>
 {!! $errors->first('type') !!}
</div>

<div class="form-group">
    {!! Form::label('', '',['class'=>'control-label col-sm-2']) !!}
    <div class="col-sm-10">
    {!! Form::submit($submitButtonText,['class'=>'btn btn-success']) !!}
    {!! Form::reset('重置',['class'=>'btn btn-white']) !!}
    </div>
</div>