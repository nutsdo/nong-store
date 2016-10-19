<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 8/29/15
 * Time: 11:06 AM
 */
 ?>
<div class="form-group">
    {!! Form::label('category_name', '分类名称',['class'=>'control-label']) !!}
    {!! Form::text('category_name',null,[
        'class'=>'form-control',
        'data-validate'=>'required',
        'data-message-required'=>'请输入您的分类名称.',
        'placeholder'=>'分类名称'
    ]) !!}
    {!! $errors->first('category_name') !!}
</div>

{{--<div class="form-group">--}}
    {{--{!! Form::label('category_type', '类型') !!}--}}
    {{--{!! Form::select('category_type', ['category'=>'分类','article'=>'文章','page'=>'单页','images'=>'图片','video'=>'视频'], null, [ 'class' => 'form-control' ]) !!}--}}
    {{--{!! $errors->first('category_type') !!}--}}
{{--</div>--}}

{{--<div class="form-group">--}}
    {{--{!! Form::label('keywords', '关键词',['class'=>'control-label']) !!}--}}
    {{--{!! Form::text('keywords',null,[--}}
        {{--'class'=>'form-control',--}}
        {{--'placeholder'=>'关键词'--}}
    {{--]) !!}--}}
{{--</div>--}}

{{--<div class="form-group">--}}
    {{--{!! Form::label('description', '分类描述',['class'=>'control-label']) !!}--}}
    {{--{!! Form::text('description',null,[--}}
        {{--'class'=>'form-control',--}}
        {{--'placeholder'=>'分类描述'--}}
    {{--]) !!}--}}
{{--</div>--}}

<div class="form-group">
    {!! Form::label('father_id', '上级分类') !!}
    {!! Form::select('father_id', $categories, null, [ 'class' => 'form-control' ]) !!}
    {!! $errors->first('father_id') !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText,['class'=>'btn btn-success']) !!}
    {!! Form::reset('重置',['class'=>'btn btn-white']) !!}
</div>