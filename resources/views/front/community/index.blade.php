<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/1/7
 * Time: 下午5:26
 */
?>
@extends('layouts.app')
@section('main')
        <!-- Xenon Conversations Widget -->
<div class="row">
    <div class="col-sm-9">

        <div class="xe-widget xe-conversations">
            <div class="xe-bg-icon">
                <i class="linecons-comment"></i>
            </div>
            <div class="xe-header">
                <div class="xe-icon">
                    <i class="linecons-comment"></i>
                </div>
                <div class="xe-label">
                    <h3>
                        {{ $category->category_name }}
                        <small>{{ $category->description }}</small>
                    </h3>
                </div>
            </div>
            <div class="xe-body">

                <ul class="list-unstyled article-list">
                    @include('front.posts.partials.list',['list'=>$category->articles])
                </ul>

            </div>
            <div class="xe-footer">
                @if($articles->nextPageUrl())
                    <button class="btn btn-purple btn-block" data-next="{{ $articles->nextPageUrl() }}" data-yese="ys-load_more">
                        <i class="fa-bars"></i>
                        加载更多...
                    </button>
                @endif
            </div>
        </div>

    </div>
    {{--sidebar--}}
    <div class="col-sm-3">
        <div class="panel">
            <a href="{{ route('posts.create',['c'=>$category->id]) }}" class="btn btn-purple btn-icon btn-group-justified btn-no-bottom">
                <i class="fa-comment-o"></i>
                <span>发帖</span>
            </a>
        </div>
        @include('front.common.tags')
        @include('front.common.hot-posts')
        @include('front.common.active-users')
        @include('front.common.qrcode')
    </div>
</div>
@endsection

