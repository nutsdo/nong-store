<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2016/11/9
 * Time: 下午11:45
 */
?>
@extends('layouts.app')
@section('title')
    {{ $article->title }} - @parent
@endsection
@section('main')
    <div class="row profile-env">

        <div class="col-sm-9">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <p class="panel-title">{{ $article->title }}</p>
                    <div class="panel-options yese-options">
                        <time>{{ $article->created_time->diffForHumans() }}</time>
                        <a href="#">
                            <i class="linecons-eye"></i>
                            阅读
                            <span>({{ $article->views }})</span>
                        </a>
                        <a href="#">
                            <i class="linecons-thumbs-up"></i>
                            赞
                            <span>({{ $article->likes }})</span>
                        </a>
                        <a href="#">
                            <i class="linecons-star"></i>
                            收藏
                            <span>({{ $article->collections }})</span>
                        </a>
                        <a href="#">
                            <i class="linecons-comment"></i>
                            评论
                            <span>({{ $article->comments->count() }})</span>
                        </a>
                    </div>
                </div>
                <div class="panel-body">
                    <blockquote>
                        <p>{!! $article->body !!}</p>
                    </blockquote>
                    <article>
                        {!! $article->body !!}
                    </article>


                    <blockquote class="blockquote blockquote-purple no-border">
                        <p>
                            <small>本文由 <strong>
                                    @if($article->author_type=='user')
                                        <a href="{{ route('ucenter',$article->author->id) }}">&#64;{{ $article->author->nick_name }}</a>
                                    @else
                                        &#64;{{ $title }}
                                    @endif

                                </strong> 原创发布于夜色轻奢。未经允许，请勿转载。
                            </small>
                        </p>
                    </blockquote>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="vertical-top">

                                <button class="btn btn-icon @if($is_collection) btn-secondary @else btn-fillet-green @endif"
                                        data-yese="ys-collection" data-id="{{ $article->id }}" data-url="{{ dingo_route('local','api.article.collect') }}">
                                    <i class="linecons-star"></i>
                                    <span>收藏(<count>{{ $article->collections }}</count>)</span>
                                </button>

                                <button class="btn btn-icon @if($is_like) btn-purple @else btn-fillet-purple @endif"
                                        data-yese="ys-like" data-id="{{ $article->id }}" data-url="{{ dingo_route('local','api.article.like') }}">
                                    <i class="linecons-thumbs-up"></i>
                                    <span>赞(<count>{{ $article->likes }}</count>)</span>
                                </button>

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="vertical-top pull-right">

                                <button class="btn btn-red btn-icon">
                                    <i class="fa-weibo"></i>
                                    <span>分享到微博</span>
                                </button>

                                <button class="btn btn-secondary btn-icon">
                                    <i class="fa-wechat"></i>
                                    <span>分享到微信</span>
                                </button>

                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="panel panel-color"><!-- Add class "collapsed" to minimize the panel -->

                <div class="panel-body text-center">
                    <div class="vertical-top">
                        <button class="btn btn-warning btn-icon">
                            <i class="linecons-heart"></i>
                            <span>打赏</span>
                        </button>
                    </div>

                    <div class="user-list">
                        <a href="#" class="user-img">
                            <img src="/assets/images/user-4.png" alt="user-img" class="img-cirlce img-responsive img-thumbnail">
                        </a>
                        <a href="#" class="user-img">
                            <img src="/assets/images/user-4.png" alt="user-img" class="img-cirlce img-responsive img-thumbnail">
                        </a>
                        <a href="#" class="user-img">
                            <img src="/assets/images/user-4.png" alt="user-img" class="img-cirlce img-responsive img-thumbnail">
                        </a>
                        <a href="#" class="user-img">
                            <img src="/assets/images/user-4.png" alt="user-img" class="img-cirlce img-responsive img-thumbnail">
                        </a>
                        <a href="#" class="user-img">
                            <img src="/assets/images/user-4.png" alt="user-img" class="img-cirlce img-responsive img-thumbnail">
                        </a>
                        <a href="#" class="user-img">
                            <img src="/assets/images/user-4.png" alt="user-img" class="img-cirlce img-responsive img-thumbnail">
                        </a>
                        <a href="#" class="user-img">
                            <img src="/assets/images/user-4.png" alt="user-img" class="img-cirlce img-responsive img-thumbnail">
                        </a><a href="#" class="user-img">
                            <img src="/assets/images/user-4.png" alt="user-img" class="img-cirlce img-responsive img-thumbnail">
                        </a>
                        <a href="#" class="user-img">
                            <img src="/assets/images/user-4.png" alt="user-img" class="img-cirlce img-responsive img-thumbnail">
                        </a>
                        <a href="#" class="user-img">
                            <img src="/assets/images/user-4.png" alt="user-img" class="img-cirlce img-responsive img-thumbnail">
                        </a>
                        <a href="#" class="user-img">
                            <img src="/assets/images/user-4.png" alt="user-img" class="img-cirlce img-responsive img-thumbnail">
                        </a>
                        <a href="#" class="user-img">
                            <img src="/assets/images/user-4.png" alt="user-img" class="img-cirlce img-responsive img-thumbnail">
                        </a>

                    </div>
                </div>
            </div>

            <!-- User timeline stories -->
            <section class="user-timeline-stories">

                <!-- Timeline Story Type: Status -->
                @unless($article->comments->isEmpty())
                    @foreach($article->comments as $key=>$comment)
                <article class="timeline-story yese-comment">

                    <i class="fa-file-text-o block-icon"></i>

                    <!-- User info -->
                    <header>

                        <a href="{{ route('ucenter',$comment->user->id) }}" class="user-img">
                            {!! Html::image($comment->user->avatar,null,['class'=>'img-cirlce img-responsive img-thumbnail','width'=>40]) !!}
                        </a>

                        <div class="user-details">
                            <a href="{{ route('ucenter',$comment->user->id) }}">{{ $comment->user->name }}</a>
                            <time><span>#{{ $key+1 }}</span>  ⋅ {{ $comment->created_time->diffForHumans() }}</time>
                        </div>

                    </header>

                    <div class="story-content">
                        <p>
                            {{ $comment->comment_body }}
                        </p>
                    </div>

                </article>
                    @endforeach
                @endunless
            </section>
            @if($loginUser)
            <!-- User Post form and Timeline -->
            {!! Form::open([
                    'route'=>['article.reply',$article->id],
                    'class'=>'yese-comment-form profile-post-form',
                    'method'=>'post',
                    'id'=>'commentform'
            ]) !!}

                <textarea class="form-control input-unstyled input-lg autogrow" name="comment_body" placeholder="发表你的看法?"></textarea>
                <i class="el-edit block-icon"></i>

                <ul class="list-unstyled list-inline form-action-buttons">
                    <li>
                        <button type="button" class="btn btn-unstyled">
                            <i class="el-camera"></i>
                        </button>
                    </li>
                    <li>
                        <button type="button" class="btn btn-unstyled">
                            <i class="el-attach"></i>
                        </button>
                    </li>
                    <li>
                        <button type="button" class="btn btn-unstyled">
                            <i class="el-mic"></i>
                        </button>
                    </li>
                    <li>
                        <button type="button" class="btn btn-unstyled">
                            <i class="el-music"></i>
                        </button>
                    </li>
                </ul>

                <button type="submit" class="btn btn-single btn-xs btn-success post-story-button">提交评论</button>
            {!! Form::close() !!}
            @else
                <div class="panel">
                    <div class="yese-no-login">

                        <div class="fake-form">
                            <div>
                                <a href="{{ url('/login') }}">登录</a> or <a href="{{ url('/register') }}">注册</a> 登录后才能发表评论哦...
                            </div>
                        </div>

                    </div>
                </div>

            @endif

        </div>

        <div class="col-sm-3">
            @if($article->author_type=='user')
            @include('front.common.user-info-sidebar',['user'=>$article->author])
            @endif
            @include('front.common.ads')
            <div class="panel panel-color panel-purple yese-panel article-panel"><!-- Add class "collapsed" to minimize the panel -->
                <div class="panel-heading">
                    <h3 class="panel-title">热门文章</h3>

                </div>

                <div class="panel-body">

                    <div class="list-group artile-list">
                        @foreach($hots as $key=>$hot)
                            <a href="{{ route('article.show',$hot->id) }}" class="list-group-item"><span class="label label-purple">{{$key+1}}</span> {{ $hot->title }} </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection