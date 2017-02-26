<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/2/13
 * Time: 下午11:01
 */
?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="ch-zn"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="ch-zn"> <!--<![endif]-->
<head>

    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
    {!! Html::style('assets/store/css/style.css') !!}
    {!! Html::style('assets/store/css/colors/green.css',['id'=>'colors']) !!}

    <!--[if lt IE 9]>
    {!! Html::script("https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js") !!}
    {!! Html::script("https://oss.maxcdn.com/respond/1.4.2/respond.min.js") !!}
    <![endif]-->

</head>

<body class="fullwidth">
<div id="wrapper">


    <!-- Top Bar
    ================================================== -->
    <div id="top-bar">
        <div class="container">

            <!-- Top Bar Menu -->
            <div class="ten columns">
                <ul class="top-bar-menu">
                    <li><i class="fa fa-phone"></i> (564) 123 4567</li>
                    <li><i class="fa fa-envelope"></i> <a href="#">service@iyese.love</a></li>
                    <li>
                        <div class="top-bar-dropdown">
                            <span>简体中文</span>
                            <ul class="options">
                                <li><div class="arrow"></div></li>
                                <li><a href="#">简体中文</a></li>
                                <li><a href="#">繁体中文</a></li>
                                <li><a href="#">English</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="top-bar-dropdown">
                            <span>人民币</span>
                            <ul class="options">
                                <li><div class="arrow"></div></li>
                                <li><a href="#">USD</a></li>
                                <li><a href="#">人民币</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Social Icons -->
            <div class="six columns">
                <ul class="social-icons">
                    <li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
                    <li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
                    <li><a class="dribbble" href="#"><i class="icon-dribbble"></i></a></li>
                    <li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
                    <li><a class="pinterest" href="#"><i class="icon-pinterest"></i></a></li>
                </ul>
            </div>

        </div>
    </div>

    <div class="clearfix"></div>


    <!-- Header
    ================================================== -->
    <div class="container">


        <!-- Logo -->
        <div class="four columns">
            <div id="logo">
                <h1>
                    <a href="{{ route('store.home') }}">
                        {!! Html::image('assets/images/logo.png' ,$title) !!}
                    </a>
                </h1>
            </div>
        </div>


        <!-- Additional Menu -->
        <div class="twelve columns">
            <div id="additional-menu">
                <ul>
                    <li><a href="shopping-cart.html">购物车</a><span>({{ $shoppingCart['count'] }})</span></li>
                    <li><a href="wishlist.html">购物清单 <span>(2)</span></a></li>
                    <li><a href="checkout-billing-details.html">结算</a></li>
                    <li><a href="my-account.html">我的账户</a></li>
                </ul>
            </div>
        </div>


        <!-- Shopping Cart -->
        <div class="twelve columns">

            <div id="cart">

                <!-- Button -->
                <div class="cart-btn">
                    <a href="#" class="button adc">¥{{ $shoppingCart['total'] }}</a>
                </div>

                <div class="cart-list">

                    <div class="arrow"></div>

                    <div class="cart-amount">
                        <span>{{ $shoppingCart['count'] }}个商品</span>
                    </div>

                    <ul>
                        @foreach($shoppingCart['content'] as $row)
                        <li>
                            <a href="#">{!! Html::image($row->model->thumb_url) !!}</a>
                            <a href="#">{{ $row->name }}</a>
                            <span>{{ $row->qty }} x ¥{{ $row->price }}</span>
                            <div class="clearfix"></div>
                        </li>
                        @endforeach
                    </ul>

                    <div class="cart-buttons button">
                        <a href="{{ route('store.cart') }}" class="view-cart" ><span data-hover="View Cart"><span>查看购物车</span></span></a>
                        <a href="javascript:;" class="checkout"><span data-hover="Checkout">结算</span></a>
                    </div>
                    <div class="clearfix">

                    </div>
                </div>

            </div>

            <!-- Search -->
            <nav class="top-search">
                <form action="#" method="get">
                    <button><i class="fa fa-search"></i></button>
                    <input class="search-field" type="text" placeholder="搜索" value="">
                </form>
            </nav>

        </div>

    </div>


    <!-- Navigation
    ================================================== -->
    <div class="container">
        <div class="sixteen columns">

            <a href="#menu" class="menu-trigger"><i class="fa fa-bars"></i> 菜单</a>

            <nav id="navigation">
                <ul class="menu" id="responsive">

                    <li><a href="index.html" class="current homepage" id="current">Home</a></li>

                    <li class="dropdown">
                        <a href="#">Shop</a>
                        <ul>
                            <li><a href="shop-with-sidebar.html">Shop With Sidebar</a></li>
                            <li><a href="shop-full-width.html">Shop Full Width</a></li>
                            <li><a href="checkout-billing-details.html">Checkout Pages</a></li>
                            <li><a href="shop-categories-grid.html">Categories Grid</a></li>
                            <li><a href="single-product-page.html">Single Product Page</a></li>
                            <li><a href="variable-product-page.html">Variable Product Page</a></li>
                            <li><a href="wishlist.html">Wishlist Page</a></li>
                            <li><a href="shopping-cart.html">Shopping Cart</a></li>
                        </ul>
                    </li>


                    <li>
                        <a href="#">Features</a>
                        <div class="mega">
                            <div class="mega-container">

                                <div class="one-column">
                                    <ul>
                                        <li><span class="mega-headline">Example Pages</span></li>
                                        <li><a href="contact.html">Contact</a></li>
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="services.html">Services</a></li>
                                        <li><a href="faq.html">FAQ</a></li>
                                        <li><a href="404-page.html">404 Page</a></li>
                                    </ul>
                                </div>

                                <div class="one-column">
                                    <ul>
                                        <li><span class="mega-headline">Featured Pages</span></li>
                                        <li><a href="index-2.html">Business Homepage</a></li>
                                        <li><a href="shop-with-sidebar.html">Default Shop</a></li>
                                        <li><a href="blog-masonry.html">Masonry Blog</a></li>
                                        <li><a href="variable-product-page.html">Variable Product</a></li>
                                        <li><a href="portfolio-dynamic-grid.html">Dynamic Grid</a></li>
                                    </ul>
                                </div>

                                <div class="one-column hidden-on-mobile">
                                    <ul>
                                        <li><span class="mega-headline">Paragraph</span></li>
                                        <li><p>This <a href="#">Mega Menu</a> can handle everything. Lists, paragraphs, forms...</p></li>
                                    </ul>
                                </div>

                                <div class="one-fourth-column hidden-on-mobile">
                                    <a href="#" class="img-caption margin-reset">
                                        <figure>
                                            {!! Html::image('assets/store/images/menu-banner-01.jpg') !!}
                                            <figcaption>
                                                <h3>Jeans</h3>
                                                <span>Pack for Style</span>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </div>

                                <div class="one-fourth-column hidden-on-mobile">
                                    <a href="#" class="img-caption margin-reset">
                                        <figure>
                                            {!! Html::image('assets/store/images/menu-banner-02.jpg') !!}
                                            <figcaption>
                                                <h3>Sunglasses</h3>
                                                <span>Nail the Basics</span>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </div>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </li>


                    <li class="dropdown">
                        <a href="#">Shortcodes</a>
                        <ul>
                            <li><a href="elements.html">Elements</a></li>
                            <li><a href="typography.html">Typography</a></li>
                            <li><a href="pricing-tables.html">Pricing Tables</a></li>
                            <li><a href="icons.html">Icons</a></li>
                        </ul>
                    </li>


                    <li class="dropdown">
                        <a href="#">Portfolio</a>
                        <ul>
                            <li><a href="portfolio-3-columns.html">3 Columns</a></li>
                            <li><a href="portfolio-4-columns.html">4 Columns</a></li>
                            <li><a href="portfolio-dynamic-grid.html">Dynamic Grid</a></li>
                            <li><a href="single-project.html">Single Project</a></li>
                        </ul>
                    </li>


                    <li class="dropdown">
                        <a href="#">Blog</a>
                        <ul>
                            <li><a href="blog-standard.html">Blog Standard</a></li>
                            <li><a href="blog-masonry.html">Blog Masonry</a></li>
                            <li><a href="blog-single-post.html">Single Post</a></li>
                        </ul>
                    </li>


                    <li class="demo-button">
                        <a href="#">Get This Theme</a>
                    </li>

                </ul>
            </nav>
        </div>
    </div>

    @yield('banner')

    @yield('breadcrumbs')

    @yield('main')

    <div class="margin-top-50"></div>

    <!-- Footer
    ================================================== -->
    <div id="footer">

        <!-- Container -->
        <div class="container">

            <div class="four columns">
                {!! Html::image('assets/store/images/logo-footer.png', $title, ['class'=>'margin-top-10']) !!}
                <p class="margin-top-15">Nulla facilisis feugiat magna, ut molestie metus hendrerit vitae. Vivamus tristique lectus at varius rutrum. Integer lobortis mauris non consectetur eleifend.</p>
            </div>

            <div class="four columns">

                <!-- Headline -->
                <h3 class="headline footer">客户服务</h3>
                <span class="line"></span>
                <div class="clearfix"></div>

                <ul class="footer-links">
                    <li><a href="#">订单状态</a></li>
                    <li><a href="#">支付方式</a></li>
                    <li><a href="#">发货 & 退货</a></li>
                    <li><a href="#">隐私政策</a></li>
                    <li><a href="#">法律声明</a></li>
                </ul>

            </div>

            <div class="four columns">

                <!-- Headline -->
                <h3 class="headline footer">我的账户</h3>
                <span class="line"></span>
                <div class="clearfix"></div>

                <ul class="footer-links">
                    <li><a href="#">我的账户</a></li>
                    <li><a href="#">历史订单</a></li>
                    <li><a href="#">愿望清单</a></li>
                </ul>

            </div>

            <div class="four columns">

                <!-- Headline -->
                <h3 class="headline footer">Newsletter</h3>
                <span class="line"></span>
                <div class="clearfix"></div>
                <p>Sign up to receive email updates on new product announcements, gift ideas, special promotions, sales and more.</p>

                <form action="#" method="get">
                    <button class="newsletter-btn" type="submit">Join</button>
                    <input class="newsletter" type="text" placeholder="mail@example.com" value="">
                </form>
            </div>

        </div>
        <!-- Container / End -->

    </div>
    <!-- Footer / End -->

    <!-- Footer Bottom / Start -->
    <div id="footer-bottom">

        <!-- Container -->
        <div class="container">

            <div class="eight columns">© Copyright 2014 by <a href="#">trizzy</a>. All Rights Reserved.</div>
            <div class="eight columns">
                <ul class="payment-icons">
                    <li>{!! Html::image('assets/store/images/visa.png') !!}</li>
                    <li>{!! Html::image('assets/store/images/mastercard.png') !!}</li>
                    <li>{!! Html::image('assets/store/images/skrill.png') !!}</li>
                    <li>{!! Html::image('assets/store/images/moneybookers.png') !!}</li>
                    <li>{!! Html::image('assets/store/images/paypal.png') !!}</li>
                </ul>
            </div>

        </div>
        <!-- Container / End -->

    </div>
    <!-- Footer Bottom / End -->

    <!-- Back To Top Button -->
    <div id="backtotop"><a href="#"></a></div>

