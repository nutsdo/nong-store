<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 8/29/15
 * Time: 9:43 AM
 */
 ?>
 @unless ($categories->isEmpty())

    <ul class="uk-nestable" data-uk-nestable>

        @foreach($categories  as $category)

        <li>
            <div class="uk-nestable-item">
                <div class="uk-nestable-handle"></div>
                <div data-nestable-action="toggle"></div>
                <div class="list-label">{{ $category->category_name }}</div>
                <span class="actions">
                    <a href="{{ route('dashboard.category.edit', [ $category->getKey() ]) }}" title="修改分类">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>

                    <a href="{{ route('dashboard.category.create', [ 'father_id' => $category->getKey() ]) }}" title="添加子类">
                        <span class="glyphicon glyphicon-plus"></span>
                    </a>

                    <a href="javascript:;" data-action="{{ route('dashboard.category.destroy', $category->id) }}" class="delete" title="删除">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </span>
            </div>

            @include('dashboard.category.tree', [ 'categories' => $category->children ])
        </li>

        @endforeach
    </ul>

 @endunless