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
    <div class="row profile-env">

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
                            @include('front.article.partials.list',['list'=>$articles])
                        </div>

                    </div>

                </div>

        </div>

        <div class="col-sm-3">
            @include('front.common.user-info-sidebar',['user'=>$user])
            @include('front.ucenter.partials.sidebar')
        </div>
    </div>

@endsection