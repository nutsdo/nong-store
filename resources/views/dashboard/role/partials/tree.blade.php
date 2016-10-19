<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 8/29/15
 * Time: 9:43 AM
 */
 ?>
 @unless ($menus->isEmpty())

    <ul class="uk-nestable" data-uk-nestable>

        @foreach($menus  as $category)

        <li>
            <div class="uk-nestable-item">
                <div class="uk-nestable-handle"></div>
                <div data-nestable-action="toggle"></div>
                <div class="list-label">{{ $category->fun_name }}</div>
                <span class="actions">
                    <a href="{{ route('dashboard.menu.edit', [ $category->getKey() ]) }}" title="修改分类">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>

                    <a href="{{ route('dashboard.menu.create', [ 'father_id' => $category->getKey() ]) }}" title="添加子类">
                        <span class="glyphicon glyphicon-plus"></span>
                    </a>
                </span>
            </div>

            @include('dashboard.role.partials.tree', [ 'menus' => $category->children ])
        </li>

        @endforeach
    </ul>

 @endunless