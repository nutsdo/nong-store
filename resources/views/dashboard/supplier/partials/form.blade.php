<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 8/31/15
 * Time: 11:47 AM
 */
 ?>
 <div class="form-group">
     {!! Form::label('supplier_name', '供应商',['class'=>'control-label col-sm-2']) !!}
     <div class="col-sm-10">
     {!! Form::text('supplier_name',null,[
         'class'=>'form-control',
         'data-validate'=>'required',
         'data-message-required'=>'请输入供应商.',
         'placeholder'=>'请输入供应商'
     ]) !!}
     </div>
     {!! $errors->first('supplier_name') !!}
 </div>
<div class="form-group">
    {!! Form::label('is_banned', '是否禁用',['class'=>'control-label col-sm-2']) !!}
    <div class="checkbox">
        <div class="col-sm-2">
            <input type="radio" name="is_banned" value="1" class="cbr cbr-success">禁用
        </div>
        <div class="col-sm-2">
            <input type="radio" name="is_banned" value="0" class="cbr cbr-secondary" checked>正常
        </div>
    </div>
    {!! $errors->first('is_banned') !!}
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {!! Form::submit($submitButtonText,['class'=>'btn btn-success']) !!}
        {!! Form::reset('重置',['class'=>'btn btn-white']) !!}
    </div>
</div>

