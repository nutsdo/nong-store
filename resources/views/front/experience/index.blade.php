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
                {{--<div class="panel-heading">--}}
                    {{--<h3 class="panel-title">最新</h3>--}}

                    {{--<div class="panel-options">--}}
                        {{--<a href="#" data-toggle="panel">--}}
                            {{--<span class="collapse-icon">&ndash;</span>--}}
                            {{--<span class="expand-icon">+</span>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="panel-body yese-body grid">

                    <div class="col-sm-4 grid-item">

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
                    <div class="col-sm-4 grid-item">

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
                    <div class="col-sm-4 grid-item">

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

            <div class="panel">
                <button class="btn btn-purple btn-block load-more" data-next="{{ $experiences->nextPageUrl() }}">
                    <i class="fa-bars"></i>
                    加载更多...
                </button>
            </div>
        </div>
        <div class="col-sm-3">
            @include('front.experience.partials.sidebar')
        </div>
    </div>
@endsection
@section('scripts')
    {!! Html::script('assets/js/masonry.pkgd.min.js') !!}
    <script>
        $(function() {
            // init Masonry
            var $grid = $('.grid').masonry({
                itemSelector: '.grid-item',
                fitWidth: true,
                transitionDuration: '0.8s'
            });

            $('.load-more').on( 'click', function(e) {
                var $ele = $(e.target);
                var next = $ele.data('next');

                if (next!='') {
                    $.get( next, function( response ) {

                        if (response.next==null){
                            $ele.data('next','');
                            $ele.attr('disabled',true).text('没有更多内容了');
                        }
                        // wrap content in jQuery object
                        var $content = $( response.data );

                        // add jQuery object
                        $grid.append( $content ).masonry( 'appended', $content );
                    });
                }
            });
        });
    </script>
@endsection