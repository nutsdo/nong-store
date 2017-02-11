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
    {{--<div class="row">--}}
        {{--<div class="col-sm-12">--}}
            {{--<div class="panel text-center">--}}
                {{--@foreach($products as $product)--}}
                {{--<a href="{{ route('product.show', $product->id) }}" class="btn btn-{{ random_color() }}">{{ $product->title }}</a>--}}
                {{--@endforeach--}}
            {{--</div>--}}
        {{--</div>--}}

    {{--</div>--}}
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
                    @foreach($experiences as $item)
                    <div class="col-sm-4 grid-item">

                        <div class="xe-widget xe-single-news">
                            <div class="xe-image">
                                {!! Html::image($item->thumb_url,$item->title) !!}
                                <span class="xe-gradient"></span>
                            </div>

                            <div class="xe-details">
                                <div class="category">
                                    <a href="#">情趣内衣</a>
                                </div>

                                <h3>
                                    <a href="{{ route('experience.show', $item->id) }}">{{ $item->title }}</a>
                                </h3>

                                <time><a href="{{ route('ucenter',$item->author->id) }}" class="text-white">{{ $item->author->nick_name }}</a>·{{ $item->created_time->diffForHumans() }}</time>
                            </div>
                        </div>

                    </div>
                    @endforeach

                </div>

            </div>
            @if($experiences->hasMorePages())
            <div class="panel">
                <button class="btn btn-purple btn-block load-more" data-next="{{ $experiences->nextPageUrl() }}">
                    <i class="fa-bars"></i>
                    加载更多...
                </button>
            </div>
            @endif
        </div>
        <div class="col-sm-3">
            @include('front.experience.partials.sidebar',['experiencers',$experiencers])
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
                fitWidth: false,
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