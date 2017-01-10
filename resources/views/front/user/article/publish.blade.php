<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/1/8
 * Time: 下午5:40
 */
?>
@if($loginUser->is_author==1)
{!! Form::model($loginUser,['url'=>dingo_route('local','api.user.profile','profile'),'class'=>'validate form-horizontal','method'=>'put','id'=>'form']) !!}

<div class="form-group">
    <label class="col-sm-2 control-label" for="title">标题</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="title"
               name="title" value=""
               placeholder="请输入文章标题...">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label" for="thumb_url">封面</label>

    <div class="col-sm-8">
        <input type="text" class="form-control" id="thumb_url"
               name="thumb_url" value=""
               placeholder="请输入封面连接...">
    </div>
    <div class="col-sm-2">
        <button type="button" class="btn btn-success">上传</button>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label" for="body">内容</label>

    <div class="col-sm-10">
        <textarea class="form-control" cols="5" id="body" name="body" placeholder="文章内容..."></textarea>
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
@elseif($loginUser->is_author==2)
    <div class="alert alert-info">
        <strong>作者身份申请中...</strong> 请您耐心等待哦!
    </div>
@else
    <div class="alert alert-danger">
        <strong>Oh~ 不好意思～</strong> 您还不是作者哟～ 点击下面的按钮申请成为作者～
    </div>
    <div class="btn-group btn-group-justified" data-yese="ys-apply" data-url="{{ dingo_route('local','api.user.apply') }}" data-id="{{ $loginUser->id }}">
        <a type="button" class="btn btn-purple bg-lg apply-author">申请成为作者</a>
    </div>

@endif