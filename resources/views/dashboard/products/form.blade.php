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
     {!! Form::label('title', '产品名称',['class'=>'control-label']) !!}
     {!! Form::text('title',null,[
         'class'=>'form-control',
         'data-validate'=>'required',
         'data-message-required'=>'请输入您的产品名称.',
         'placeholder'=>'产品名称'
     ]) !!}
     {!! $errors->first('title') !!}
 </div>

 <div class="form-group">
     {!! Form::label('number', '商品数量',['class'=>'control-label']) !!}
     {!! Form::text('number',null,[
         'class'=>'form-control',
         'placeholder'=>'商品数量'
     ]) !!}
     {!! $errors->first('number') !!}
 </div>

 <div class="form-group">
     {!! Form::label('price', '商品价格',['class'=>'control-label']) !!}
     {!! Form::text('price',null,[
         'class'=>'form-control',
         'placeholder'=>'商品价格'
     ]) !!}
     {!! $errors->first('price') !!}
 </div>

 <div class="form-group">
     {!! Form::label('pic_url', '商品图片',['class'=>'control-label']) !!}
     {!! Form::text('pic_url',null,[
         'class'=>'form-control',
         'placeholder'=>'商品图片'
     ]) !!}
     {!! $errors->first('pic_url') !!}
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
    {!! Form::label('is_show', '是否上架') !!}<br/>
    <div class="col-sm-2">
        <input type="radio" name="is_show" value="1" class="cbr cbr-success" checked>上架
    </div>
    <div class="col-sm-2">
        <input type="radio" name="is_show" value="0" class="cbr cbr-secondary">下架
    </div>
    {!! $errors->first('is_show') !!}
</div>
<br>
 <div class="form-group">
     {!! Form::label('body', '商品详情',['class'=>'control-label']) !!}
     {!! Form::textarea('body',null,[
         'class'=>'form-control',
         'placeholder'=>'商品详情'
     ]) !!}
 </div>

 <div class="form-group">
     {!! Form::submit($submitButtonText,['class'=>'btn btn-success']) !!}
     {!! Form::reset('重置',['class'=>'btn btn-white']) !!}
 </div>