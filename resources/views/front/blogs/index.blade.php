<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/2/12
 * Time: 上午1:05
 */
?>
@extends('front.user.user')

@section('blog')
        <!-- User Info Sidebar -->
<div class="user-info-sidebar panel panel-default">

    <a href="#" class="user-img">
        {!! Html::image($blog->cover,'user-img',['class'=>'img-cirlce img-responsive img-thumbnail','width'=>80]) !!}
    </a>

    <a href="#" class="user-name">
        {{ $blog->name }}
        <span class="user-status is-online"></span>
    </a>

    <span class="user-title">
        {{ $blog->description }}
    </span>

    <hr />

    <ul class="list-unstyled user-friends-count">
        <li>
            <span>{{ $blog->subscriber_count }}</span>
            订阅
        </li>
    </ul>

    {{--<button type="button" class="btn btn-success btn-block text-left">--}}
        {{--订阅--}}
        {{--<i class="fa-check pull-right"></i>--}}
    {{--</button>--}}
</div>
@endsection

@section('right')

<!-- main start-->
<div class="panel panel-default">
    <div class="panel-body">
        <div class="article-panel">

            <div class="list-group artile-list">
                @foreach($articles as $key=>$article)
                    <div class="list-group-item">
                        <span class="label label-purple">{{$article->blog->name}}</span><a href="{{ route('experience.show',$article->id) }}"> {{ $article->title }} </a>
                        <time class="pull-right">{{ $article->created_at }} <a href="{{ route('experience.edit',$article->id) }}" class="fa fa-edit"></a></time>
                    </div>
                @endforeach
            </div>
            <div class="pager">
                {!! $articles->links() !!}
            </div>

        </div>
    </div>
</div>
<!-- main end-->
@endsection
