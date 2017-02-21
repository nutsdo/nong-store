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
    {!! Form::select('category_id', $categories, null, [ 'class' => 'form-control col-sm-2' ]) !!}
     </div>
    {!! $errors->first('category_id') !!}
 </div>
 <div class="form-group">
     {!! Form::label('title', '产品名称',['class'=>'control-label col-sm-2']) !!}
     <div class="col-sm-10">
     {!! Form::text('title',null,[
         'class'=>'form-control',
         'data-validate'=>'required',
         'data-message-required'=>'请输入您的产品名称.',
         'placeholder'=>'产品名称'
     ]) !!}
     </div>
     {!! $errors->first('title') !!}
 </div>

 <div class="form-group">
     {!! Form::label('number', '商品库存',['class'=>'control-label col-sm-2']) !!}
     <div class="col-sm-10">
     {!! Form::text('number',null,[
         'class'=>'form-control',
         'placeholder'=>'商品库存'
     ]) !!}
     </div>
     {!! $errors->first('number') !!}
 </div>

 <div class="form-group">
     {!! Form::label('market_price', '市场价格',['class'=>'control-label col-sm-2']) !!}
     <div class="col-sm-10">
     {!! Form::text('market_price',null,[
         'class'=>'form-control',
         'placeholder'=>'市场价格'
     ]) !!}
     </div>
     {!! $errors->first('market_price') !!}
 </div>

 <div class="form-group">
     {!! Form::label('sale_price', '销售价格',['class'=>'control-label col-sm-2']) !!}
     <div class="col-sm-10">
     {!! Form::text('sale_price',null,[
         'class'=>'form-control',
         'placeholder'=>'销售价格'
     ]) !!}
     </div>
     {!! $errors->first('sale_price') !!}
 </div>

 <div class="form-group">
     {!! Form::label('thumb_url', '商品缩略图',['class'=>'control-label col-sm-2']) !!}
     <div class="col-sm-9">
     {!! Form::text('thumb_url',null,[
         'class'=>'form-control',
         'placeholder'=>'商品缩略图'
     ]) !!}
     </div>
     <a href="javascript:;" data-input="thumb_url" class="btn btn-primary btn-single btn-sm file-upload">上传</a>
     {!! $errors->first('thumb_url') !!}
 </div>

<div class="form-group">
    {!! Form::label('rec_pic_url', '推荐图片地址',['class'=>'control-label col-sm-2']) !!}
    <div class="col-sm-9">
    {!! Form::text('rec_pic_url',null,[
        'class'=>'form-control col-xs-4',
        'placeholder'=>'推荐图片地址'
    ]) !!}
    </div>
    <a href="javascript:;" data-input="rec_pic_url" class="btn btn-primary btn-single btn-sm file-upload">上传</a>
    {!! $errors->first('rec_pic_url') !!}
</div>
@if($path)
 <div class="form-group" id="rec_pic_url">

    {!! Form::image($path,null,['id'=>'rec_pic_url','width'=>'80']) !!}

 </div>
@endif
<div class="form-group">
    {!! Form::label('images', '添加图片',['class'=>'control-label col-sm-2']) !!}
    <div class="col-sm-9">
        <span class="btn btn-success fileinput-button">
            <i class="glyphicon glyphicon-plus"></i>
            <span>添加图片</span>
                <!-- The file input field used as target for the file upload widget -->
            <input id="fileupload" type="file" name="file" multiple>
        </span>
        {{--<button type="button" class="btn btn-primary start">--}}
            {{--<i class="glyphicon glyphicon-upload"></i>--}}
            {{--<span>开始上传</span>--}}
        {{--</button>--}}
        {{--<button type="button" class="btn btn-warning cancel">--}}
            {{--<i class="glyphicon glyphicon-ban-circle"></i>--}}
            {{--<span>取消上传</span>--}}
        {{--</button>--}}
        {{--<button type="button" class="btn btn-danger delete">--}}
            {{--<i class="glyphicon glyphicon-trash"></i>--}}
            {{--<span>删除</span>--}}
        {{--</button>--}}
        {{--<input type="checkbox" class="toggle">--}}
        {{--<!-- The global file processing state -->--}}
        {{--<span class="fileupload-process"></span>--}}
    </div>
    <div class="col-sm-offset-2 image-list">
        @foreach($product->images as $image)
            <img width="100" src="{{ asset($image->image_url) }}" />
            {{ Form::hidden('images[]', $image->image_url) }}
        @endforeach
    </div>
</div>

<div class="form-group">
    {!! Form::label('is_show', '是否上架',['class'=>'control-label col-sm-2']) !!}
    <div class="checkbox">
        <div class="col-sm-2">
            <input type="radio" name="is_show" value="1" class="cbr cbr-success" checked>上架
        </div>
        <div class="col-sm-2">
            <input type="radio" name="is_show" value="0" class="cbr cbr-secondary">下架
        </div>
    </div>
    {!! $errors->first('is_show') !!}
</div>
 <div class="form-group">
     {!! Form::label('body', '商品详情',['class'=>'control-label col-sm-2']) !!}
     <div class="col-sm-10">
     {!! Form::textarea('body',null,[
         'class'=>'form-control',
         'placeholder'=>'商品详情'
     ]) !!}
     </div>
 </div>

 <div class="form-group">
     {!! Form::submit($submitButtonText,['class'=>'btn btn-success']) !!}
     {!! Form::reset('重置',['class'=>'btn btn-white']) !!}
 </div>
