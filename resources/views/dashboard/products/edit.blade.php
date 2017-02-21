<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 8/31/15
 * Time: 11:46 AM
 */
 ?>
@extends('layouts.dashboard')
@section('style')
    {!! Html::style('assets/js/jquery-file-upload/css/style.css') !!}
    {!! Html::style('assets/js/jquery-file-upload/css/jquery.fileupload.css') !!}
@endsection
@section('main')
<div class="panel panel-default">
  <div class="panel-heading">添加商品</div>
  <div class="panel-body">

  {!! Form::model($product,['route'=>['dashboard.products.update',$product->id],'class'=>'validate form-horizontal','method'=>'PATCH','data-ajax'=>'true','id'=>'form']) !!}
     @include('dashboard.products.partials.form',['submitButtonText'=>'保存','path'=>$product->pic_url])
  {!! Form::close() !!}
  </div>
</div>

@stop

{{--@include('upload.single',['type'=>'products'])--}}
@section('editor')
    {!! Html::script('assets/ckeditor/ckeditor.js') !!}
    {!! Html::script('assets/ckfinder/ckfinder.js') !!}
    <script>
        var editor = CKEDITOR.replace( 'body' );
        CKFinder.setupCKEditor( editor, '/ckfinder/' );
    </script>
@stop
@section('scripts')

    {!! Html::script('assets/js/jquery-file-upload/js/vendor/jquery.ui.widget.js') !!}
    {!! Html::script('assets/js/jquery-file-upload/js/jquery.iframe-transport.js') !!}
    {!! Html::script('assets/js/jquery-file-upload/js/jquery.fileupload.js') !!}
    <script>
        $(function () {
            $('#fileupload').fileupload({
                url: '{{ route('upload') }}',
                type:'POST',
                dataType: 'json',
                formData:{type:'product',_token:$('input[name=_token]').val()},

                uploadTemplateId: null,
                downloadTemplateId: null,

                done: function (e, data) {
                    console.log(data.result)
                    var html = '<img width="100" src="/'+data.result.path+'"/>';
                        html += '<input type="hidden" name="images[]" value="'+data.result.path+'">';
                    $('.image-list').append(html);
                }
            });
        });
    </script>
@endsection