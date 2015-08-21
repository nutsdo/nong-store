<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 8/21/15
 * Time: 3:21 PM
 */
 ?>
@extends('layouts.master')
@section('container')
<div class="login-container">

    <div class="row">

        <div class="col-sm-6">

            点击这里重置密码: {{ url('password/reset/'.$token) }}

        </div>

    </div>

</div>
@stop

@section('script')
{!! Html::script("assets/js/jquery-validate/jquery.validate.min.js") !!}
@stop