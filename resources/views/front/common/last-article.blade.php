<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/1/7
 * Time: 上午11:47
 */
?>
<div class="panel panel-color panel-purple yese-panel article-panel"><!-- Add class "collapsed" to minimize the panel -->
    <div class="panel-heading">
        <h3 class="panel-title">热门文章</h3>

    </div>

    <div class="panel-body">

        <div class="list-group artile-list">
            @foreach($hots as $key=>$hot)
                <a href="{{ route('article.show',$hot->id) }}" class="list-group-item"><span class="label label-purple">{{$key+1}}</span> {{ $hot->title }} </a>
            @endforeach
        </div>
    </div>
</div>
