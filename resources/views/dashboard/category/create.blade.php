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
     <div class="panel-heading">新建分类</div>
     <div class="panel-body">

     {!! Form::model($data,['route'=>'dashboard.category.store','class'=>'validate','method'=>'post']) !!}
        @include('dashboard.category.form',['submitButtonText'=>'创建'])
     {!! Form::close() !!}
     </div>
 </div>

 @stop


 @section('scripts')
 {!! Html::script("assets/js/jquery-validate/jquery.validate.min.js") !!}
 @stop
