<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/2/14
 * Time: 下午10:34
 */
?>
@extends('layouts.store')
@section('breadcrumbs')
<!-- Titlebar
================================================== -->
<section class="titlebar">
    <div class="container">
        <div class="sixteen columns">
            <h2>Shop</h2>

            <nav id="breadcrumbs">
                <ul>
                    <li><a href="{{ route('store.home') }}">首页</a></li>
                    <li><a href="{{ route('store.category.index',$product->category->id) }}">{{ $product->category->category_name }}</a></li>
                    <li><a>{{ $product->title }}</a></li>
                </ul>
            </nav>
        </div>
    </div>
</section>
@endsection

@section('main')

    <div class="container">

        <!-- Slider
        ================================================== -->
        <div class="eight columns" >
            <div class="slider-padding">
                <div id="product-slider-vertical" class="royalSlider rsDefault">
                    @foreach($product->images as $image)
                    <a href="{{ url($image->image_url) }}" class="mfp-gallery" title="{{ $image->image_desc }}">
                        {!! Html::image(url($image->image_url), $title, ['class'=>'rsImg', 'data-rsTmb'=> url($image->image_url)]) !!}
                    </a>
                    @endforeach
                </div>
                <div class="clearfix"></div>
            </div>
        </div>


        <!-- Content
        ================================================== -->
        <div class="eight columns">
            <div class="product-page">

                <!-- Headline -->
                <section class="title">
                    <h2>{{ $product->title }}</h2>
                    <span class="product-price">¥{{ $product->sale_price }}</span>
                </section>

                <!-- Text Parapgraph -->
                <section>
                    <p class="margin-reset">
                        Maecenas consequat mauris nec semper tristique. Etiam fermentum augue ac vulputate pulvinar. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque <a href="#">ThemeForest</a> arcu sed mollis. Nulla egestas nulla elit, eu condimentum diam fringilla blandit.
                    </p>

                    <!-- Share Buttons -->
                    <div class="share-buttons">
                        <ul>
                            <li><a href="#">分享</a></li>
                            <li class="share-facebook"><a href="#">Facebook</a></li>
                            <li class="share-twitter"><a href="#">Twitter</a></li>
                            <li class="share-gplus"><a href="#">Google Plus</a></li>
                            <li class="share-pinit"><a href="#">Pin It</a></li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>

                </section>


                <section class="linking">

                    <form action='#'>
                        <div class="qtyminus"></div>
                        <input type='text' name="quantity" value='1' class="qty" />
                        <div class="qtyplus"></div>
                    </form>

                    <a href="javascript:;" data-pid="{{ $product->id }}" class="button adc">加入购物车</a>
                    <div class="clearfix"></div>

                </section>

            </div>
        </div>

    </div>


    <div class="container">
        <div class="sixteen columns">
            <!-- Tabs Navigation -->
            <ul class="tabs-nav">
                <li class="active"><a href="#tab1">商品详情</a></li>
                <li><a href="#tab2">规格与包装</a></li>
                <li><a href="#tab3">评论 <span class="tab-reviews">(0)</span></a></li>
            </ul>

            <!-- Tabs Content -->
            <div class="tabs-container">

                <div class="tab-content" id="tab1">
                    {!! $product->body !!}
                </div>

                <div class="tab-content" id="tab2">

                    <table class="basic-table">
                        <tr>
                            <th>Material</th>
                            <td>Wool</td>
                        </tr>

                        <tr>
                            <th>Weight</th>
                            <td>0.5 lbs</td>
                        </tr>

                        <tr>
                            <th>Size</th>
                            <td>Medium</td>
                        </tr>
                    </table>

                </div>

                <div class="tab-content" id="tab3">

                    <!-- Reviews -->
                    <section class="comments">
                        <p class="margin-bottom-10">还没有评论～</p>

                        <a href="#small-dialog" class="popup-with-zoom-anim button color margin-left-0">评论</a>

                        <div id="small-dialog" class="zoom-anim-dialog mfp-hide">
                            <h3 class="headline">评论</h3><span class="line margin-bottom-25"></span><div class="clearfix"></div>

                            <!-- Form -->
                            <form id="add-comment" class="add-comment">
                                <fieldset>

                                    <div>
                                        <label>Name:</label>
                                        <input type="text" value="">
                                    </div>

                                    <div>
                                        <label>Rating:</label>
										<span class="rate">
											<span class="star"></span>
											<span class="star"></span>
											<span class="star"></span>
											<span class="star"></span>
											<span class="star"></span>
										</span>
                                        <div class="clearfix"></div>
                                    </div>

                                    <div class="margin-top-20">
                                        <label>Email: <span>*</span></label>
                                        <input type="text" value="">
                                    </div>

                                    <div>
                                        <label>Review: <span>*</span></label>
                                        <textarea cols="40" rows="3"></textarea>
                                    </div>

                                </fieldset>

                                <a href="#" class="button color">评论</a>
                                <div class="clearfix"></div>

                            </form>
                        </div>

                    </section>

                </div>

            </div>
        </div>
    </div>

    <!-- Related Products -->
    <div class="container margin-top-5">

        <!-- Headline -->
        <div class="sixteen columns">
            <h3 class="headline">相似产品</h3>
            <span class="line margin-bottom-0"></span>
        </div>

        <!-- Products -->
        <div class="products">

            <!-- Product #1 -->
            <div class="four columns">
                <figure class="product">
                    <div class="mediaholder">
                        <a href="#">
                            {!! Html::image('assets/store/images/shop_item_01.jpg') !!}
                            <div class="cover">
                                {!! Html::image('assets/store/images/shop_item_01_hover.jpg') !!}
                            </div>
                        </a>
                        <a href="#" class="product-button"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                    </div>

                    <a href="#">
                        <section>
                            <span class="product-category">Skirts</span>
                            <h5>Brown Mini Skirt</h5>
                            <span class="product-price">$79.00</span>
                        </section>
                    </a>
                </figure>
            </div>

            <!-- Product #2 -->
            <div class="four columns">
                <figure class="product">
                    <div class="mediaholder">
                        <a href="#">
                            {!! Html::image('assets/store/images/shop_item_04.jpg') !!}
                            <div class="cover">
                                {!! Html::image('assets/store/images/shop_item_04_hover.jpg') !!}
                            </div>
                        </a>
                        <a href="#" class="product-button"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                    </div>

                    <a href="#">
                        <section>
                            <span class="product-category">Shirts</span>
                            <h5>Vintage Stripe Jumper</h5>
                            <span class="product-price">$49.00</span>
                        </section>
                    </a>
                </figure>
            </div>

            <!-- Product #3 -->
            <div class="four columns">
                <figure class="product">
                    <div class="mediaholder">
                        <a href="#">
                            {!! Html::image('assets/store/images/shop_item_07.jpg') !!}
                            <div class="cover">
                                {!! Html::image('assets/store/images/shop_item_07_hover.jpg') !!}
                            </div>
                        </a>
                        <a href="#" class="product-button"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                    </div>

                    <a href="#">
                        <section>
                            <span class="product-category">Shirts</span>
                            <h5>Shirt in Navy Stripe</h5>
                            <span class="product-price">$49.00</span>
                        </section>
                    </a>
                </figure>
            </div>

            <!-- Product #4 -->
            <div class="four columns">
                <figure class="product">
                    <div class="mediaholder">
                        <a href="#">
                            {!! Html::image('assets/store/images/shop_item_09.jpg') !!}
                            <div class="cover">
                                {!! Html::image('assets/store/images/shop_item_09_hover.jpg') !!}
                            </div>
                        </a>
                        <a href="#" class="product-button"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                    </div>

                    <a href="#">
                        <section>
                            <span class="product-category">Shirts</span>
                            <h5>Long Sleeve Check Shirt</h5>
                            <span class="product-price">$69.00</span>
                        </section>
                    </a>
                </figure>
            </div>

        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $('.adc').on('click', function(){
            var pid = $(this).data('pid'),
                    qty = $('input[name=quantity]').val();
            $.ajax({
                url:'{{ dingo_route('local','api.cart.store') }}',
                type:'post',
                data:{pid:pid,qty:qty},
                dataType:'json'
            }).done(function(response){
                console.log(response);
            });
        });
    </script>
@endsection