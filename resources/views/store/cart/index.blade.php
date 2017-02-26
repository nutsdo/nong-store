<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/2/22
 * Time: 下午11:49
 */
?>
@extends('layouts.store')
@section('breadcrumbs')
        <!-- Titlebar
================================================== -->
<section class="titlebar">
    <div class="container">
        <div class="sixteen columns">
            <h2>购物车</h2>

            <nav id="breadcrumbs">
                <ul>
                    <li><a href="{{ route('store.home') }}">首页</a></li>
                    <li><a>购物车</a></li>
                </ul>
            </nav>
        </div>
    </div>
</section>
@endsection

@section('main')

    <div class="container cart">

        <div class="sixteen columns">

            <!-- Cart -->
            <table class="cart-table responsive-table">

                <tr>
                    <th>商品</th>
                    <th>介绍</th>
                    <th>单价</th>
                    <th>数量</th>
                    <th>总价</th>
                    <th></th>
                </tr>

                <!-- Item #1 -->
                <tr>
                    <td><img src="/assets/store/images/small_product_list_08.jpg" alt=""></td>
                    <td class="cart-title"><a href="#">Converse All Star Trainers</a></td>
                    <td>$79.00</td>
                    <td>
                        <form action='#'>
                            <div class="qtyminus"></div>
                            <input type='text' name="quantity" value='1' class="qty" />
                            <div class="qtyplus"></div>
                        </form>
                    </td>
                    <td class="cart-total">$79.00</td>
                    <td><a href="#" class="cart-remove"></a></td>
                </tr>

                <!-- Item #2 -->
                <tr>
                    <td><img src="/assets/store/images/small_product_list_09.jpg" alt=""></td>
                    <td class="cart-title"><a href="#">Wool Two-Piece Suit</a></td>
                    <td>$99.00</td>
                    <td>
                        <form action='#'>
                            <div class="qtyminus"></div>
                            <input type='text' name="quantity" value='1' class="qty" />
                            <div class="qtyplus"></div>
                        </form>
                    </td>
                    <td class="cart-total">$99.00</td>
                    <td><a href="#" class="cart-remove"></a></td>
                </tr>

            </table>

            <!-- Apply Coupon Code / Buttons -->
            <table class="cart-table bottom">

                <tr>
                    <th>
                        <form action="#" method="get" class="apply-coupon">
                            <input class="search-field" type="text" placeholder="Coupon Code" value="">
                            <a href="#" class="button gray">使用购物券</a>
                        </form>

                        <div class="cart-btns">
                            <a href="checkout-billing-details.html" class="button color cart-btns proceed">结算</a>
                            <a href="#" class="button gray cart-btns">更新购物车</a>
                        </div>
                    </th>
                </tr>

            </table>
        </div>


        <!-- Cart Totals -->
        <div class="eight columns cart-totals">
            <h3 class="headline">购物车统计</h3><span class="line"></span><div class="clearfix"></div>

            <table class="cart-table margin-top-5">

                <tr>
                    <th>小计</th>
                    <td><strong>¥178.00</strong></td>
                </tr>

                <tr>
                    <th>快递及运费</th>
                    <td>免费送货</td>
                </tr>

                <tr>
                    <th>订单总价</th>
                    <td><strong>¥178.00</strong></td>
                </tr>

            </table>
            <br>
            <!-- <a href="#" class="calculate-shipping"><i class="fa fa-arrow-circle-down"></i> Calculate Shipping</a> -->
        </div>

    </div>
@endsection
