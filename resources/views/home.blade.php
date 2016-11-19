@extends('layouts.front')

@section('body')
    <div class="contianer u-clearfix">
        <div class="left-column">
            <div class="banner">
                <div class="tabBox u-clearfix">
                    <div class="bd">
                        <ul>
                            @foreach($banners as $key=>$banner)
                                @if($key<4)
                                    <li>
                                        <div class="imgs">
                                            <a href="{{ url($banner->route_url) }}" target="_blank" title="{{$banner->title}}">
                                                {!! Html::image($banner->image_url,$banner->title,['width'=> 670,'height'=>320]) !!}
                                            </a>
                                        </div>
                                        <div class="text">
                                            <h3><a href="{{ url($banner->route_url) }}" target="_blank" title="{{$banner->title}}">{{$banner->title}}</a>
                                            </h3>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                        <div class="prev"><span class="iconfont icon-zuoqiehuan"></span></div>
                        <div class="next"><span class="iconfont icon-youqiehuan"></span></div>
                    </div>
                    <div class="supernice">
                        <ul>
                            @foreach($banners as $key=>$banner)
                                @if($key<4)
                                    <li></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="hd smallScroll">
                        <ul class="">
                            @foreach($banners as $key=>$banner)
                                @if($key>3)
                                    <li>
                                        <a href="{{ url($banner->route_url) }}" target="_blank" title="{{$banner->title}}">
                                            {!! Html::image($banner->image_url) !!}}
                                        </a>
                                        <h3><a href="{{ url($banner->route_url) }}" target="_blank" title="{{$banner->title}}">{{$banner->title}}</a></h3>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <nav class="index-nav u-clearfix">
                <span class="current load-new-posts">最新文章</span>
                {{--<span class="load-hot-posts" data-orderby="meta_value_num">7 日热文</span>--}}
                {{--<span class="load-hot-jobs">热门职位</span>--}}
                {{--<span class="load-hot-questions">热门问答</span>--}}
            </nav>
            <section class="bigfa-ajax-wrapper">
                <div class="blockGroup homeGroup">
                    @foreach($last_articles as $article)
                        <article class="u-clearfix stream-list-item">
                            <div class="stream-list-image">
                                <a href="{{ route('article.show',$article->id) }}"><img src="{{ $article->thumb_url }}" width=202 height=145></a>
                                <div class="stream-list-category">
                                    <a href="{{ route('article.show',$article->id) }}" rel="category tag">数据分析</a>
                                </div>
                            </div>
                            <div class="stream-list-content">
                                <h2 class="stream-list-title"><a target="_blank" href="{{ route('article.show',$article->id) }}" title="{{ $article->title }}">{{ $article->title }}</a></h2>
                                <div class="stream-list-meta">
                                <span class="avatar-inline">
                                    <a target="_blank" href="">
                                        <img src="{{ $article->author->avatar }}" alt="" height="32" width="32" class="avatar">
                                    </a>
                                </span>
                                <span class="author"><a target="_blank" href="#">
                                        @if($article->author_type=='user')
                                            {{ $article->author->name }}
                                        @else
                                            {{ $article->author->admin_name }}
                                        @endif
                                    </a></span>
                                    <span class="dot"></span>
                                    <time>{{ $article->created_time }}</time>
                                </div>
                                <div class="stream-list-snipper">{!! $article->body !!}...</div>
                                <footer class="stream-list-footer">
                                <span class="post-views">
                                    <span class="iconfont icon-view"></span>阅读 {{ $article->views }}
                                </span>
                                <span class="post-marks">
                                    <span class="iconfont icon-heart"></span>收藏 {{ $article->collections }}
                                </span>
                                <span class="post-likes">
                                    <span class="iconfont icon-zan"></span>被赞 {{ $article->likes }}
                                </span>
                                </footer>
                            </div>
                        </article>
                    @endforeach
                </div>
                <!--<div class="loadmore u-textAlignCenter" data-paged="2">加载更多</div>-->
            </section>
        </div>
        <div class="right-column">
            <div class="sidebar">
                <aside id="widget_hot_posts-2" class="widget widget_widget_hot_posts">
                    <h3 class="widget-title">
                        热门文章
                        <span class="u-floatRight hot-nav">
                            <span class="is-active" data-action="bookmark">收藏</span>
                            <span data-action="comments">评论</span>
                            <span data-action="likes">点赞</span>
                        </span>
                    </h3>
                    <ul class="hot-question-list widget-posts-list">
                        @foreach($hot_articles as $key=>$article)
                            <li class="hot-question-item">
                                <span class="num">{{ $key+1 }}</span>
                                <a href="javascript:;" target="_blank" class="link">{{ $article->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </aside>

            </div>
        </div>
    </div>
@endsection
