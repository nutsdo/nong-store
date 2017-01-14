<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/1/10
 * Time: 下午11:44
 */
?>
<div class="article-panel">

    <div class="list-group artile-list">
        @foreach($articles as $key=>$article)
            <div class="list-group-item">
                <span class="label label-purple">{{$article->category_name}}</span>
                <a href="{{ route($type.'.show',$article->id) }}"> {{ $article->title }} </a>
                <time class="pull-right"> 收藏时间 {{ $article->created_at }} </time>

            </div>
        @endforeach
    </div>
    <div class="pager">
        {!! $articles->links() !!}
    </div>

</div>

