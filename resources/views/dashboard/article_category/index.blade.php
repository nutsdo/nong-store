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
    <!--主体 start-->
    <div class="panel panel-default">
        <div class="panel-body">

            <div class="vertical-top">

                <a href="{{ route('dashboard.article_category.create') }}" class="btn btn-success btn-icon">
                    <i class="fa-plus-square"></i>
                    <span>新建分类</span>
                </a>

            </div>

        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">分类管理</div>
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-8">
                    @include('dashboard.article_category.tree')
                </div>
            </div>

        </div>
    </div>
    <!--主体 end-->

 @stop
@section('others')
    <div class="modal fade" id="delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">确定要删除？</h4>
                </div>
                {!! Form::open(['url'=>'','method'=>'DELETE','id'=>'delete_form']) !!}
                <div class="modal-body">

                    您确定要删除吗？

                </div>

                <div class="modal-footer">
                    {!! Form::submit('删除',['class'=>'btn btn-danger']) !!}
                    {!! Form::button('取消',['class'=>'btn btn-info','data-dismiss'=>'modal']) !!}
                </div>
                {!! Form::close()!!}
            </div>
        </div>
    </div>
@stop
 @section('css')
    {!! Html::style("assets/js/uikit/uikit.css") !!}
 @stop

 @section('scripts')
    {!! Html::script("assets/js/uikit/js/uikit.min.js") !!}
    {!! Html::script("assets/js/uikit/js/addons/nestable.min.js") !!}
    <script>
        $('.delete').click(function(){
            $('#delete_form').attr('action',$(this).data('action'));
            $('#delete_modal').modal('show');
        });
    </script>
 @stop