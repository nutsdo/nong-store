<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/1/8
 * Time: 下午5:31
 */
?>
@extends('front.user.user')

@section('right')
    <nav class="navbar navbar-default" role="navigation">

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li @if($type=='publish')class="active"@endif>
                    <a href="{{ route('user.article','publish') }}">发布文章</a>
                </li>
                <li @if($type=='published')class="active"@endif>
                    <a href="{{ route('user.profile','published') }}">已发布</a>
                </li>
                <li @if($type=='review')class="active"@endif>
                    <a href="{{ route('user.profile','review') }}">审核中</a>
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

            @include('front.user.article.'.$type)

        </div>
    </div>
    <!-- main end-->
@endsection
