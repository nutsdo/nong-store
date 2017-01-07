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
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
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
                            @foreach($last_articles as $article)
                            <div class="list-group-item">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <a href="{{ route('article.show',$article->id) }}" class="thumbnail">
                                                {!! Html::image($article->thumb_url, $article->title, ['data-src'=>$article->thumb_url]) !!}
                                            </a>
                                        </div>
                                        <div class="col-sm-9">
                                            <h3 class="list-group-item-heading"><a href="{{ route('article.show',$article->id) }}">{{ $article->title }}</a></h3>
                                            <div class="yese-author">
                                                <a href="#" class="author-img">
                                                    {!! Html::image($article->author->avatar, $article->author->nick_name, ['class'=>'img-circle img-responsive']) !!}
                                                </a>

                                                <div class="author-content">
                                                    <a href="#" class="user-name">
                                                        @if($article->author_type=='user')
                                                            {{ $article->author->nick_name }}
                                                        @else
                                                            {{ $article->author->admin_name }}
                                                        @endif
                                                        <time>{{ $article->created_time->diffForHumans() }}</time>
                                                    </a>
                                                </div>
                                            </div>
                                            <p class="list-group-item-text">{!! $article->body !!}</p>
                                            <div class="options-links pull-right">
                                                <a href="#">
                                                    <i class="linecons-eye"></i>
                                                    浏览
                                                    <span>({{ $article->likes }})</span>
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

                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                    <div class="panel">
                        <button class="btn btn-purple btn-block">
                            <i class="fa-bars"></i>
                            加载更多...
                        </button>
                    </div>
                </div>

        </div>

        <div class="col-sm-3">

            @include('front.common.user-info-sidebar',['user'=>$loginUser])

        </div>
    </div>

@endsection