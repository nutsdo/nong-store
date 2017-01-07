<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/1/7
 * Time: 下午5:26
 */
?>
@extends('layouts.app')
@section('main')
        <!-- Xenon Conversations Widget -->
<div class="row">
    <div class="col-sm-9">

        <div class="xe-widget xe-conversations">
            <div class="xe-bg-icon">
                <i class="linecons-comment"></i>
            </div>
            <div class="xe-header">
                <div class="xe-icon">
                    <i class="linecons-comment"></i>
                </div>
                <div class="xe-label">
                    <h3>
                        {{ $category->category_name }}
                        <small>{{ $category->description }}</small>
                    </h3>
                </div>
            </div>
            <div class="xe-body">

                <ul class="list-unstyled">
                    @foreach($category->articles as $article)
                    <li>
                        <div class="xe-comment-entry">
                            <a href="#" class="xe-user-img">
                                <img src="/assets/images/user-2.png" class="img-circle" width="40" />
                            </a>

                            <div class="xe-comment">
                                <a href="#" class="xe-user-name">
                                    <strong>{{ $article->author->nick_name }}</strong> ⋅ <time class="community-time">{{ $article->created_at->diffForHumans() }}</time>
                                </a>

                                <div class="label label-purple">标签</div> <small class="text-muted">In it except to so temper mutual tastes mother. Interested cultivated its continuing now yet are...</small>
                                <div class="community-options pull-right">
                                    <a href="#">
                                        <i class="linecons-thumbs-up"></i>
                                        赞
                                        <span>(3)</span>
                                    </a>

                                    <a href="#">
                                        <i class="linecons-comment"></i>
                                        评论
                                        <span>(5)</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </li>
                    @endforeach
                    <li>
                        <div class="xe-comment-entry">
                            <a href="#" class="xe-user-img">
                                <img src="/assets/images/user-2.png" class="img-circle" width="40" />
                            </a>

                            <div class="xe-comment">
                                <a href="#" class="xe-user-name">
                                    <strong>Jack Gates</strong> ⋅ <time class="community-time">10分钟前</time>
                                </a>

                                <div class="label label-purple">标签</div> <small class="text-muted">In it except to so temper mutual tastes mother. Interested cultivated its continuing now yet are...</small>
                                <div class="community-options pull-right">
                                    <a href="#">
                                        <i class="linecons-thumbs-up"></i>
                                        赞
                                        <span>(3)</span>
                                    </a>

                                    <a href="#">
                                        <i class="linecons-comment"></i>
                                        评论
                                        <span>(5)</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </li>
                    <li>
                        <div class="xe-comment-entry">
                            <a href="#" class="xe-user-img">
                                <img src="/assets/images/user-2.png" class="img-circle" width="40" />
                            </a>

                            <div class="xe-comment">
                                <a href="#" class="xe-user-name">
                                    <strong>Jack Gates</strong> ⋅ <time class="community-time">10分钟前</time>
                                </a>

                                <div class="label label-purple">标签</div> <small class="text-muted">In it except to so temper mutual tastes mother. Interested cultivated its continuing now yet are...</small>
                                <div class="community-options pull-right">
                                    <a href="#">
                                        <i class="linecons-thumbs-up"></i>
                                        赞
                                        <span>(3)</span>
                                    </a>

                                    <a href="#">
                                        <i class="linecons-comment"></i>
                                        评论
                                        <span>(5)</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </li>
                    <li>
                        <div class="xe-comment-entry">
                            <a href="#" class="xe-user-img">
                                <img src="/assets/images/user-2.png" class="img-circle" width="40" />
                            </a>

                            <div class="xe-comment">
                                <a href="#" class="xe-user-name">
                                    <strong>Jack Gates</strong> ⋅ <time class="community-time">10分钟前</time>
                                </a>

                                <div class="label label-purple">标签</div> <small class="text-muted">In it except to so temper mutual tastes mother. Interested cultivated its continuing now yet are...</small>
                                <div class="community-options pull-right">
                                    <a href="#">
                                        <i class="linecons-thumbs-up"></i>
                                        赞
                                        <span>(3)</span>
                                    </a>

                                    <a href="#">
                                        <i class="linecons-comment"></i>
                                        评论
                                        <span>(5)</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </li>
                    <li>
                        <div class="xe-comment-entry">
                            <a href="#" class="xe-user-img">
                                <img src="/assets/images/user-2.png" class="img-circle" width="40" />
                            </a>

                            <div class="xe-comment">
                                <a href="#" class="xe-user-name">
                                    <strong>Jack Gates</strong> ⋅ <time class="community-time">10分钟前</time>
                                </a>

                                <div class="label label-purple">标签</div> <small class="text-muted">In it except to so temper mutual tastes mother. Interested cultivated its continuing now yet are...</small>
                                <div class="community-options pull-right">
                                    <a href="#">
                                        <i class="linecons-thumbs-up"></i>
                                        赞
                                        <span>(3)</span>
                                    </a>

                                    <a href="#">
                                        <i class="linecons-comment"></i>
                                        评论
                                        <span>(5)</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </li>
                    <li>
                        <div class="xe-comment-entry">
                            <a href="#" class="xe-user-img">
                                <img src="/assets/images/user-2.png" class="img-circle" width="40" />
                            </a>

                            <div class="xe-comment">
                                <a href="#" class="xe-user-name">
                                    <strong>Jack Gates</strong> ⋅ <time class="community-time">10分钟前</time>
                                </a>

                                <div class="label label-purple">标签</div> <small class="text-muted">In it except to so temper mutual tastes mother. Interested cultivated its continuing now yet are...</small>
                                <div class="community-options pull-right">
                                    <a href="#">
                                        <i class="linecons-thumbs-up"></i>
                                        赞
                                        <span>(3)</span>
                                    </a>

                                    <a href="#">
                                        <i class="linecons-comment"></i>
                                        评论
                                        <span>(5)</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </li>
                    <li>
                        <div class="xe-comment-entry">
                            <a href="#" class="xe-user-img">
                                <img src="/assets/images/user-2.png" class="img-circle" width="40" />
                            </a>

                            <div class="xe-comment">
                                <a href="#" class="xe-user-name">
                                    <strong>Jack Gates</strong> ⋅ <time class="community-time">10分钟前</time>
                                </a>

                                <div class="label label-purple">标签</div> <small class="text-muted">In it except to so temper mutual tastes mother. Interested cultivated its continuing now yet are...</small>
                                <div class="community-options pull-right">
                                    <a href="#">
                                        <i class="linecons-thumbs-up"></i>
                                        赞
                                        <span>(3)</span>
                                    </a>

                                    <a href="#">
                                        <i class="linecons-comment"></i>
                                        评论
                                        <span>(5)</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </li>
                    <li>
                        <div class="xe-comment-entry">
                            <a href="#" class="xe-user-img">
                                <img src="/assets/images/user-2.png" class="img-circle" width="40" />
                            </a>

                            <div class="xe-comment">
                                <a href="#" class="xe-user-name">
                                    <strong>Jack Gates</strong> ⋅ <time class="community-time">10分钟前</time>
                                </a>

                                <div class="label label-purple">标签</div> <small class="text-muted">In it except to so temper mutual tastes mother. Interested cultivated its continuing now yet are...</small>
                                <div class="community-options pull-right">
                                    <a href="#">
                                        <i class="linecons-thumbs-up"></i>
                                        赞
                                        <span>(3)</span>
                                    </a>

                                    <a href="#">
                                        <i class="linecons-comment"></i>
                                        评论
                                        <span>(5)</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </li>
                    <li>
                        <div class="xe-comment-entry">
                            <a href="#" class="xe-user-img">
                                <img src="/assets/images/user-2.png" class="img-circle" width="40" />
                            </a>

                            <div class="xe-comment">
                                <a href="#" class="xe-user-name">
                                    <strong>Jack Gates</strong> ⋅ <time class="community-time">10分钟前</time>
                                </a>

                                <div class="label label-purple">标签</div> <small class="text-muted">In it except to so temper mutual tastes mother. Interested cultivated its continuing now yet are...</small>
                                <div class="community-options pull-right">
                                    <a href="#">
                                        <i class="linecons-thumbs-up"></i>
                                        赞
                                        <span>(3)</span>
                                    </a>

                                    <a href="#">
                                        <i class="linecons-comment"></i>
                                        评论
                                        <span>(5)</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </li>
                    <li>
                        <div class="xe-comment-entry">
                            <a href="#" class="xe-user-img">
                                <img src="/assets/images/user-2.png" class="img-circle" width="40" />
                            </a>

                            <div class="xe-comment">
                                <a href="#" class="xe-user-name">
                                    <strong>Jack Gates</strong> ⋅ <time class="community-time">10分钟前</time>
                                </a>

                                <div class="label label-purple">标签</div> <small class="text-muted">In it except to so temper mutual tastes mother. Interested cultivated its continuing now yet are...</small>
                                <div class="community-options pull-right">
                                    <a href="#">
                                        <i class="linecons-thumbs-up"></i>
                                        赞
                                        <span>(3)</span>
                                    </a>

                                    <a href="#">
                                        <i class="linecons-comment"></i>
                                        评论
                                        <span>(5)</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </li>
                    <li>
                        <div class="xe-comment-entry">
                            <a href="#" class="xe-user-img">
                                <img src="/assets/images/user-2.png" class="img-circle" width="40" />
                            </a>

                            <div class="xe-comment">
                                <a href="#" class="xe-user-name">
                                    <strong>Jack Gates</strong> ⋅ <time class="community-time">10分钟前</time>
                                </a>

                                <div class="label label-purple">标签</div> <small class="text-muted">In it except to so temper mutual tastes mother. Interested cultivated its continuing now yet are...</small>
                                <div class="community-options pull-right">
                                    <a href="#">
                                        <i class="linecons-thumbs-up"></i>
                                        赞
                                        <span>(3)</span>
                                    </a>

                                    <a href="#">
                                        <i class="linecons-comment"></i>
                                        评论
                                        <span>(5)</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </li>
                    <li>
                        <div class="xe-comment-entry">
                            <a href="#" class="xe-user-img">
                                <img src="/assets/images/user-2.png" class="img-circle" width="40" />
                            </a>

                            <div class="xe-comment">
                                <a href="#" class="xe-user-name">
                                    <strong>Jack Gates</strong> ⋅ <time class="community-time">10分钟前</time>
                                </a>

                                <div class="label label-purple">标签</div> <small class="text-muted">In it except to so temper mutual tastes mother. Interested cultivated its continuing now yet are...</small>
                                <div class="community-options pull-right">
                                    <a href="#">
                                        <i class="linecons-thumbs-up"></i>
                                        赞
                                        <span>(3)</span>
                                    </a>

                                    <a href="#">
                                        <i class="linecons-comment"></i>
                                        评论
                                        <span>(5)</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </li>
                </ul>

            </div>
            <div class="xe-footer">
                <a href="#">加载更多...</a>
            </div>
        </div>

    </div>
</div>
@endsection

