<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2016/11/18
 * Time: 下午9:38
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title'){{ $title }}</title>

    <!-- CSS -->
    {!! Html::style("https://fonts.googleapis.com/css?family=Roboto:100,100italic,300,300italic,400,400italic,500,500italic") !!}
    {!! Html::style("assets/auth/css/bootstrap.min.css") !!}
    {!! Html::style("assets/auth/css/font-awesome.min.css") !!}
    {!! Html::style("assets/auth/css/animate.css") !!}
    @yield('style')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="./assets/images/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="./assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="./assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="./assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="./assets/ico/apple-touch-icon-57-precomposed.png">

</head>

<body>

<!-- Top menu -->
<nav class="navbar navbar-inverse navbar-fixed-top navbar-no-bg" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="">
                <a href="{{ route('home') }}" class="logo">
                    {!! Html::image('/assets/images/logo.png','',['width'=>60,'class'=>'hidden-xs']) !!}
                    {!! Html::image('/assets/images/logo.png','',['width'=>60,'class'=>'visible-xs']) !!}
                </a>
                {{--<a href="#" data-toggle="settings-pane" data-animate="true">--}}
                {{--<i class="linecons-cog"></i>--}}
                {{--</a>--}}
            </div>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="top-navbar-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a class="scroll-link" href="{{ route('home') }}">首页</a></li>
                {{--<li><a class="scroll-link" href=""># 2</a></li>--}}
                {{--<li><a class="scroll-link" href=""># 3</a></li>--}}
            </ul>
        </div>
    </div>
</nav>

@yield('body')
<!-- Footer -->
<footer>
    <div class="container">
        {{--<div class="row">--}}
            {{--<div class="col-sm-12 footer-social">--}}
                {{--<a href="#"><i class="fa fa-facebook"></i></a>--}}
                {{--<a href="#"><i class="fa fa-dribbble"></i></a>--}}
                {{--<a href="#"><i class="fa fa-twitter"></i></a>--}}
                {{--<a href="#"><i class="fa fa-google-plus"></i></a>--}}
                {{--<a href="#"><i class="fa fa-instagram"></i></a>--}}
                {{--<a href="#"><i class="fa fa-pinterest"></i></a>--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="row">
            <div class="col-sm-12 footer-copyright">
                Copyright &copy; 2016-2017
                <a href="http://iyese.love" target="_blank"><strong>iyese.love</strong>.</a>All Rights Reserved.石家庄柚子科技有限公司
            </div>
        </div>
    </div>
</footer>
<!-- Javascript -->
{!! Html::script("assets/auth/js/jquery-1.11.1.min.js") !!}
{!! Html::script("assets/auth/js/bootstrap.min.js") !!}
{!! Html::script("assets/auth/js/jquery.backstretch.min.js") !!}
{!! Html::script("assets/auth/js/wow.min.js") !!}
{!! Html::script("assets/auth/js/retina-1.1.0.min.js") !!}
{!! Html::script("assets/auth/js/waypoints.min.js") !!}
@yield('script')
<!--[if lt IE 10]>
{!! Html::script("assets/auth/js/placeholder.js") !!}
<![endif]-->

</body></html>
