<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2016/10/20
 * Time: 下午11:20
 */
?>

@unless($trees->isEmpty())
    <ul @if(!$trees[0]->father_id)id="main-menu"@endif class="main-menu">
        <!-- add class "multiple-expanded" to allow multiple submenus to open -->
        <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
        @foreach($trees as $category)
            <li class="@if($currentRoute==$category->fun_route_name) active @endif">

                <a href="@if($category->fun_route_name) {{ route($category->fun_route_name) }} @else javascript:; @endif">
                    <i class="{{ $category->fun_icon }}"></i>
                    <span class="title">{{ $category->fun_name }}</span>
                </a>
                @include('dashboard.menu', [ 'trees' => $category->children ])

            </li>
        @endforeach

    </ul>
@endunless
<script>
    var menu_ul = $('#main-menu li .active').parent();
    menu_ul.show();
    menu_ul.parent().addClass('expanded');
</script>