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
     <div class="panel-heading">修改分类</div>
     <div class="panel-body">

     {!! Form::model($menu,['route'=>['dashboard.menu.update',$menu->id],'class'=>'validate','method'=>'PATCH']) !!}
        @include('dashboard.menu.partials.form',['submitButtonText'=>'修改'])
     {!! Form::close() !!}
     </div>
 </div>

 @stop


 @section('scripts')
 {!! Html::script("assets/js/jquery-validate/jquery.validate.min.js") !!}
 @stop