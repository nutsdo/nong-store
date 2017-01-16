<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/1/15
 * Time: 下午2:18
 */
?>
<div class="panel">
    <div class="btn-group btn-group-justified text-center">
        @if(!$loginUser || !$loginUser->is_experiencer)
            <a href="{{ route('experience.apply') }}"  class="btn btn-info">
                <span>成为体验师</span>
            </a>
        @endif
        <a href="{{ route('experience.create') }}"  class="btn btn-info">
            <span>发布体验报告</span>
        </a>

    </div>

</div>
{{--明星体验师--}}
<div class="xe-widget xe-todo-list yese-widget">
    <div class="xe-header">
        <div class="xe-icon">
            <i class="el-fire"></i>
        </div>
        <div class="xe-label">
            <strong>明星体验师</strong>
            <span>集颜值、性感、才华于一体</span>
        </div>
    </div>
    <div class="xe-body">
        <div class="user-list text-center">
            <a href="#" class="user-img-small">
                <img src="/assets/images/user-4.png" alt="user-img" class="img-cirlce img-responsive img-thumbnail" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tooltip on top">
            </a>
            <a href="#" class="user-img-small">
                <img src="/assets/images/user-4.png" alt="user-img" class="img-cirlce img-responsive img-thumbnail" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tooltip on top">
            </a>
            <a href="#" class="user-img-small">
                <img src="/assets/images/user-4.png" alt="user-img" class="img-cirlce img-responsive img-thumbnail" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tooltip on top">
            </a>
            <a href="#" class="user-img-small">
                <img src="/assets/images/user-4.png" alt="user-img" class="img-cirlce img-responsive img-thumbnail" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tooltip on top">
            </a>
            <a href="#" class="user-img-small">
                <img src="/assets/images/user-4.png" alt="user-img" class="img-cirlce img-responsive img-thumbnail" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tooltip on top">
            </a>
        </div>
    </div>

</div>
{{--热门体验文章--}}
<div class="panel panel-color panel-info yese-panel article-panel"><!-- Add class "collapsed" to minimize the panel -->
    <div class="panel-heading">
        <h3 class="panel-title">最热体验</h3>

    </div>

    <div class="panel-body">

        <div class="list-group artile-list">
            @foreach($experiences as $key=>$experience)
                <a href="{{ route('article.show',$experience->id) }}" class="list-group-item">
                    <span class="label label-info">{{$key+1}}</span>
                    {{ $experience->title }}
                </a>
            @endforeach
        </div>
    </div>
</div>