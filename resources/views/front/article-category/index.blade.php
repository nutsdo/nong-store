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

                    <div class="list-group yese-group">
                        @foreach($category->articles as $article)
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

        @include('front.common.user-info-sidebar',['user'=> $loginUser])

        </div>
    </div>
@endsection
