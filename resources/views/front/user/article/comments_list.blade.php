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
        @foreach($comments as $key=>$comment)
            <div class="list-group-item">
                <span class="label label-purple">{{$comment->article->category->category_name}}</span>
                <a href="{{ route($type.'.show',$comment->article->id) }}"> {{ $comment->comment_body }} </a>
                <time class="pull-right"> 评论时间 {{ $comment->created_time }} </time>

            </div>
        @endforeach
    </div>
    <div class="pager">
        {!! $comments->links() !!}
    </div>

</div>

