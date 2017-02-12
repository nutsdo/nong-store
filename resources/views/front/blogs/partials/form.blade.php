<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/2/12
 * Time: 上午11:29
 */
?>
<div class="form-group">
    {!! Form::label('name', '专栏名称',['class'=>'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::text('name',null,[
         'class'=>'form-control',
         'data-validate'=>'required',
         'data-message-required'=>'专栏名称不能为空',
         'placeholder'=>'请填写专栏名称...'
     ]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('slug', '别名',['class'=>'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::text('slug',null,[
         'class'=>'form-control',
         'data-validate'=>'required',
         'data-message-required'=>'别名不能为空',
         'placeholder'=>'请填写专栏别名...'
     ]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('cover', '专栏封面',['class'=>'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        <label class="btn btn-secondary btn-icon" for="inputImage">
            <input type="file" class="sr-only" id="inputImage" name="file" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
            <i class="fa-cloud-upload"></i>
            <span>选择图片</span>
        </label>
    </div>
    @if($currentRoute=='user.blogs.edit')
        <div class="col-sm-offset-2 col-sm-10 row cover-preview">
        {!! Html::image($blog->cover,null, ['class'=>'img-responsive','width'=> 200]) !!}
        </div>
    @endif
    <div class="col-sm-offset-2 col-sm-10 row crop-box hide">
        <div class="col-md-8">

            <strong class="text-primary">原始图片</strong>
            <br />
            <br />

            <div class="img-container">
                {!! Html::image($blog->cover,null, ['id'=>'image', 'class'=>'img-responsive']) !!}
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
    {!! Form::hidden('cover',$blog->cover) !!}
</div>
<div class="form-group">
    {!! Form::label('description', '专栏简介',['class'=>'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::textarea('description',null,[
            'class'=>'form-control',
            'placeholder'=>'请填写专栏简介...'
        ]) !!}
    </div>

</div>


