<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 8/29/15
 * Time: 8:57 AM
 */
 ?>
 @extends('......layouts.dashboard')

 @section('main')

    <!--面包屑导航 start-->
    <div class="page-title">

        <div class="title-env">
            <h1 class="title">文章分类</h1>
            <p class="description">Plain text boxes, select dropdowns and other basic form elements</p>
        </div>

            <div class="breadcrumb-env">

                <ol class="breadcrumb bc-1">
                    <li>
                        <a href="{{ route('dashboard') }}"><i class="fa-home"></i>首页</a>
                    </li>
                    <li>
                        <a href="forms-native.html">内容管理</a>
                    </li>
                    <li class="active">
                        <strong>文章分类</strong>
                    </li>
                </ol>

        </div>

    </div>
    <!--面包屑导航 end-->

    <!--主体 start-->
    <div class="panel panel-default">
        <div class="panel-body">

            <div class="vertical-top">

                <a href="{{ route('dashboard.article_category.create') }}" class="btn btn-success btn-icon">
                    <i class="fa-plus-square"></i>
                    <span>新建分类</span>
                </a>

            </div>

        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">分类管理</div>
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-8">
                    @include('dashboard.article_category.tree')
                </div>
            </div>

        </div>
    </div>
    <!--主体 end-->

 @stop
 @section('css')
    {!! Html::style("assets/js/uikit/uikit.css") !!}
 @stop

 @section('scripts')
    {!! Html::script("assets/js/uikit/js/uikit.min.js") !!}
    {!! Html::script("assets/js/uikit/js/addons/nestable.min.js") !!}
 @stop