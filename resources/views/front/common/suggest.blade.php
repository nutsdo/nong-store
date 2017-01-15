<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/1/15
 * Time: 下午9:52
 */
?>
@unless($articles->isEmpty())
<div class="panel panel-color panel-default yese-panel article-panel"><!-- Add class "collapsed" to minimize the panel -->
    <div class="panel-heading">
        <h3 class="panel-title">推荐文章</h3>

    </div>

    <div class="panel-body">

        <div class="list-group artile-list">
            @foreach($articles as $key=>$article)
                <a href="{{ route('article.show',$article->id) }}" class="list-group-item"><span class="label label-purple">{{$key+1}}</span> {{ $article->title }} </a>
            @endforeach
        </div>
    </div>
</div>
@endunless
