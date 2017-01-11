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
                <span class="label label-purple">{{$article->category->category_name}}</span><a href="{{ route('article.show',$article->id) }}"> {{ $article->title }} </a>
                <time class="pull-right">{{ $article->created_time }} <a href="{{ route('user.article.edit',$article->id) }}" class="fa fa-edit"></a></time>

            </div>
        @endforeach
    </div>
    <div class="pager">
        {!! $articles->links() !!}
    </div>

</div>

