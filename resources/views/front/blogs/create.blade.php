<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/2/12
 * Time: 上午1:07
 */
?>
@extends('front.user.user')
@section('styles')
{!! Html::style('assets/js/cropperjs/dist/cropper.min.css') !!}
@endsection
@section('right')
        <!-- main start-->
<div class="panel panel-default">
    <div class="panel-body">
        {!! Form::model($blog,['url'=>route('user.blogs.store'),'class'=>'validate form-horizontal','method'=>'post','id'=>'form']) !!}

        @include('front.blogs.partials.form')
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-4">
                <button type="submit" class="btn btn-success">创建</button>
            </div>
        </div>
        {!! Form::close() !!}

    </div>
</div>
<!-- main end-->
@endsection
@section('scripts')
    {!! Html::style("assets/js/jquery-file-upload/css/jquery.fileupload.css") !!}

    {!! Html::script("assets/js/jquery-file-upload/js/vendor/jquery.ui.widget.js") !!}
    {!! Html::script("assets/js/jquery-file-upload/js/jquery.iframe-transport.js") !!}
    {!! Html::script("assets/js/jquery-file-upload/js/jquery.fileupload.js") !!}

    {!! Html::script('assets/js/cropper/dist/cropper.min.js') !!}
    <script>
        jQuery(document).ready(function($)
        {
            'use strict';

            var $image = $('#image');

            var options = {
                aspectRatio: 1 / 1,
                preview: '.img-preview',
                crop: function (e) {
                    $("input[name=x]").val(Math.round(e.x));
                    $("input[name=y]").val(Math.round(e.y));
                    $("input[name=w]").val(Math.round(e.width));
                    $("input[name=h]").val(Math.round(e.height));
                }
            };

            var uploadedImageURL;
            $image.on({
                ready: function (e) {
                    console.log(e.type);
                },
                cropstart: function (e) {
                    console.log(e.type, e.action);
                },
                cropmove: function (e) {
                    console.log(e.type, e.action);
                },
                cropend: function (e) {
                    console.log(e.type, e.action);
                },
                crop: function (e) {
                    console.log(e.type, e.x, e.y, e.width, e.height, e.rotate, e.scaleX, e.scaleY);
                },
                zoom: function (e) {
                    console.log(e.type, e.ratio);
                }
            }).cropper(options);

            // Import image
            var $inputImage = $('#inputImage');

            if (URL) {
                $inputImage.change(function () {
                    var files = this.files;
                    var file;

                    if (!$image.data('cropper')) {
                        return;
                    }

                    if (files && files.length) {
                        file = files[0];

                        if (/^image\/\w+$/.test(file.type)) {
                            if (uploadedImageURL) {
                                URL.revokeObjectURL(uploadedImageURL);
                            }

                            uploadedImageURL = URL.createObjectURL(file);
                            $image.cropper('destroy').attr('src', uploadedImageURL).cropper(options);
                            //$inputImage.val('');
                        } else {
                            window.alert('Please choose an image file.');
                        }
                    }
                });
            } else {
                $inputImage.prop('disabled', true).parent().addClass('disabled');
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
            $('#inputImage').fileupload({
                url: url,
                type:'post',
                dataType: 'json',
                autoUpload:false,
                add: function (e, data) {
                    $('.crop-box').removeClass('hide');
                    data.context = $('#crop-img').text('上传')
                            .click(function () {
                                var $x = $("input[name=x]").val(),
                                        $y = $("input[name=y]").val(),
                                        $w = $("input[name=w]").val(),
                                        $h = $("input[name=h]").val();
                                data.formData = {type: 'posts',x:$x,y:$y,w:$w,h:$h};

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
                        $('input[name=cover]').val(json.path);

                    }else {

                    }

                }
            });
        });
    </script>
@endsection

