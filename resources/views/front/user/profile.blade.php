<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2016/11/12
 * Time: 下午2:25
 */
?>
@extends('layouts.app')
@section('styles')
<!-- Imported styles on this page -->
{!! Html::style("assets/css/xenon-components.css") !!}
{!! Html::style("assets/css/xenon-skins.css") !!}
{!! Html::style("assets/css/custom.css") !!}
{!! Html::style("assets/css/fonts/elusive/css/elusive.css") !!}
@stop
@section('main')
<section class="profile-env">

    <div class="row">

        <div class="col-sm-3">

            <!-- User Info Sidebar -->
            <div class="user-info-sidebar panel panel-default">

                <a href="#" class="user-img">
                    {!! Html::image($my->avatar,'user-img',['class'=>'img-cirlce img-responsive img-thumbnail','width'=>80]) !!}
                </a>

                <a href="#" class="user-name">
                    {{ $my->nick_name }}
                    <span class="user-status is-online"></span>
                </a>

                <span class="user-title">
                    CEO at <strong>Google</strong>
                </span>

                <hr />

                <ul class="list-unstyled user-info-list">
                    <li>
                        <i class="fa-home"></i>
                        中国, 北京
                    </li>
                    <li>
                        <i class="fa-briefcase"></i>
                        <a href="#">Google</a>
                    </li>
                    <li>
                        <i class="fa-graduation-cap"></i>
                        北京大学
                    </li>
                </ul>

                <hr />

                <ul class="list-unstyled user-friends-count">
                    <li>
                        <span>643</span>
                        被关注
                    </li>
                    <li>
                        <span>108</span>
                        关注
                    </li>
                </ul>

                <button type="button" class="btn btn-success btn-block text-left">
                    加关注
                    <i class="fa-check pull-right"></i>
                </button>
            </div>
            <!-- Menu -->
            <div class="list-group list-group-minimal"><!-- Add class "list-group-minimal" for less padding between list items -->
                <a href="{{ route('user.profile') }}" class="list-group-item @if($currentRoute=='user.profile') active @endif">
                    <i class="fa-cog"></i>
                    资料设置
                </a>
                <a href="{{ route('user.collections') }}" class="list-group-item @if($currentRoute=='user.collections') active @endif">
                    <i class="fa-star-o"></i>
                    我的收藏
                </a>
                <a href="#" class="list-group-item">
                    <i class="fa-comments"></i>
                    我的评论
                </a>
                <a href="#" class="list-group-item">
                    <i class="fa-money"></i>
                    我的打赏
                </a>
                <a href="#" class="list-group-item">
                    <i class="fa-bell-o"></i>
                    通知中心
                </a>
            </div>
        </div>

        <div class="col-sm-9">

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
                        <li @if($type=='phone')class="active"@endif>
                            <a href="{{ route('user.profile','phone') }}">手机绑定</a>
                        </li>
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
        </div>

    </div>

</section>
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

