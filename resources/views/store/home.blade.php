<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/2/13
 * Time: 下午10:58
 */
?>
@extends('layouts.store')
@section('main')
    <section class="gallery-env">

        <div class="row">

            <!-- Gallery Album Optipns and Images -->
            <div class="col-sm-12 gallery-right">

                <!-- Album Header -->
                <div class="album-header">
                    <h2>推荐</h2>
                </div>

                <!-- Album Images -->
                <div class="album-images row grid">
                    @include('store.products.partials.list')
                </div>
                @if($products->nextPageUrl())
                <button class="btn btn-white btn-block load-more" data-next="{{ $products->nextPageUrl() }}">
                    <i class="fa-bars"></i>
                    加载更多
                </button>
                @endif
            </div>

        </div>

    </section>
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