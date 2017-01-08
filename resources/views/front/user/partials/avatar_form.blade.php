<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/1/2
 * Time: 下午4:34
 */
?>

{!! Form::model($loginUser,['url'=>dingo_route('local','api.user.profile','avatar'),'class'=>'validate form-horizontal','method'=>'put','id'=>'form']) !!}
    {!! Form::hidden('avatar',$my->avatar) !!}
    <div class="form-group">
        <div class="yese-avatar">
            <a href="javascript:;" class="thumb">
                {!! Html::image($my->avatar,'user-img',['class'=>'img-responsive img-thumbnail','width'=>120,'height'=>120]) !!}
            </a>
        </div>
        <p>建议尺寸80*80</p>
    </div>

    <div class="form-group">
        <div class="col-sm-10">
            <button type="button" class="btn fileinput-button btn-success">
                <input id="fileupload" type="file" name="file" multiple>
                上传头像
            </button>
            <button type="button" class="btn btn-success submit">更新头像</button>
        </div>
    </div>
{!! Form::close() !!}

{!! Html::style("assets/js/jquery-file-upload/css/jquery.fileupload.css") !!}

{!! Html::script("assets/js/jquery-file-upload/js/vendor/jquery.ui.widget.js") !!}
{!! Html::script("assets/js/jquery-file-upload/js/jquery.iframe-transport.js") !!}
{!! Html::script("assets/js/jquery-file-upload/js/jquery.fileupload.js") !!}
<script>
    $(function () {
        'use strict';
        // Change this to the location of your server-side upload handler:
        var url = "{{ route('upload') }}";
        $('#fileupload').fileupload({
            url: url,
            type:'post',
            dataType: 'json',
            formData: {type: 'avatar'},
            done: function (e, data) {
                console.log(data.result);
                var json = data.result;
                if (json.status=='success'){
                    $('.yese-avatar .thumb img').attr('src','/'+json.path);
                    $('input[name=avatar]').val(json.path);
                }else {

                }

            }
        });
    });
</script>