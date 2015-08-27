<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 8/27/15
 * Time: 9:28 PM
 */
 ?>
 @extends('layouts.dashboard')

 @section('main')
 <!--面包屑导航 start-->
<div class="page-title" xmlns="http://www.w3.org/1999/html">

        <div class="title-env">
            <h1 class="title">基本设置</h1>
            <p class="description">Plain text boxes, select dropdowns and other basic form elements</p>
        </div>

            <div class="breadcrumb-env">

                <ol class="breadcrumb bc-1">
                    <li>
                        <a href="{{ route('dashboard') }}"><i class="fa-home"></i>首页</a>
                    </li>
                    <li>
                        <a href="forms-native.html">系统设置</a>
                    </li>
                    <li class="active">
                        <strong>基本设置</strong>
                    </li>
                </ol>

        </div>

    </div>
 <!--面包屑导航 end-->

 <!--主体部分 start-->

    <div class="panel panel-default">

        <div class="panel-heading">
            <div class="panel-title">
                基本信息设置
            </div>

            <small class="text-small pull-right" style="padding-top:5px;">
                <code>建议以下信息全部填写</code>
            </small>
        </div>

        <div class="panel-body">

            {!! Form::open(['route'=>'dashboard.setting.store','role'=>"form",'id'=>'setting','method'=>'POST','class'=>'validate']) !!}

                <div class="form-group">
                    <label class="control-label">网站名称</label>

                    <input type="text" class="form-control" name="web_name" data-validate="required" value="{{ $setting->web_name }}" data-message-required="请输入您的网站名称." placeholder="网站名称" />
                </div>

                <div class="form-group">
                    <label class="control-label">网站描述</label>

                    <input type="text" class="form-control" name="description" data-validate="required" value="{{ $setting->description }}" placeholder="请输入您的网站简介" />
                </div>

                <div class="form-group">
                    <label class="control-label">网站关键字</label>

                    <input type="text" class="form-control" name="keywords" data-validate="" value="{{ $setting->keywords }}" placeholder="关键字" />
                </div>

                <div class="form-group">
                    <label class="control-label">备案号</label>

                    <input type="text" class="form-control" name="icp" data-validate="" value="{{ $setting->icp }}" placeholder="工信部备案号" />
                </div>

                <div class="form-group">
                    <label class="control-label">统计代码</label>

                    <textarea type="text" class="form-control" name="stat_code" data-validate="" placeholder="统计代码" >{{ $setting->stat_code }}</textarea>
                </div>

                <div class="form-group">
                    <label class="control-label">版权信息</label>

                    <textarea type="text" class="form-control" name="copyright" data-validate="required" placeholder="版权信息（支持html代码）">{{ $setting->copyright }}</textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">保存</button>
                    <button type="reset" class="btn btn-white">重置</button>
                </div>

            {!! Form::close() !!}

        </div>

    </div>
  <!--主体部分 end-->

 @stop

 @section('scripts')
 {!! Html::script("assets/js/jquery-validate/jquery.validate.min.js") !!}
 @stop

