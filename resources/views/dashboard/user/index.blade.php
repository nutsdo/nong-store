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

                <a href="{{ route('dashboard.user.create') }}" class="btn btn-success btn-icon">
                    <i class="fa-plus-square"></i>
                    <span>添加用户</span>
                </a>

            </div>

        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">用户列表</h3>

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
                        <th>ID</th>
                        <th>头像</th>
                        <th>用户名</th>
                        <th>昵称</th>
                        <th>email</th>
                        <th>是否禁用</th>
                        <th>操作</th>
                    </tr>
                </thead>

                <tbody class="middle-align">
                @unless($users->isEmpty())
                @foreach($users as $user)
                    <tr>
                        <td>
                            <input type="checkbox" class="cbr">
                        </td>
                        <td>{{ $user->id }}</td>
                        <td>{!! Html::image($user->avatar,null,['width'=>'60']) !!}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->nick_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>@if($user->is_banned) 禁用 @else 正常 @endif</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                    操作 <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-primary" role="menu">
                                    <li>
                                        <a href="{{ route('dashboard.user.edit',$user->id) }}">修改</a>
                                    </li>
                                    <li>
                                        @if($user->is_banned)
                                            <a href="javascript:;" data-action="{{ route('dashboard.user.disabled',$user->id) }}" data-banned="0" class="disabled">正常</a>

                                        @else
                                            <a href="javascript:;" data-action="{{ route('dashboard.user.disabled',$user->id) }}" data-banned="1" class="disabled">禁用</a>
                                        @endif
                                    </li>
                                    <li>
                                        <a href="javascript:;" data-action="{{ route('dashboard.user.destroy',$user->id) }}" class="delete">删除</a>
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
    <div class="modal fade" id="disabled_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">确定要禁用该用户吗？</h4>
                </div>
                {!! Form::open(['url'=>'','method'=>'PATCH','id'=>'disabled_form']) !!}

                <div class="modal-body">

                    确定要禁用该用户吗？

                </div>
                {!! Form::hidden('is_banned','') !!}
                <div class="modal-footer">
                    {!! Form::submit('确定',['class'=>'btn btn-danger']) !!}
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
        $('.disabled').click(function(){
            var is_banned = $(this).data('banned');
            if (is_banned==1){
                $('#disabled_modal .modal-title,#disabled_modal .modal-body').text('确定要禁用该用户吗？');
            }else {
                $('#disabled_modal .modal-title,#disabled_modal .modal-body').text('确定要启用该用户吗？');
            }
            $('#disabled_form').attr('action',$(this).data('action'));
            $('#disabled_form input[name=is_banned]').val(is_banned);
            $('#disabled_modal').modal('show');
        });
    </script>
 @stop