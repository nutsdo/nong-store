<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/1/15
 * Time: 下午10:31
 */
?>
@extends('layouts.app')
@section('styles')
    {!! Html::style('assets/js/cropperjs/dist/cropper.min.css') !!}
@endsection
@section('main')

    <div class="row">
        <div class="col-sm-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    {!! Form::model('',['url'=>route('experience.store'),'class'=>'validate form-horizontal','method'=>'post','id'=>'form']) !!}

                    @include('front.experience.partials.article-form')

                    {!! Form::close() !!}
                </div>
            </div>

        </div>
        <div class="col-sm-3">
            @include('front.experience.partials.tips')
        </div>
    </div>
@endsection
@section('scripts')
    {!! Html::style("assets/js/jquery-file-upload/css/jquery.fileupload.css") !!}

    {!! Html::script("assets/js/jquery-file-upload/js/vendor/jquery.ui.widget.js") !!}
    {!! Html::script("assets/js/jquery-file-upload/js/jquery.iframe-transport.js") !!}
    {!! Html::script("assets/js/jquery-file-upload/js/jquery.fileupload.js") !!}

    {!! Html::script('assets/js/cropperjs/dist/cropper.js') !!}
    {!! Html::script('assets/ckeditor/ckeditor.js') !!}
    {{--{!! Html::script('assets/js/cropperjs/main.js') !!}--}}
    <script>
        var editor = CKEDITOR.replace( 'body' ,{
            customConfig : 'custom/front_config.js',
            filebrowserImageUploadUrl:'/assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
        });

        jQuery(document).ready(function($)
        {
            'use strict';

            var Cropper = window.Cropper;
            var container = document.querySelector('.img-container');
            var image = document.querySelector('.img-container img');

            var options = {
                aspectRatio: 16 / 9,
                preview: '.img-preview',

                cropend: function (e) {
                    $("input[name=x]").val(e.detail.x),
                    $("input[name=y]").val(e.detail.y),
                    $("input[name=w]").val(e.detail.width),
                    $("input[name=h]").val(e.detail.height);
                },
                crop: function (e) {
                    $("input[name=x]").val(e.detail.x),
                    $("input[name=y]").val(e.detail.y),
                    $("input[name=w]").val(e.detail.width),
                    $("input[name=h]").val(e.detail.height);
                }
            };
            var cropper = new Cropper(image, options);
            // Import image
            var inputImage = document.getElementById('inputImage');

            if (URL) {
                inputImage.onchange = function () {
                    var files = this.files;
                    var file;

                    if (cropper && files && files.length) {
                        file = files[0];

                        if (/^image\/\w+/.test(file.type)) {

                            image.src = URL.createObjectURL(file);
                            cropper.destroy();
                            cropper = new Cropper(image, options);
                            //inputImage.value = null;
                        } else {
                            window.alert('Please choose an image file.');
                        }
                    }
                };
            } else {
                inputImage.disabled = true;
                inputImage.parentNode.className += ' disabled';
            }

            var preview_size = [240, 135]

            // Preview Image Setup (based on defined crop width and height
            $("#img-preview").css({
                width: preview_size[0],
                height: preview_size[1]
            });

        });

        $(function () {
            'use strict';
            // Change this to the location of your server-side upload handler:
            var url = "{{ route('upload') }}";
//            var $x = $("input[name=x]").val(),
//                    $y = $("input[name=y]").val(),
//                    $w = $("input[name=w]").val(),
//                    $h = $("input[name=h]").val();
            $('#inputImage').fileupload({
                url: url,
                type:'post',
                dataType: 'json',
                autoUpload:false,
//                formData: {type: 'posts',x:$x,y:$y,w:$w,h:$h},
                add: function (e, data) {
                    var $x = $("input[name=x]").val(),
                            $y = $("input[name=y]").val(),
                            $w = $("input[name=w]").val(),
                            $h = $("input[name=h]").val();
                    data.formData = {type: 'posts',x:$x,y:$y,w:$w,h:$h};
                    data.context = $('#crop-img').text('上传')
                            .click(function () {
                                e.preventDefault();
                                data.submit();
                                return false;
                            });
                },
                done: function (e, data) {
                    console.log(data.result);
                    var json = data.result;
                    if (json.status=='success'){
                        $('#crop-img').text('上传成功')
                        $('input[name=thumb_url]').val(json.path);
                        $('.img-container img').attr('src', '/'+json.path);
                    }else {

                    }

                }
            });
        });
    </script>
@endsection