</div>


<!-- Java Script
================================================== -->
{!! Html::script("http://code.jquery.com/jquery-1.11.0.min.js") !!}
{!! Html::script("http://code.jquery.com/jquery-migrate-1.2.1.min.js") !!}
{!! Html::script("assets/store/scripts/jquery.jpanelmenu.js") !!}
{!! Html::script("assets/store/scripts/jquery.themepunch.plugins.min.js") !!}
{!! Html::script("assets/store/scripts/jquery.themepunch.revolution.min.js") !!}
{!! Html::script("assets/store/scripts/jquery.themepunch.showbizpro.min.js") !!}
{!! Html::script("assets/store/scripts/jquery.magnific-popup.min.js") !!}
{!! Html::script("assets/store/scripts/hoverIntent.js") !!}
{!! Html::script("assets/store/scripts/superfish.js") !!}
{!! Html::script("assets/store/scripts/jquery.pureparallax.js") !!}
{!! Html::script("assets/store/scripts/jquery.pricefilter.js") !!}
{!! Html::script("assets/store/scripts/jquery.selectric.min.js") !!}
{!! Html::script("assets/store/scripts/jquery.royalslider.min.js") !!}
{!! Html::script("assets/store/scripts/SelectBox.js") !!}
{!! Html::script("assets/store/scripts/modernizr.custom.js") !!}
{!! Html::script("assets/store/scripts/waypoints.min.js") !!}
{!! Html::script("assets/store/scripts/jquery.flexslider-min.js") !!}
{!! Html::script("assets/store/scripts/jquery.counterup.min.js") !!}
{!! Html::script("assets/store/scripts/jquery.tooltips.min.js") !!}
{!! Html::script("assets/store/scripts/jquery.isotope.min.js") !!}
{!! Html::script("assets/store/scripts/puregrid.js") !!}
{!! Html::script("assets/store/scripts/stacktable.js") !!}
{!! Html::script("assets/store/scripts/custom.js") !!}
<script>
    $.ajaxSetup({
        headers: { "X-CSRF-TOKEN" : $('meta[name=csrf-token]').attr('content') }
    });
</script>
@yield('scripts')
</body>
</html>
