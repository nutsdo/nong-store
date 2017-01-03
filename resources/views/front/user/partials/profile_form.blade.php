<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/1/2
 * Time: 下午4:34
 */
?>
{!! Form::model($loginUser,['url'=>dingo_route('local','api.user.profile','profile'),'class'=>'validate form-horizontal','method'=>'put','id'=>'form']) !!}

    <div class="form-group">
        <label class="col-sm-2 control-label" for="name">用户名</label>

        <div class="col-sm-10">
            <input type="text" class="form-control" id="name"
                   name="name" value="{{ $my->name }}"
                   placeholder="请输入用户名..." @if($my->name) disabled @endif>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label" for="email">邮箱</label>

        <div class="col-sm-10">
            <input type="email" class="form-control" id="email" name="email" value="{{ $my->email }}" placeholder="请输入邮箱..." disabled>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label" for="nick_name">昵称</label>

        <div class="col-sm-10">
            <input type="text" class="form-control" id="nick_name" name="nick_name" value="{{ $my->nick_name }}" placeholder="请输入用昵称...">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label" for="signature">个人说明</label>

        <div class="col-sm-10">
            <textarea class="form-control" cols="5" id="signature" name="signature" placeholder="这个家伙很懒，什么都没留下..."></textarea>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="button" class="btn btn-success submit">更新资料</button>
        </div>
    </div>
{!! Form::close() !!}
