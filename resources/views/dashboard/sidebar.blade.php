<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 8/27/15
 * Time: 7:16 PM
 */
 ?>
<ul id="main-menu" class="main-menu">
    <!-- add class "multiple-expanded" to allow multiple submenus to open -->
    <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
    <li class="active opened active">
        <a href="../layouts/dashboard-1.html">
            <i class="linecons-cog"></i>
            <span class="title">系统设置</span>
        </a>
        <ul>
            <li class="active">
                <a href="{{ route('dashboard.setting.index') }}">
                    <span class="title">基本设置</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="title">高级设置</span>
                </a>
            </li>
            <li>
                <a href="dashboard-3.html">
                    <span class="title">第三方平台设置</span>
                </a>
            </li>
        </ul>
    </li>
    <li>
        <a href="layout-variants.html">
            <i class="linecons-desktop"></i>
            <span class="title">权限管理</span>
        </a>
        <ul>
            <li>
                <a href="{{ route('dashboard.admin.index') }}">
                    <span class="title">管理员</span>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard.role.index') }}">
                    <span class="title">角色</span>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard.menu.index') }}">
                    <span class="title">菜单管理</span>
                </a>
            </li>

        </ul>
    </li>
    <li>
        <a href="ui-panels.html">
            <i class="linecons-note"></i>
            <span class="title">内容管理</span>
        </a>
        <ul>
            <li>
                <a href="{{ route('dashboard.article_category.index') }}">
                    <span class="title">文章分类</span>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard.articles.index') }}">
                    <span class="title">文章列表</span>
                </a>
            </li>

            <li>
                <a href="{{ route('dashboard.pages.index') }}">
                    <span class="title">单页管理</span>
                </a>
            </li>

        </ul>
    </li>

    <li>
        <a href="mailbox-main.html">
            <i class="linecons-mail"></i>
            <span class="title">产品管理</span>
            <span class="label label-success pull-right">5</span>
        </a>
        <ul>
            <li>
                <a href="{{ route('dashboard.category.index') }}">
                    <span class="title">产品类目</span>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard.products.index') }}">
                    <span class="title">产品列表</span>
                </a>
            </li>
        </ul>
    </li>
    <li>
        <a href="tables-basic.html">
            <i class="linecons-database"></i>
            <span class="title">订单管理</span>
        </a>
        <ul>
            <li>
                <a href="tables-basic.html">
                    <span class="title">未完成订单</span>
                </a>
            </li>
            <li>
                <a href="tables-responsive.html">
                    <span class="title">已完成订单</span>
                </a>
            </li>
            <li>
                <a href="tables-datatables.html">
                    <span class="title">取消的订单</span>
                </a>
            </li>
        </ul>
    </li>
    <li>
        <a href="forms-native.html">
            <i class="linecons-params"></i>
            <span class="title">会员管理</span>
        </a>
        <ul>
            <li>
                <a href="forms-native.html">
                    <span class="title">会员管理</span>
                </a>
            </li>
            <li>
                <a href="forms-advanced.html">
                    <span class="title">会员组设置</span>
                </a>
            </li>
        </ul>
    </li>
    <li>
        <a href="extra-gallery.html">
            <i class="linecons-beaker"></i>
            <span class="title">运营设置</span>
            <span class="label label-purple pull-right hidden-collapsed">New Items</span>
        </a>
        <ul>
            <li>
                <a href="extra-profile.html">
                    <span class="title">广告</span>
                </a>
            </li>
            <li>
                <a href="extra-login.html">
                    <span class="title">友情链接</span>
                </a>
            </li>
            <li>
                <a href="extra-lockscreen.html">
                    <span class="title">其他</span>
                </a>
            </li>
        </ul>
    </li>

</ul>
