<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/1/1
 * Time: 下午8:51
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="{{ $keywords }}">
    <meta name="description" content="{{ $description }}" />
    <meta name="author" content="http://iyese.love" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title'){{ $title }}</title>

    {{--{!! Html::style("http://fonts.useso.com/css?family=Arimo:400,700,400italic") !!}--}}
    {!! Html::style("assets/css/fonts/linecons/css/linecons.css") !!}
    {!! Html::style("assets/css/fonts/fontawesome/css/font-awesome.min.css") !!}
    {!! Html::style("assets/css/bootstrap.css") !!}
    {!! Html::style("assets/css/xenon-core.css") !!}
    {!! Html::style("assets/css/xenon-forms.css") !!}
    {!! Html::style("assets/css/xenon-components.css") !!}
    {!! Html::style("assets/css/xenon-skins.css") !!}
    {!! Html::style("assets/css/custom.css") !!}
    {!! Html::style("assets/css/fonts/elusive/css/elusive.css") !!}
    @yield('styles')
    {!! Html::script("assets/js/jquery-1.11.1.min.js") !!}
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body class="page-body">

<nav class="navbar horizontal-menu navbar-fixed-top"><!-- set fixed position by adding class "navbar-fixed-top" -->

    <div class="navbar-inner">

        <!-- Navbar Brand -->
        <div class="navbar-brand">
            <a href="{{ route('home') }}" class="logo">
                {!! Html::image('/assets/images/logo.png','',['width'=>60,'class'=>'hidden-xs']) !!}
                {!! Html::image('/assets/images/logo.png','',['width'=>60,'class'=>'visible-xs']) !!}
            </a>
            {{--<a href="#" data-toggle="settings-pane" data-animate="true">--}}
                {{--<i class="linecons-cog"></i>--}}
            {{--</a>--}}
        </div>

        <!-- Mobile Toggles Links -->
        <div class="nav navbar-mobile">

            <!-- This will toggle the mobile menu and will be visible only on mobile devices -->
            <div class="mobile-menu-toggle">
                <!-- This will open the popup with user profile settings, you can use for any purpose, just be creative -->
                <a href="#" data-toggle="settings-pane" data-animate="true">
                    <i class="linecons-cog"></i>
                </a>

                <a href="#" data-toggle="user-info-menu-horizontal">
                    <i class="fa-bell-o"></i>
                    <span class="badge badge-success">7</span>
                </a>

                <!-- data-toggle="mobile-menu-horizontal" will show horizontal menu links only -->
                <!-- data-toggle="mobile-menu" will show sidebar menu links only -->
                <!-- data-toggle="mobile-menu-both" will show sidebar and horizontal menu links -->
                <a href="#" data-toggle="mobile-menu-horizontal">
                    <i class="fa-bars"></i>
                </a>
            </div>

        </div>

        <div class="navbar-mobile-clear"></div>



        <!-- main menu -->

        <ul class="navbar-nav">
            <li @if($currentRoute=='home') class="active" @endif>
                <a href="{{ route('home') }}">
                    <i class="fa-home"></i>
                    <span class="title">首页</span>
                </a>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="fa-eye"></i>
                    <span class="title">发现</span>
                </a>
                <ul>
                    @foreach($articleCategory as $key=>$category)
                        <li>
                            <a href="{{ route('article-category',$category->id) }}">
                                <span class="title">{{ $category->category_name }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="fa-comments-o"></i>
                    <span class="title">浪漫夜色</span>
                </a>
                <ul>
                    @foreach($communityCategory as $key=>$category)
                        <li>
                            <a href="{{ route('community-category',$category->id) }}">
                                <span class="title">{{ $category->category_name }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li>
                <a href="{{ route('experience') }}">
                    <i class="fa-female"></i>
                    <span class="title">情趣体验师</span>
                </a>
            </li>
            <li>
                <a href="{{ route('store') }}">
                    <i class="fa-shopping-cart"></i>
                    <span class="title">夜色商城</span>
                </a>
            </li>
        </ul>


        <!-- notifications and other links -->
        <ul class="nav nav-userinfo navbar-right">

            {{--@include('front.common.notice')--}}
            @if($loginUser)
            <li class="dropdown user-profile">

                <a href="#" data-toggle="dropdown">
                    {!! Html::image($loginUser->avatar,'user-image',['class'=>'img-circle img-inline userpic-32','width'=>28]) !!}
                    <span>
                        {{ $loginUser->name }}
                        <i class="fa-angle-down"></i>
                    </span>
                </a>

                <ul class="dropdown-menu user-profile-menu list-unstyled">
                    <li>
                        <a href="{{ route('user.article','publish') }}">
                            <i class="fa-edit"></i>
                            发布文章
                        </a>
                    </li>
                    <li>
                        <a href="#settings">
                            <i class="fa-wrench"></i>
                            基本设置
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.profile') }}">
                            <i class="fa-user"></i>
                            个人资料
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.collections') }}">
                            <i class="fa-star"></i>
                            我的收藏
                        </a>
                    </li>

                    <li class="last">
                        <a href="{{ url('logout') }}">
                            <i class="fa-lock"></i>
                            退出
                        </a>
                    </li>
                </ul>

            </li>
            @else
                <li>
                    <a href="{{ url('login') }}">
                        <i class="fa-sign-in"></i>
                        登录
                    </a>
                </li>
                <li>
                    <a href="{{ url('register') }}">
                        <i class="fa-user"></i>
                        注册
                    </a>
                </li>
            @endif
            <li>
                <a href="#" data-toggle="chat">
                    <i class="fa-comments-o"></i>
                </a>
            </li>

        </ul>

    </div>

</nav>

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
    @yield('banner')
    <div class="main-content">

        @yield('main')

    </div>

</div>
<!-- Main Footer -->
<!-- Choose between footer styles: "footer-type-1" or "footer-type-2" -->
<!-- Add class "sticky" to  always stick the footer to the end of page (if page contents is small) -->
<!-- Or class "fixed" to  always fix the footer to the end of page -->
<footer class="main-footer sticky footer-type-1">

    <div class="footer-inner">

        <!-- Add your copyright text here -->
        <div class="footer-text">
            Copyright &copy; 2016-2017
            <a href="http://iyese.love" target="_blank"><strong>iyese.love</strong>.</a>All Rights Reserved.石家庄柚子科技有限公司
        </div>
        <!-- Go to Top Link, just add rel="go-top" to any link to add this functionality -->
        <div class="go-up">

            <a href="#" rel="go-top">
                <i class="fa-angle-up"></i>
            </a>

        </div>

    </div>

</footer>
@yield('others')
<!-- Bottom Scripts -->
{!! Html::script("assets/js/bootstrap.min.js") !!}
{!! Html::script("assets/js/TweenMax.min.js") !!}
{!! Html::script("assets/js/resizeable.js") !!}
{!! Html::script("assets/js/joinable.js") !!}
{!! Html::script("assets/js/xenon-api.js") !!}
{!! Html::script("assets/js/xenon-toggles.js") !!}

<!-- JavaScripts initializations and stuff -->
{!! Html::script("assets/js/xenon-custom.js") !!}
{!! Html::script("front/build/js/app.js") !!}

@yield('scripts')
</body>
</html>
