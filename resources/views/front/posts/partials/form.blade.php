<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/1/15
 * Time: 下午12:46
 */
?>
<div class="form-group">
    {!! Form::label('bbs_category_id', '分类',['class'=>'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::select('bbs_category_id', $categories, null, [ 'class' => 'form-control' ]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('title', '帖子标题',['class'=>'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::text('title',null,[
         'class'=>'form-control',
         'data-validate'=>'required',
         'data-message-required'=>'请输入帖子标题.',
         'placeholder'=>'帖子标题'
     ]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('body', '帖子内容',['class'=>'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::textarea('body',null,[
            'class'=>'form-control',
            'id'   => 'body',
            'placeholder'=>'帖子内容'
        ]) !!}
    </div>

</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-4">
        <button type="submit" class="btn btn-success review">发布</button>
    </div>
</div>
