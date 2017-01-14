<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/1/1
 * Time: 下午10:03
 */
?>
@extends('layouts.app')
@section('main')
    <div id="carousel-example-generic" class="carousel slide banner" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            @foreach($banners as $key=>$banner)
            <div class="item @if($key==0) active @endif">
                <a href="{{ url($banner->route_url) }}">
                    {!! Html::image($banner->image_url,$banner->title) !!}
                </a>
            </div>
            @endforeach
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">上一个</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">下一个</span>
        </a>
    </div>

    <div class="row profile-env mt-40">

        <div class="col-sm-9">

            <div class="panel panel-color panel-purple yese-panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">最新</h3>

                        <div class="panel-options">
                            <a href="#" data-toggle="panel">
                                <span class="collapse-icon">&ndash;</span>
                                <span class="expand-icon">+</span>
                            </a>
                        </div>
                    </div>
                    <div class="panel-body">

                        <div class="list-group yese-group">
                            @include('front.article.partials.list',['list'=>$last_articles])
                        </div>

                    </div>
                    {{--<div class="panel">--}}
                        {{--<button class="btn btn-purple btn-block">--}}
                            {{--<i class="fa-bars"></i>--}}
                            {{--加载更多...--}}
                        {{--</button>--}}
                    {{--</div>--}}
                </div>

        </div>

        <div class="col-sm-3">
            @include('front.common.slogan')
            @include('front.common.qrcode')
            @include('front.common.last-article',['hots'=>$hot_articles])
            @include('front.common.tags')
            @include('front.common.products')
            {{--@include('front.common.user-info-sidebar',['user'=>$loginUser])--}}
        </div>
    </div>

@endsection