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
                <p class=""><img src="../image.woshipm.com/build/img/footer-logo.png"></p>
                <a class="a-font mar-r27" href="../zt.woshipm.com/5years/index.html">关于我们</a>
                <a class="a-font" href="tougao/default.htm">投稿须知</a>
                <a class="a-font mar-r27" href="../wen.woshipm.com/question/detail/omkf.html">意见反馈</a>
                <a class="a-font" href="disclaimer/default.htm">免责声明</a>
            </div>
            <div class="footer-block-center">人人都是产品经理（woshipm.com）是中国最大、最活跃的以产品经理为核心的学习、交流、分享社群，集媒体、教育、招聘、社群活动为一体，全方位服务产品经理，微信公众号woshipm。成立6年以来举办线上活动500余场，线下活动200+场，覆盖北京、上海、广州、深圳、杭州、成都等10余城市，在互联网业内得到了广泛关注和高度好评。社区目前拥有300万忠实粉丝，其中产品经理占比70万，
                中国75%的产品经理都在这里。
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
