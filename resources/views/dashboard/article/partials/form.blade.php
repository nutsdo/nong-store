<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 8/31/15
 * Time: 11:47 AM
 */
 ?>

 <div class="form-group">
    {!! Form::label('category_id', '所属分类') !!}
    {!! Form::select('category_id', $categories, null, [ 'class' => 'form-control' ]) !!}
    {!! $errors->first('category_id') !!}
 </div>
 <div class="form-group">
     {!! Form::label('title', '文章标题',['class'=>'control-label']) !!}
     {!! Form::text('title',null,[
         'class'=>'form-control',
         'data-validate'=>'required',
         'data-message-required'=>'请输入文章标题.',
         'placeholder'=>'文章标题'
     ]) !!}
     {!! $errors->first('title') !!}
 </div>

 {{--<div class="form-group">--}}
     {{--{!! Form::label('author', '作者',['class'=>'control-label']) !!}--}}
     {{--{!! Form::text('author',null,[--}}
         {{--'class'=>'form-control',--}}
         {{--'placeholder'=>'原文作者'--}}
     {{--]) !!}--}}
     {{--{!! $errors->first('author') !!}--}}
 {{--</div>--}}

 {{--<div class="form-group">--}}
     {{--{!! Form::label('keywords', '关键词',['class'=>'control-label']) !!}--}}
     {{--{!! Form::text('keywords',null,[--}}
         {{--'class'=>'form-control',--}}
         {{--'placeholder'=>'文章关键词'--}}
     {{--]) !!}--}}
     {{--{!! $errors->first('keywords') !!}--}}
 {{--</div>--}}

 <div class="form-group">
     {!! Form::label('thumb_url', '文章封面',['class'=>'control-label']) !!}
     {!! Form::text('thumb_url',null,[
         'class'=>'form-control',
         'placeholder'=>'文章封面'
     ]) !!}
     {!! $errors->first('thumb_url') !!}
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
    {!! Form::label('is_show', '是否发表') !!}<br/>
    <div class="col-sm-2">
        <input type="radio" name="is_published" value="1" class="cbr cbr-success" checked>发表
    </div>
    <div class="col-sm-2">
        <input type="radio" name="is_published" value="0" class="cbr cbr-secondary">不发表
    </div>
    {!! $errors->first('is_published') !!}
</div>
<br>
 <div class="form-group">
     {!! Form::label('body', '文章内容',['class'=>'control-label']) !!}
     {!! Form::textarea('body',null,[
         'class'=>'form-control',
         'placeholder'=>'文章内容'
     ]) !!}
 </div>

 <div class="form-group">
     {!! Form::submit($submitButtonText,['class'=>'btn btn-success']) !!}
     {!! Form::reset('重置',['class'=>'btn btn-white']) !!}
 </div>