<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/1/8
 * Time: 下午5:26
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
    <?php $my=$loginUser;?>
    <section class="profile-env">

        <div class="row">

            <div class="col-sm-3">

                @yield('blog')

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
                    {{ $my->signature }}
                </span>

                    <hr />

                    <ul class="list-unstyled user-info-list">
                        <li>
                            <i class="fa-home"></i>
                            {{$my->country}}, {{$my->city}}
                        </li>
                        <li>
                            <i class="fa-briefcase"></i>
                            {{ $my->company }}
                        </li>
                        <li>
                            <i class="fa-graduation-cap"></i>
                            {{ $my->university }}
                        </li>
                    </ul>

                    <hr />

                    <ul class="list-unstyled user-friends-count">
                        <li>
                            <span>{{ $my->followers->count() }}</span>
                            被关注
                        </li>
                        <li>
                            <span>{{ $my->following->count() }}</span>
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
                    <a href="{{ route('user.article') }}" class="list-group-item @if($currentRoute=='user.article') active @endif">
                        <i class="fa-file-image-o"></i>
                        我的文章
                    </a>
                    <a href="{{ route('user.blogs.index') }}" class="list-group-item @if(strstr($currentRoute, 'user.blogs')) active @endif">
                        <i class="fa-file-image-o"></i>
                        我的专栏
                    </a>
                    <a href="{{ route('user.collections') }}" class="list-group-item @if($currentRoute=='user.collections') active @endif">
                        <i class="fa-star-o"></i>
                        我的收藏
                    </a>
                    <a href="{{ route('user.comments') }}" class="list-group-item @if($currentRoute=='user.comments') active @endif">
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

                @yield('right')

            </div>

        </div>

    </section>
@endsection


