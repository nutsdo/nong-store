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

                            <a href="{{ route('ucenter',$post->user->id) }}" class="user-img">
                                {!! Html::image($post->user->avatar, $post->user->nick_name, ['class'=>'img-circle img-responsive']) !!}
                            </a>

                            <div class="user-details">
                                <p>{{ $post->title }}</p>
                                <time>
                                    <a href="{{ route('ucenter',$post->user->id) }}">{{ $post->user->nick_name }}</a> · {{ $post->created_time->diffForHumans() }}
                                    @if($loginUser && $loginUser->id == $post->user->id)
                                    <ul class="list-unstyled list-inline pull-right">
                                        <li>
                                            <a href="{{ route('posts.edit',$post->id) }}" data-action="edit">
                                                <i class="fa-edit"></i>
                                                编辑
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;" data-action="{{ route('posts.destroy',$post->id) }}" id="del_post">
                                                <i class="fa-trash"></i>
                                                删除
                                            </a>
                                        </li>
                                    </ul>
                                    @endif
                                </time>
                            </div>

                        </header>

                        <div class="story-content">
                            <!-- Story Content Wrapped inside Paragraph -->
                            <div class="text-gray">
                                {!! $post->body !!}
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
                                        <a href="{{ route('ucenter',$comment->user->id) }}" class="comment-user-img">
                                            {!! Html::image($comment->user->avatar, $comment->user->nick_name, ['class'=>'img-circle img-responsive']) !!}
                                        </a>

                                        <div class="story-comment-content">
                                            <a href="{{ route('ucenter',$comment->user->id) }}" class="story-comment-user-name">
                                                {{ $comment->user->nick_name }}
                                                <time>{{ $comment->created_time->diffForHumans() }}</time>
                                            </a>

                                            <p>{!! $comment->comment_body !!}</p>
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

                        <button type="submit" class="btn btn-single btn-xs btn-success post-story-button" @if(!$loginUser) disabled @endif>评论</button>
                    {{ Form::close() }}

                </div>


            </div>

            <div class="col-sm-3">
                <div class="panel">
                    <a href="{{ route('posts.create') }}" class="btn btn-purple btn-icon btn-group-justified btn-no-bottom">
                        <i class="fa-comment-o"></i>
                        <span>发帖</span>
                    </a>
                </div>
                @include('front.common.user-info-sidebar',['user'=>$post->user])
                @include('front.common.user-info-sidebar',['user'=>$post->user])
            </div>
        </div>

    </section>

@endsection
@section('others')
    <div class="modal fade" id="modal-del" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa fa-warning"></i> 提示</h4>
                </div>

                <div class="modal-body">

                    删除后不可恢复，你确定要删除吗？

                </div>
                {!! Form::open(['url'=>'','method'=>'DELETE','id'=>'delete_form']) !!}
                <div class="modal-footer">
                    {!! Form::submit('确认删除',['class'=>'btn btn-danger']) !!}
                    {!! Form::button('取消',['class'=>'btn btn-info','data-dismiss'=>'modal']) !!}
                </div>
                {!! Form::close()!!}
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('#del_post').on('click',function(e){
            var $ele = $(e.target);
            var url = $ele.data('action');
            $('#delete_form').attr('action',url);
            $('#modal-del').modal('show');
        });
    </script>

@endsection