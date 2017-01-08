<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/1/7
 * Time: 下午10:43
 */
?>
@extends('layouts.app')
@section('main')
    <section class="profile-env">

        <div class="row">

            <div class="col-sm-9">

                <!-- User timeline stories -->
                <section class="user-timeline-stories">

                    <!-- Timeline Story Type: Status -->
                    <article class="timeline-story">

                        <i class="fa-paper-plane-empty block-icon"></i>

                        <!-- User info -->
                        <header>

                            <a href="#" class="user-img">
                                {!! Html::image($post->user->avatar, $post->user->nick_name, ['class'=>'img-circle img-responsive']) !!}
                            </a>

                            <div class="user-details">
                                <a href="#">{{ $post->user->nick_name }}</a>
                                <time>发布于 {{ $post->created_time->diffForHumans() }}</time>
                            </div>

                        </header>

                        <div class="story-content">
                            <!-- Story Content Wrapped inside Paragraph -->
                            <div class="text-gray">
                                {{ $post->body }}
                            </div>
                            <!-- Story Options Links -->
                            <div class="story-options-links">
                                <div class="pull-right">
                                    <a href="#">
                                        <i class="linecons-heart"></i>
                                        赞
                                        <span>({{ $post->likes->count() }})</span>
                                    </a>

                                    <a href="#">
                                        <i class="linecons-comment"></i>
                                        评论
                                        <span>({{ $post->comments->count() }})</span>
                                    </a>
                                </div>

                            </div>

                            @unless($post->comments->isEmpty())
                            <!-- Story Comments -->
                            <ul class="list-unstyled story-comments">
                                @foreach($post->comments as $comment)
                                <li>

                                    <div class="story-comment">
                                        <a href="#" class="comment-user-img">
                                            {!! Html::image($comment->user->avatar, $comment->user->nick_name, ['class'=>'img-circle img-responsive']) !!}
                                        </a>

                                        <div class="story-comment-content">
                                            <a href="#" class="story-comment-user-name">
                                                {{ $comment->user->nick_name }}
                                                <time>{{ $comment->created_time->diffForHumans() }}</time>
                                            </a>

                                            <p>{{ $comment->comment_body }}</p>
                                        </div>
                                    </div>

                                </li>
                                @endforeach
                            </ul>

                            @endunless
                        </div>

                    </article>


                </section>
                <hr>
                <div class="panel">
                    <!-- User Post form and Timeline -->
                    {!! Form::open([
                            'route'=>['posts.reply',$post->id],
                            'class'=>'yese-comment-form profile-post-form',
                            'method'=>'post',
                            'id'=>'commentform'
                    ]) !!}
                        {{ Form::hidden('post_id',$post->id) }}
                        <textarea class="form-control input-unstyled input-lg autogrow" name="comment_body" placeholder="你想说点什么?"></textarea>
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

                        <button type="submit" class="btn btn-single btn-xs btn-success post-story-button">评论</button>
                    {{ Form::close() }}

                </div>


            </div>

            <div class="col-sm-3">
                <div class="panel">
                    <button class="btn btn-purple btn-icon btn-group-justified btn-no-bottom">
                        <i class="fa-comment-o"></i>
                        <span>我也要说</span>
                    </button>
                </div>
            </div>
        </div>

    </section>
@endsection