<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2016/10/1
 * Time: 下午1:38
 * Desc: 前台布局文件
 */
?>
<!DOCTYPE html>
<html lang="zh-CN" class="no-js">

<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
    <!--[if lt IE 9]>
    <script src="wp-content/themes/pm/js/html5.js"></script>
    <![endif]-->
    <meta name="keywords" content="{{ $keywords }}">
    <meta name="description" content="{{ $description }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {!! Html::style("front/img/favicon.ico",['type'=> 'image/vnd.microsoft.icon','rel'=>'shortcut icon']) !!}
    {!! Html::style("front/build/css/app.css") !!}
</head>

<body class="home blog">
<div class="site-main surface-container">
    <header id="header-nav" class="site-header u-clearfix">
        <div class="contianer">
            <a href="{{ route('home') }}">{!! Html::image('front/build/img/logo.png',null,['class'=>'logo']) !!}</a>
            <div class="header-block">
                <nav class="header-nav">
                    <ul class="subnav-ul layoutSingleColumn layoutSingleColumn--wide">
                        <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item menu-item-home"><a href="{{ route('home') }}">首页</a></li>
                        <li class="fenlei menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children">
                            <a href="#">分类浏览</a>
                            <ul class="sub-menu">
                                @foreach($articleCategory as $key=>$category)
                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="{{ route('article-category',$category->id) }}">{{ $category->category_name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="niubi menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children">
                            <a href="#">社区</a>
                            <ul class="sub-menu">
                                @foreach($communityCategory as $key=>$category)
                                    <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="{{ route('community-category',$category->id) }}">{{ $category->category_name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="header-block u-floatRight">
                <a target="_blank" href="#"><span class="iconfont icon-search"></span></a>
                <span class="user-avatar">
                    @if($loginUser)
                        {!! Html::image($loginUser->avatar,null,['class'=>'avatar','width'=>30,'height'=>30]) !!}
                        <div class="user-top-nav">
                            <h4 class="user-name">{{ $loginUser->name }}</h4>
                            <ul>
                                <li><a href="{{ route('collections') }}">我的收藏</a></li>
                                <li><a href="{{ route('profile') }}">资料修改</a></li>
                            </ul>
                            <div class="user-logout"><a href="{{ url('logout') }}">退出登录</a></div>
                        </div>
                    @else
                        {!! Html::image('front/build/img/default.jpg',null,['class'=>'avatar','width'=>30,'height'=>30]) !!}
                        <div class="user-top-nav">
                            <h4 class="user-name">未登录</h4>
                            <ul>
                                <li><a href="{{ url('login') }}">登录</a></li>
                                <li><a href="{{ url('register') }}">注册</a></li>
                            </ul>
                        </div>
                    @endif

                </span>
            </div>
        </div>
    </header>
    @yield('body')
    <!--blue-foot-->
    <footer class="site-footer">
        <div class="contianer u-clearfix footer-top">
            <div class="footer-block-left">
                <p>{!! Html::image('front/build/img/logo.png') !!}</p>
                <a class="a-font mar-r27" href="{{ route('about') }}">关于我们</a>
                <a class="a-font" href="{{ route('contribute') }}">投稿须知</a>
                <a class="a-font mar-r27" href="{{ route('suggestions') }}">改善建议</a>
                <a class="a-font" href="{{ route('statement') }}">免责声明</a>
            </div>
            <div class="footer-block-center">
                {{ $slogan }}
            </div>
            <div class="u-floatRight">
                <ul class="site-icon-list">
                    <li>
                        <div class="app-qrcode">
                            <img src="../image.woshipm.com/build/img/footer-appdownload.png">
                        </div>
                        <span class="iconfont icon-android"></span>
                    </li>
                    <li>
                        <div class="app-qrcode">
                            <img src="../image.woshipm.com/wp-files/2016/09/footer-wechat.png">
                        </div>
                        <span class="iconfont icon-wechat"></span>
                    </li>
                    <li>
                        <div class="app-qrcode">
                            <img src="../image.woshipm.com/build/img/footer-appdownload.png">
                        </div>
                        <span class="iconfont icon-ios"></span>
                    </li>
                    <li>
                        <a href="../weibo.com/526006123" target="_blank" title="关注新浪微博"><span class="iconfont icon-weibo"></span></a>
                    </li>
                </ul>
                <div class="u-textAlignCenter site-tel">服务热线: 400-657-9987</div>
            </div>
        </div>
        <div class="u-textAlignCenter copyright">Copyright © 2010-2016 iyese.com - 夜色 - 粤ICP备14037330号-1</div>
    </footer>
</div>
<div class="back2top"><span class="iconfont icon-top"></span></div>
<div class="loadingBar"></div>
{!! Html::script("front/build/js/jquery-1.12.4.min.js") !!}
{{--{!! Html::script("front/build/js/app.min.js") !!}--}}
{!! Html::script("front/build/js/app.js") !!}
</body>

</html>
