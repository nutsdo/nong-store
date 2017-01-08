<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 8/31/15
 * Time: 11:47 AM
 */
 ?>
 <div class="form-group">
     {!! Form::label('title', '标题',['class'=>'control-label col-sm-2']) !!}
     <div class="col-sm-10">
     {!! Form::text('title',null,[
         'class'=>'form-control',
         'data-validate'=>'required',
         'data-message-required'=>'请输入标题.',
         'placeholder'=>'标题'
     ]) !!}
     </div>
     {!! $errors->first('title') !!}
 </div>

<div class="form-group">
    {!! Form::label('image_url', '图片地址',['class'=>'control-label col-sm-2']) !!}
    <div class="col-sm-9">
        {!! Form::text('image_url',null,[
            'class'=>'form-control col-xs-4',
            'placeholder'=>'推荐图片地址'
        ]) !!}
    </div>
    <a href="javascript:;" data-input="image_url" class="btn btn-primary btn-single btn-sm file-upload">上传</a>
    {!! $errors->first('image_url') !!}
</div>
@if($path)
    <div class="form-group" id="rec_pic_url">
        <div class="col-sm-2"></div>
        <div class="col-sm-2">
            {!! Form::image($path,null,['id'=>'image_url','width'=>'200']) !!}
        </div>
    </div>
@endif

 <div class="form-group">
     {!! Form::label('route_url', '链接',['class'=>'control-label col-sm-2']) !!}
     <div class="col-sm-10">
     {!! Form::text('route_url',null,[
         'class'=>'form-control',
         'placeholder'=>'链接'
     ]) !!}
     </div>
     {!! $errors->first('route_url') !!}
 </div>

 <div class="form-group">
     {!! Form::label('type', '类型',['class'=>'control-label col-sm-2']) !!}
     <div class="col-sm-10">
     {!! Form::text('type',null,[
         'class'=>'form-control',
         'placeholder'=>'类型'
     ]) !!}
     </div>
     {!! $errors->first('type') !!}
 </div>

<div class="form-group">
    {!! Form::label('is_banned', '是否禁用',['class'=>'control-label col-sm-2']) !!}
    <div class="checkbox">
        <div class="col-sm-2">
            <input type="radio" name="is_banned" value="1" class="cbr cbr-success">禁用
        </div>
        <div class="col-sm-2">
            <input type="radio" name="is_banned" value="0" class="cbr cbr-secondary" checked>正常
        </div>
    </div>
    {!! $errors->first('is_banned') !!}
</div>
 <div class="form-group">
     {!! Form::label('description', '简介',['class'=>'control-label col-sm-2']) !!}
     <div class="col-sm-10">
     {!! Form::textarea('description',null,[
         'class'=>'form-control',
         'placeholder'=>'简介'
     ]) !!}
     </div>
 </div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {!! Form::submit($submitButtonText,['class'=>'btn btn-success']) !!}
        {!! Form::reset('重置',['class'=>'btn btn-white']) !!}
    </div>
</div>
