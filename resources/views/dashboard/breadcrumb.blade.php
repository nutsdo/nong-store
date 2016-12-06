<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2016/10/19
 * Time: 上午12:48
 */
?>
<!--面包屑导航 start-->
@if($breadcrumb)
<div class="page-title">

    <div class="title-env">
        <h1 class="title">{{ $breadcrumb->fun_name }}</h1>
        <p class="description">{{ $breadcrumb->description }}</p>
    </div>

    <div class="breadcrumb-env">

        <ol class="breadcrumb bc-1">
            <li>
                <a href="{{ route('dashboard') }}"><i class="fa-home"></i>首页</a>
            </li>
            <li>
                <a>{{ $breadcrumb->parent->fun_name }}</a>
            </li>
            <li class="active">
                <strong>{{ $breadcrumb->fun_name }}</strong>
            </li>
        </ol>

    </div>

</div>
@endif
<!--面包屑导航 end-->

