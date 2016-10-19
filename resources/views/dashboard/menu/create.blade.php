<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 8/29/15
 * Time: 10:20 AM
 */
 ?>
 @extends('layouts.dashboard')
 @section('main')
 <div class="panel panel-default">
     <div class="panel-heading">新建菜单</div>
     <div class="panel-body">

     {!! Form::model($data,['route'=>'dashboard.menu.store','class'=>'validate','method'=>'post']) !!}
        @include('dashboard.menu.partials.form',['submitButtonText'=>'创建','path'=>''])
     {!! Form::close() !!}
     </div>
 </div>

 @stop


 @section('scripts')
 {!! Html::script("assets/js/jquery-validate/jquery.validate.min.js") !!}
 @stop
