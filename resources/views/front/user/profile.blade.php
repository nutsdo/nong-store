<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2016/11/12
 * Time: 下午2:25
 */
?>
@extends('front.user.user')

@section('right')
    <nav class="navbar navbar-default" role="navigation">

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li @if($type=='profile')class="active"@endif>
                    <a href="{{ route('user.profile') }}">资料设置</a>
                </li>
                <li @if($type=='password')class="active"@endif>
                    <a href="{{ route('user.profile','password') }}">密码设置</a>
                </li>
                <li @if($type=='avatar')class="active"@endif>
                    <a href="{{ route('user.profile','avatar') }}">头像设置</a>
                </li>
                {{--<li @if($type=='phone')class="active"@endif>--}}
                {{--<a href="{{ route('user.profile','phone') }}">手机绑定</a>--}}
                {{--</li>--}}
            </ul>

        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <!-- main start-->
    <div class="panel panel-default">
        <div class="panel-body">

            @include('front.user.partials.'.$type.'_form')

        </div>
    </div>
    <!-- main end-->
@endsection

@section('scripts')
    {!! Html::script("assets/js/toastr/toastr.min.js") !!}
    <script>
        var opts = {
            "closeButton": true,
            "debug": false,
            "positionClass": "toast-top-right",
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        $('.submit').on('click',function(){
            var $this = $(this),
                    form = $this.parents().closest('form'),
                    url = form.attr('action');
            $('div.form-group').removeClass('has-error');
            $.ajax({
                url: url,
                type: 'post',
                data: form.serialize(),
                success:function(response){
                    if (response.status_code==200){
                        toastr.success(response.message, "提示", opts);
                    }else if(response.status_code==201){
                        toastr.error(response.message, '提示', opts);
                    } else if(response.status_code==202){
                        $.each(response.message,function(obj,value){
                            $.each(value,function(index,msg){
                                toastr.error(msg, obj, opts);
                                $('input[name='+obj+']').parent().parent().addClass('has-error');
                            });
                        });
                    }

                },
                dataType:'json'
            });
        });

    </script>

@endsection