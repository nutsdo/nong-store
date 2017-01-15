<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/1/14
 * Time: 下午11:33
 */
?>
@extends('layouts.app')
@section('main')
    <div class="row">
        <div class="col-sm-12">
            <div class="panel text-center">
                <button class="btn btn-{{ random_color() }}">Primary</button>
                <button class="btn btn-{{ random_color() }}">Secondary</button>
                <button class="btn btn-{{ random_color() }}">Purple</button>
                <button class="btn btn-{{ random_color() }}">Orange</button>
                <button class="btn btn-{{ random_color() }}">Pink</button>
                <button class="btn btn-{{ random_color() }}">Turquoise</button>
                <button class="btn btn-{{ random_color() }}">Green</button>
                <button class="btn btn-{{ random_color() }}">Light Blue</button>
                <button class="btn btn-{{ random_color() }}">Blue</button>
                <button class="btn btn-{{ random_color() }}">Red</button>
                <button class="btn btn-{{ random_color() }}">Dark Red</button>
                <button class="btn btn-{{ random_color() }}">Yellow</button>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-sm-9">

            <div class="panel panel-color panel-purple yese-panel">
                <div class="panel-heading">
                    <h3 class="panel-title">最新</h3>

                    <div class="panel-options">
                        <a href="#" data-toggle="panel">
                            <span class="collapse-icon">&ndash;</span>
                            <span class="expand-icon">+</span>
                        </a>
                    </div>
                </div>
                <div class="panel-body">

                    <div class="col-sm-4">

                        <div class="xe-widget xe-single-news">
                            <div class="xe-image">
                                <img src="assets/images/news-image-widget-4.png" class="img-responsive" />
                                <span class="xe-gradient"></span>
                            </div>

                            <div class="xe-details">
                                <div class="category">
                                    <a href="#">Business</a>
                                </div>

                                <h3>
                                    <a href="#">We're at tipping point on climate</a>
                                </h3>

                                <time>Monday, 17 July</time>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-4">

                        <div class="xe-widget xe-single-news">
                            <div class="xe-image">
                                <img src="assets/images/news-image-widget-4.png" class="img-responsive" />
                                <span class="xe-gradient"></span>
                            </div>

                            <div class="xe-details">
                                <div class="category">
                                    <a href="#">Business</a>
                                </div>

                                <h3>
                                    <a href="#">We're at tipping point on climate</a>
                                </h3>

                                <time>Monday, 17 July</time>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-4">

                        <div class="xe-widget xe-single-news">
                            <div class="xe-image">
                                <img src="assets/images/news-image-widget-4.png" class="img-responsive" />
                                <span class="xe-gradient"></span>
                            </div>

                            <div class="xe-details">
                                <div class="category">
                                    <a href="#">Business</a>
                                </div>

                                <h3>
                                    <a href="#">We're at tipping point on climate</a>
                                </h3>

                                <time>Monday, 17 July</time>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>
        <div class="col-sm-3">
            <div class="panel">
                <div class="vertical-top">

                    <a href="{{ route('experience.apply') }}"  class="btn btn-info">
                        <span>成为体验师</span>
                    </a>

                    <a href="{{ route('experience.create') }}"  class="btn btn-info">
                        <span>发布体验报告</span>
                    </a>

                </div>

            </div>
        </div>
    </div>
@endsection
