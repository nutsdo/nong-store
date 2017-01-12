<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/1/8
 * Time: 下午12:02
 */
?>
@unless($list->isEmpty())
    @foreach($list as $article)
        <li>
            <div class="xe-comment-entry">
                <a href="" class="xe-user-img">
                    {!! Html::image($article->user->avatar, $article->user->nick_name, [
                        'data-src'=>$article->user->avatar,'class'=>'img-circle','width'=>40
                    ]) !!}
                </a>

                <div class="xe-comment">
                    <a href="#" class="xe-user-name">
                        <strong>{{ $article->user->nick_name }}</strong> ⋅ <time class="community-time">{{ $article->created_time->diffForHumans() }}</time>
                    </a>

                    <a href="{{ route('community-category',$article->category->id) }}"><div class="label label-purple">{{ $article->category->category_name }}</div></a>
                    <small class="text-muted"><a href="{{ route('posts.show',$article->id) }}">{{ $article->title }}</a></small>
                    <div class="community-options pull-right">
                        <a href="#">
                            <i class="linecons-thumbs-up"></i>
                            赞
                            <span>({{ $article->likes->count() }})</span>
                        </a>

                        <a href="#">
                            <i class="linecons-comment"></i>
                            评论
                            <span>({{ $article->comments->count() }})</span>
                        </a>
                    </div>
                </div>
            </div>

        </li>
    @endforeach
@endunless
