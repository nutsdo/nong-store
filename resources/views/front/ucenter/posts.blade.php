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
                <ul class="cbp_tmtimeline">
                    @foreach($posts as $post)
                    <li>
                        <time class="cbp_tmtime" datetime="{{ $post->created_time }}"><span>{{ $post->created_time }}</span></time>

                        <div class="cbp_tmicon timeline-bg-gray">
                            <i class="fa-paper-plane-o"></i>
                        </div>

                        <div class="cbp_tmlabel">
                            <h2><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h2>
                            <p>
                                {{ $post->body }}
                            </p>

                        </div>
                    </li>
                    @endforeach

                </ul>
            </div>

        </div>

        <div class="col-sm-3">
            @include('front.common.user-info-sidebar',['user'=>$user])
            @include('front.ucenter.partials.sidebar')
        </div>
    </div>

@endsection