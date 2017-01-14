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
                    <a href="{{ route('user.collections') }}">文章</a>
                </li>
                <li @if($type=='posts')class="active"@endif>
                    <a href="{{ route('user.collections','posts') }}">帖子</a>
                </li>
            </ul>

        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <!-- main start-->
    <div class="panel panel-default">
        <div class="panel-body">
            @include('front.user.article.collections_list',['articles'=> $collections,'type'=>$type])
        </div>
    </div>
    <!-- main end-->
@endsection
