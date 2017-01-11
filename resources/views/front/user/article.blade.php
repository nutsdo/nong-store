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
                <li @if(!$type)class="active"@endif>
                    <a href="{{ route('user.article') }}">全部文章</a>
                </li>
                <li @if($type=='draft')class="active"@endif>
                    <a href="{{ route('user.article','draft') }}">草稿</a>
                </li>
                <li @if($type=='published')class="active"@endif>
                    <a href="{{ route('user.article','published') }}">已发布</a>
                </li>
                <li @if($type=='review')class="active"@endif>
                    <a href="{{ route('user.article','review') }}">审核中</a>
                </li>
                <li @if($type=='fail')class="active"@endif>
                    <a href="{{ route('user.article','fail') }}">审核失败</a>
                </li>
                <li @if($type=='publish')class="active"@endif>
                    <a href="{{ route('user.article','publish') }}">发布文章</a>
                </li>

            </ul>

        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <!-- main start-->
    <div class="panel panel-default">
        <div class="panel-body">
        @if($type=='publish')
            @include('front.user.article.publish')
        @elseif($type=='edit')
            @include('front.user.article.edit')
        @else
            @include('front.user.article.list')
        @endif
        </div>
    </div>
    <!-- main end-->
@endsection
