<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 8/29/15
 * Time: 8:57 AM
 */
 ?>
 @extends('layouts.dashboard')

 @section('main')
    <!--主体 start-->
    <div class="panel panel-default">
        <div class="panel-body">

            <div class="vertical-top">

                <a href="{{ route('dashboard.category.create') }}" class="btn btn-success btn-icon">
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
                    @include('dashboard.category.tree')
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