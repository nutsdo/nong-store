<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/1/15
 * Time: 下午10:31
 */
?>
@extends('layouts.app')
@section('main')
    <div class="row">
        <div class="col-sm-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    {!! Form::model($apply,['url'=>route('experience.apply-store'),'class'=>'validate form-horizontal','method'=>'post','id'=>'form']) !!}

                    @include('front.experience.partials.form')

                    {!! Form::close() !!}
                </div>
            </div>

        </div>
        <div class="col-sm-3">
            @include('front.experience.partials.rule')
            @include('front.experience.partials.welfare')
        </div>
    </div>
@endsection
@section('scripts')
    {!! Html::script('assets/ckeditor/ckeditor.js') !!}
    <script>
        var editor = CKEDITOR.replace( 'body' ,{
            customConfig : 'custom/front_config.js',
            filebrowserImageUploadUrl:'/assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
        });

    </script>
@endsection
