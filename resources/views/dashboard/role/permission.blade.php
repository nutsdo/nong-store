<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 8/29/15
 * Time: 8:57 AM
 */
 ?>
 @extends('layouts.dashboard')

 @section('main')

    <div class="panel panel-default">
        <div class="panel-heading">菜单列表</div>
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-8">
                    {!! Form::model($role,['route'=>['dashboard.role.permission.update',$role->id],'class'=>'validate','method'=>'POST','id'=>'form']) !!}
                    @include('dashboard.role.partials.tree')
                    <div class="form-group">
                        {!! Form::submit('保存',['class'=>'btn btn-success']) !!}
                        {!! Form::reset('重置',['class'=>'btn btn-white']) !!}
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>

        </div>
    </div>
    <!--主体 end-->

 @stop
 @section('css')
    {!! Html::style("assets/js/uikit/uikit.css") !!}
 @stop

 @section('scripts')
    {!! Html::script("assets/js/uikit/js/uikit.min.js") !!}
    {!! Html::script("assets/js/uikit/js/addons/nestable.min.js") !!}
 @stop