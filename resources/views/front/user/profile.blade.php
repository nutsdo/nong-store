<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2016/11/12
 * Time: 下午2:25
 */
?>
@extends('layouts.front')
@section('body')
    {{ $my->id }}
    {{ $my->nickname }}
    {{ $my->email }}
    {!! Html::image($my->avatar,null,['width'=>80]) !!}
@endsection

