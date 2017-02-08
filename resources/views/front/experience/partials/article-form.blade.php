<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/2/6
 * Time: 下午9:32
 */
?>
<div class="form-group">
    {!! Form::label('title', '标题',['class'=>'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::text('title',old('title'),[
         'class'=>'form-control',
         'data-validate'=>'required',
         'data-message-required'=>'标题不能为空',
         'placeholder'=>'文章标题...'
     ]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('product', '选择产品',['class'=>'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::hidden('experiencer_product_id') !!}
        <button class="btn btn-secondary btn-icon" type="button">
            <i class="fa-cloud-upload"></i>
            <span>我的试用</span>
        </button>

        <label class="btn btn-secondary btn-icon" for="inputImage">
            <input type="file" class="sr-only" id="inputImage" name="file" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
            <i class="fa-cloud-upload"></i>
            <span>选择图片</span>
        </label>
        {!! Form::hidden('thumb_url') !!}
    </div>
    <div class="col-sm-offset-2 col-sm-10 row">
        <div class="col-md-8">

            <strong class="text-primary">原始图片</strong>
            <br />
            <br />

            <div class="img-container">
                <img src="/uploads/bg_main.jpg" class="img-responsive" />
            </div>

        </div>
        <div class="col-md-4">

            <strong class="text-primary">预览</strong>
            <br />
            <br />
            <div class="img-shade">
                <div id="img-preview" class="img-preview"></div>
            </div>
            {!! Form::hidden('x') !!}
            {!! Form::hidden('y') !!}
            {!! Form::hidden('w') !!}
            {!! Form::hidden('h') !!}

            <button id="crop-img" class="btn btn-secondary">上传</button>

        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::label('body', '文章内容',['class'=>'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::textarea('body',old('body'),[
            'class'=>'form-control',
            'id'   => 'body',
            'placeholder'=>'请详细描述您的体验经历...'
        ]) !!}
    </div>

</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-4">
        <button type="submit" class="btn btn-success review">提交审核</button>
    </div>
</div>
