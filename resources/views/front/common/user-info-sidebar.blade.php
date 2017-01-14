<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/1/7
 * Time: 上午11:47
 */
?>
<!-- User Info Sidebar -->
<div class="user-info-sidebar panel panel-default">

    <a href="#" class="user-img">
        {!! Html::image($user->avatar,'user-img',['class'=>'img-cirlce img-responsive img-thumbnail','width'=>80]) !!}
    </a>

    <a href="#" class="user-name">
        {{ $user->nick_name }}
        <span class="user-status is-online"></span>
    </a>

                <span class="user-title">
                    {{ $user->signature }}
                </span>

    <hr />

    <ul class="list-unstyled user-info-list">
        <li>
            <i class="fa-home"></i>
            {{$user->country}}, {{$user->city}}
        </li>
        <li>
            <i class="fa-briefcase"></i>
            {{ $user->company }}
        </li>
        <li>
            <i class="fa-graduation-cap"></i>
            {{ $user->university }}
        </li>
    </ul>

    <hr />

    <ul class="list-unstyled user-friends-count">
        <li>
            <span>{{ $user->followers->count() }}</span>
            被关注
        </li>
        <li>
            <span>{{ $user->following->count() }}</span>
            关注
        </li>
    </ul>

    <button type="button" class="btn btn-success btn-block text-left"
            data-yese="ys-follow" data-url="{{ dingo_route('local','api.user.follow') }}" data-author="{{ $user->id }}">
        @if($loginUser)
            @if($user->isFollower($loginUser->id))
                <span>取消关注</span>
                <i class="fa-check pull-right"></i>
            @else
                <span>关注</span>
            @endif
        @else
            <span>关注</span>
        @endif
    </button>
</div>
