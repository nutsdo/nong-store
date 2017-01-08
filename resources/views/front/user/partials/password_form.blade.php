<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/1/2
 * Time: 下午4:34
 */
?>
{!! Form::model($loginUser,['url'=>dingo_route('local','api.user.profile','password'),'class'=>'validate form-horizontal','method'=>'put','id'=>'form']) !!}

    <div class="form-group">
        <label class="col-sm-2 control-label" for="old_password">原密码</label>

        <div class="col-sm-10">
            <input type="password" name="old_password" class="form-control" id="old_password" placeholder="请输入原密码...">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label" for="password">新密码</label>

        <div class="col-sm-10">
            <input type="password" name="password" class="form-control" id="password" placeholder="请输入新密码...">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label" for="password_confirmation">确认新密码</label>

        <div class="col-sm-10">
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="请输入确认密码...">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="button" class="btn btn-success submit">确认修改</button>
        </div>
    </div>
{!! Form::close() !!}
