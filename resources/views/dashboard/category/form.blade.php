<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 8/29/15
 * Time: 11:06 AM
 */
 ?>
<div class="form-group">
    {!! Form::label('father_id', '上级分类',['class'=>'control-label col-sm-2']) !!}
    <div class="col-sm-10">
    {!! Form::select('father_id', $categories, null, [ 'class' => 'form-control' ]) !!}
    </div>
    {!! $errors->first('father_id') !!}
</div>
<div class="form-group">
    {!! Form::label('category_name', '分类名称',['class'=>'control-label col-sm-2']) !!}
    <div class="col-sm-10">
    {!! Form::text('category_name',null,[
        'class'=>'form-control',
        'data-validate'=>'required',
        'data-message-required'=>'请输入您的分类名称.',
        'placeholder'=>'分类名称'
    ]) !!}
    </div>
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
    {!! Form::submit($submitButtonText,['class'=>'btn btn-success']) !!}
    {!! Form::reset('重置',['class'=>'btn btn-white']) !!}
</div>