<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2016/11/9
 * Time: 下午11:43
 */
?>
@extends('layouts.app')
@section('main')
    <div class="row profile-env">

        <div class="col-sm-9">

            <div class="panel panel-color panel-purple yese-panel">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $category->category_name }}</h3>

                    <div class="panel-options">
                        <a href="#" data-toggle="panel">
                            <span class="collapse-icon">&ndash;</span>
                            <span class="expand-icon">+</span>
                        </a>
                    </div>
                </div>
                <div class="panel-body">

                    <div class="list-group yese-group article-list">
                        @include('front.article.partials.list',['list'=>$articles])
                    </div>

                </div>
                @if($articles->nextPageUrl())
                <div class="panel">
                    <button class="btn btn-purple btn-block" data-next="{{ $articles->nextPageUrl() }}" data-yese="ys-load_more">
                        <i class="fa-bars"></i>
                        加载更多...
                    </button>
                </div>
                @endif

            </div>

        </div>

        <div class="col-sm-3">
        @if($loginUser)
        @include('front.common.user-info-sidebar',['user'=> $loginUser])
        @endif
        </div>
    </div>
@endsection
