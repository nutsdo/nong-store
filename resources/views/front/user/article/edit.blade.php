<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/1/8
 * Time: 下午5:40
 */
?>

{!! Form::model($article,['url'=>dingo_route('local','api.user.profile','profile'),'class'=>'validate form-horizontal','method'=>'put','id'=>'form']) !!}

<div class="form-group">
    {!! Form::label('title', '标题',['class'=>'control-label col-sm-2']) !!}

    <div class="col-sm-10">
        {!! Form::text('title',null,[
             'class'=>'form-control',
             'data-validate'=>'required',
             'data-message-required'=>'请输入文章标题.',
             'placeholder'=>'请输入文章标题'
         ]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('thumb_url', '文章封面',['class'=>'control-label col-sm-2']) !!}
    <div class="col-sm-8">
        {!! Form::text('thumb_url',null,[
         'class'=>'form-control',
         'placeholder'=>'请输入封面连接'
     ]) !!}
    </div>
    <div class="col-sm-2">
        <button type="button" class="btn btn-success">上传</button>
    </div>
</div>
<div class="form-group">
    {!! Form::label('body', '内容',['class'=>'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::textarea('body',null,[
             'class'=>'form-control',
             'id'=>'body',
             'placeholder'=>'文章内容'
         ]) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-4">
        <button type="button" class="btn btn-success">保存草稿</button>
        <button type="button" class="btn btn-success submit">提交审核</button>
    </div>
</div>
{!! Form::close() !!}
@section('scripts')
    {!! Html::script('assets/ckeditor/ckeditor.js') !!}
    {!! Html::script('assets/ckfinder/ckfinder.js') !!}
    <script>
        var editor = CKEDITOR.replace( 'body' ,{
            customConfig : 'custom/front_config.js',
            filebrowserImageUploadUrl:'/assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
            //filebrowserImageUploadUrl:'/upload'
        });
        CKFinder.setupCKEditor( editor, '/ckfinder/' );
//
//        editor.on('fileUploadRequest',function(evt){
//            var xhr = evt.data.fileLoader.xhr;
//
//            //"X-CSRF-TOKEN" : $('meta[name=csrf-token]').attr('content')
//            xhr.setRequestHeader( "X-CSRF-TOKEN", $('meta[name=csrf-token]').attr('content') );
//        });
    </script>
@endsection
