<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/1/15
 * Time: 下午12:46
 */
?>
<div class="form-group">
    {!! Form::label('title', '申请概述',['class'=>'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::text('title',null,[
         'class'=>'form-control',
         'data-validate'=>'required',
         'data-message-required'=>'申请概述不能为空',
         'placeholder'=>'请用一句话描述一下自己...'
     ]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('body', '申请理由',['class'=>'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::textarea('body',null,[
            'class'=>'form-control',
            'id'   => 'body',
            'placeholder'=>'请详细描述一下您的详细情况及申请理由...'
        ]) !!}
    </div>

</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-4">
        <button type="submit" class="btn btn-success review" @if($apply && $apply->status==1) disabled @endif>提交申请</button>
    </div>
</div>
