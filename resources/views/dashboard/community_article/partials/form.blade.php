<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 8/31/15
 * Time: 11:47 AM
 */
 ?>

 <div class="form-group">
    {!! Form::label('bbs_category_id', '所属分类',['class'=>'control-label col-sm-2']) !!}
     <div class="col-sm-10">
    {!! Form::select('bbs_category_id', $categories, null, [ 'class' => 'form-control' ]) !!}
     </div>
    {!! $errors->first('bbs_category_id') !!}
 </div>

 <div class="form-group">
     {!! Form::label('body', '文章内容',['class'=>'control-label col-sm-2']) !!}
     <div class="col-sm-10">
     {!! Form::textarea('body',null,[
         'class'=>'form-control',
         'placeholder'=>'文章内容'
     ]) !!}
     </div>
 </div>

 <div class="form-group">
     {!! Form::label('', '',['class'=>'control-label col-sm-2']) !!}
     <div class="col-sm-10">
     {!! Form::submit($submitButtonText,['class'=>'btn btn-success']) !!}
     {!! Form::reset('重置',['class'=>'btn btn-white']) !!}
     </div>
 </div>