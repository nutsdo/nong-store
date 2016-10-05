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

    <!--面包屑导航 start-->
    <div class="page-title">

        <div class="title-env">
            <h1 class="title">文章分类</h1>
            <p class="description">Plain text boxes, select dropdowns and other basic form elements</p>
        </div>

            <div class="breadcrumb-env">

                <ol class="breadcrumb bc-1">
                    <li>
                        <a href="{{ route('dashboard') }}"><i class="fa-home"></i>首页</a>
                    </li>
                    <li>
                        <a href="forms-native.html">内容管理</a>
                    </li>
                    <li class="active">
                        <strong>文章列表</strong>
                    </li>
                </ol>

        </div>

    </div>
    <!--面包屑导航 end-->

    <!--主体 start-->
    <div class="panel panel-default">
        <div class="panel-body">

            <div class="vertical-top">

                <a href="{{ route('dashboard.pages.create') }}" class="btn btn-success btn-icon">
                    <i class="fa-plus-square"></i>
                    <span>添加页面</span>
                </a>

            </div>

        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">产品列表</h3>

            <div class="panel-options">
                <a href="#" data-toggle="panel">
                    <span class="collapse-icon">&ndash;</span>
                    <span class="expand-icon">+</span>
                </a>
                <a href="#" data-toggle="remove">
                    &times;
                </a>
            </div>
        </div>
        <div class="panel-body">

            <script type="text/javascript">
            jQuery(document).ready(function($)
            {
                $("#example-2").dataTable({
                    dom: "t" + "<'row'<'col-xs-6'i><'col-xs-6'p>>",
                    aoColumns: [
                        {bSortable: false},
                        null,
                        null,
                        null,
                        null,
                        null
                    ]
                });

                // Replace checkboxes when they appear
                var $state = $("#example-2 thead input[type='checkbox']");

                $("#example-2").on('draw.dt', function()
                {
                    cbr_replace();

                    $state.trigger('change');
                });

                // Script to select all checkboxes
                $state.on('change', function(ev)
                {
                    var $chcks = $("#example-2 tbody input[type='checkbox']");

                    if($state.is(':checked'))
                    {
                        $chcks.prop('checked', true).trigger('change');
                    }
                    else
                    {
                        $chcks.prop('checked', false).trigger('change');
                    }
                });
            });
            </script>

            <table class="table table-bordered table-striped" id="example-2">
                <thead>
                    <tr>
                        <th class="no-sorting">
                            <input type="checkbox" class="cbr">
                        </th>
                        <th>单页ID</th>
                        <th>文章标题</th>
                        <th>所属分类</th>
                        <th>模版名</th>
                        <th>操作</th>
                    </tr>
                </thead>

                <tbody class="middle-align">
                @unless($pages->isEmpty())
                @foreach($pages as $page)
                    <tr>
                        <td>
                            <input type="checkbox" class="cbr">
                        </td>
                        <td>{{ $page->id }}</td>
                        <td>{{ $page->title }}</td>
                        <td>{{ $page->article_category_id }}</td>
                        <td>{{ $page->template_name }}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                    操作 <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-primary" role="menu">
                                    <li>
                                        <a href="{{ route('dashboard.pages.edit',$page->id) }}">修改</a>
                                    </li>
                                    <li>
                                        <a href="javascript:;" data-action="{{ route('dashboard.pages.destroy',$page->id) }}" class="delete">删除</a>
                                    </li>

                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
                @endunless
                </tbody>
            </table>

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
    {!! Html::style("assets/js/datatables/dataTables.bootstrap.css") !!}
 @stop

 @section('scripts')
    {!! Html::script("assets/js/datatables/js/jquery.dataTables.min.js") !!}
    {!! Html::script("assets/js/datatables/dataTables.bootstrap.js") !!}
    {!! Html::script("assets/js/datatables/yadcf/jquery.dataTables.yadcf.js") !!}
    {!! Html::script("assets/js/datatables/tabletools/dataTables.tableTools.min.js") !!}

    <script>
        $('.delete').click(function(){
            $('#delete_form').attr('action',$(this).data('action'));
            $('#delete_modal').modal('show');
        });
    </script>
 @stop