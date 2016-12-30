<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2016/11/9
 * Time: 下午11:45
 */
?>
@extends('layouts.front')
@section('body')
    <div class="ajaxWrapper">
        <div class="post-wrapper">
            <div class="contianer post-article is-showed">
                <div class="left-column">
                    <div class="content--withBorder">
                        <article class="single-article post type-post status-publish format-standard hentry category-data-analysis">
                            <header class="entry-header">
                                <h2 class="post-title">{{ $article->title }}</h2>
                                <div class="post-meta">
                                    <time>{{ $article->created_time }}</time>
                                    <span class="post-views">
                                        <span class="iconfont icon-view"></span>阅读{{ $article->views }}</span>
                                    <span class="post-comment-count">
                                        <span class="iconfont icon-pinglun"></span>评论 {{ $comments_count }}</span>
                                    <span class="post-mark">
                                        <span class="iconfont icon-heart"></span>
                                        收藏 {{ $article->collections }}
                                    </span>
                                </div>
                            </header>
                            <div class="entry-content">
                                <blockquote>
                                    <p>{!! $article->body !!}</p>
                                </blockquote>
                                <p><img class="size-full aligncenter" src="{{ url($article->thumb_url) }}" width="680" height="320" /></p>
                                <p>来源：{{ $article->article_source }}</p>
                                <p>本文来源于夜色合作媒体@</p>
                            </div>
                        </article>
                        <div class="support-author">
                            <div class="support-title">您的打赏，是对我创作的最大鼓励。</div>
                            <button class="button--pay">
                                <i class="iconfont icon-money1"></i>
                                <span>|</span>打赏
                            </button>
                        </div>
                        <div class="post-actions">
                            <button title="收藏" class="button button--primary button--toggle button--recommend  @if($is_collection) is-active @endif" data-yese="ys-collection" data-id="{{ $article->id }}" data-url="{{ dingo_route('local','api.article.collect') }}">
                                <span class="iconfont icon-heart"></span>
                                <span class="button-label is-default">收藏</span>
                                <span class="button-label is-active">已收藏</span>
                                | <span class="count">{{ $article->collections }}</span>
                            </button>
                            <button class="button button--primary button--postlike @if($is_like) is-active @endif" data-yese="ys-like" data-id="{{ $article->id }}" data-url="{{ dingo_route('local','api.article.like') }}">
                                <span class="button-defaultState"></span>
                                <span class="button-activeState"></span>
                                <span class="iconfont icon-zan"></span>赞
                                | <span class="count">{{ $article->likes }}</span>
                            </button>
                            {{--<div class="u-floatRight post-tags">--}}
                                {{--<a href="" rel="tag">报表设计要素</a>--}}
                                {{--<a href="" rel="tag">数据分析报表</a>--}}
                                {{--<a href="" rel="tag">方法论</a>--}}
                            {{--</div>--}}
                        </div>
                        {{--<div class="post-ads">--}}
                            {{--<a href="" target="_blank">--}}
                                {{--<img src="#">--}}
                            {{--</a>--}}
                        {{--</div>--}}
                    </div>
                    <div class="fixed-article-nav u-clearfix">
                        <div class="u-floatLeft">
                            <a title="评论" href="#comments"><span class="iconfont icon-pinglun"></span></a>
                            <button title="收藏" class="button button--primary button--recommend button--chromeless">
                                <span class="iconfont icon-heart"></span>
                            </button>
                        </div>
                        <div class="u-floatRight">
                            <a class="share-weibo" target="_blank" href="">
                                <span class="iconfont icon-weibo"></span>
                            </a>
                            <span class="share-wechat">
                                <span class="iconfont icon-wechat"></span>
                                <div class="share-qrcode-image">
                                    <img src=""/>
                                    <p>扫码分享到微信</p>
                                </div>
                            </span>
                        </div>
                    </div>
                    <div id="comments" class="comments-area">
                        <h2 class="comments-title">
                            评论（ <span>{{ $comments_count }}</span> ）
                        </h2>
                        <div id="respond" class="respond" role="form">
                            {!! Form::open([
                                    'route'=>['article.reply',$article->id],
                                    'class'=>'comment-form u-clearfix',
                                    'method'=>'post',
                                    'id'=>'commentform'
                            ]) !!}
                                <div class="comment-avatar">
                                    <a class="comment-avatar" href="javascript:;">
                                        @if($loginUser)
                                        {!! Html::image($loginUser->avatar,null,['class'=>'avatar','width'=>40,'height'=>40]) !!}
                                        @endif
                                    </a>
                                </div>
                                <div class="comm-con">
                                    @if($loginUser)
                                    <textarea id="comment" class="inputGroup comm-rich" aria-required="true" rows="8" cols="45" name="comment_body"></textarea>
                                    <div class="comm-bottom">
                                        <input type="submit" class="inputSubmit submit" value="发布">
                                        <a rel="nofollow" id="cancel-comment-reply-link" href="" style="display:none;">取消回复</a>
                                    </div>
                                    @else
                                    <div class="comment-empty">
                                        <span class=" u-cursorPointer">
                                            <span class="u-underline">登录</span>后参与评论
                                        </span>
                                    </div>
                                    @endif
                                </div>
                            {!! Form::close() !!}
                        </div>
                        <div class="commentshow">
                            <ol class="comment-list">
                                @unless($article->comments->isEmpty())
                                @foreach($article->comments as $comment)
                                <li class="comment byuser even thread-even depth-1">
                                    <div class="comment-block">
                                        <div class="comment-avatar">
                                            {!! Html::image($comment->user->avatar,null,['class'=>'avatar','width'=>40,'height'=>40]) !!}
                                        </div>
                                        <div class="comment-info">

                                            <div class="comment-meta">
                                                <div class="comment-author">{{ $comment->user->nick_name }}</div>
                                                <div class="comment-time">{{ $comment->created_time }}</div>
                                            </div>
                                        </div>
                                        <div class="comment-content">
                                            <p>{{ $comment->comment_body }}</p>
                                        </div>

                                        <div class="u-clearfix comment-bottom">
                                            {{--<span class="comment-reply-link u-cursorPointer" onclick="return addComment.moveForm('comment-186074', '186074', 'respond', '447104')">回复</span>--}}
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                @endunless
                            </ol>
                        </div>
                    </div>
                    <div class="load-next-post button--loadmore" data-url="">查看更多...</div>
                </div>
                <div class="right-column">
                    <div class="sidebar">
                        <div class="widget">
                            <div class="author-board">
                                <div class="author-board-left">
                                    <a href="javascript:;" target="_blank">
                                        {!! Html::image($article->author->avatar,null,['width'=>56]) !!}
                                    </a>
                                    <button class="button button--toggleAuthor author-board-btn" data-yese="ys-follow" data-url="{{ dingo_route('local','api.user.follow') }}" data-author="{{ $article->author_id }}">
                                        <span class="text">
                                        @if($is_follow)
                                            取消关注
                                        @else
                                            关注
                                        @endif
                                        </span>
                                    </button>
                                </div>
                                <div class="author-board-right">
                                    <h3 class="auhtor-title">
                                        <a target="_blank" href="javascript:;">
                                            @if($article->author_type=='user')
                                                {{ $article->author->nick_name }}
                                            @else
                                                官方发布
                                            @endif
                                            <span class="is-staff">签约作者</span>
                                        </a>
                                    </h3>
                                    <p class="author-descripiton">{{ $article->author->signature }}</p>
                                    <div class="author-meta">
                                        <span>{{ count($article->author->articles) }}篇<i>作品</i></span>
                                        <span>{{ $views }}<i>阅读总量</i></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <aside class="widget widget_hot_questions">
                            <h3 class="widget-title">热门文章</h3>
                            <ul class="hot-question-list">
                                @foreach($hots as $key=>$hot)
                                <li class="hot-question-item">
                                    <span class="num">{{ $key+1 }}</span>
                                    <a target="_blank" href="{{ route('article.show',$hot->id) }}" class="link">{{ $hot->title }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
