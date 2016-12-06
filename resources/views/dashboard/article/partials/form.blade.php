<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 8/31/15
 * Time: 11:47 AM
 */
 ?>

 <div class="form-group">
    {!! Form::label('category_id', '所属分类',['class'=>'control-label col-sm-2']) !!}
     <div class="col-sm-10">
    {!! Form::select('category_id', $categories, null, [ 'class' => 'form-control' ]) !!}
     </div>
    {!! $errors->first('category_id') !!}
 </div>
 <div class="form-group">
     {!! Form::label('title', '文章标题',['class'=>'control-label col-sm-2']) !!}
     <div class="col-sm-10">
     {!! Form::text('title',null,[
         'class'=>'form-control',
         'data-validate'=>'required',
         'data-message-required'=>'请输入文章标题.',
         'placeholder'=>'文章标题'
     ]) !!}
     </div>
     {!! $errors->first('title') !!}
 </div>

 <div class="form-group">
     {!! Form::label('thumb_url', '文章封面',['class'=>'control-label col-sm-2']) !!}
     <div class="col-sm-9">
     {!! Form::text('thumb_url',null,[
         'class'=>'form-control',
         'placeholder'=>'文章封面'
     ]) !!}
     </div>
     <a href="javascript:;" data-input="thumb_url" class="btn btn-primary btn-single btn-sm file-upload">上传</a>

     {!! $errors->first('thumb_url') !!}
 </div>
@if($path)
 <div class="form-group" id="preview_pic">

    {!! Form::image($path,null,['id'=>'pic_path','width'=>'80']) !!}

 </div>
@endif
{{--<div class="form-group">--}}
    {{--{!! Form::label('is_show', '是否发表',['class'=>'control-label col-sm-2']) !!}<br/>--}}
    {{--<div class="col-sm-2">--}}
        {{--<input type="radio" name="is_published" value="1" class="cbr cbr-success" checked>发表--}}
    {{--</div>--}}
    {{--<div class="col-sm-2">--}}
        {{--<input type="radio" name="is_published" value="0" class="cbr cbr-secondary">不发表--}}
    {{--</div>--}}
    {{--{!! $errors->first('is_published') !!}--}}
{{--</div>--}}
<div class="form-group">
    {!! Form::label('published_time', '发布时间',['class'=>'control-label col-sm-2']) !!}
    <div class="input-group col-sm-4 date form_datetime" style="padding-left:15px" data-date-format="yyyy-mm-dd hh:ii:ss" data-link-field="time">
        {!! Form::text('published_time',null,[
            'class'=>'form-control',
            'data-validate'=>'required',
            'data-message-required'=>'请输入发布时间',
            'placeholder'=>'发布时间，用于定时发布',
            'readonly'  =>true
        ]) !!}
        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
    </div>
    <input type="hidden" id="time" value="" />
    {!! $errors->first('published_time') !!}
</div>

 <div class="form-group">
     {!! Form::label('body', '文章内容',['class'=>'control-label col-sm-2']) !!}
     <div class="col-sm-10">
     {!! Form::textarea('body',null,[
         'class'=>'form-control',
         'placeholder'=>'文章内容'
     ]) !!}
     </div>
 </div>

 <div class="form-group">
     {!! Form::label('', '',['class'=>'control-label col-sm-2']) !!}
     <div class="col-sm-10">
     {!! Form::submit($submitButtonText,['class'=>'btn btn-success']) !!}
     {!! Form::reset('重置',['class'=>'btn btn-white']) !!}
     </div>
 </div>