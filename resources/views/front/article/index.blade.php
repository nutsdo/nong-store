<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2016/11/9
 * Time: 下午11:45
 */
?>
@extends('layouts.front')
@section('body')
    <div class="ajaxWrapper">
        <div class="post-wrapper">
            <div class="contianer post-article is-showed">
                <div class="left-column">
                    <div class="content--withBorder">
                        <article id="post-440033" class="single-article post type-post status-publish format-standard hentry category-data-analysis">
                            <header class="entry-header">
                                <h2 class="post-title">{{ $article->title }}</h2>
                                <div class="post-meta">
                                    <time>{{ $article->created_time }}</time>
                                    <span class="post-views">
                                        <span class="iconfont icon-view"></span>阅读{{ $article->views }}</span>
                                    <span class="post-comment-count">
                                        <span class="iconfont icon-pinglun"></span>评论 {{ $article->views }}</span>
                                    <span class="post-mark"><span class="iconfont icon-heart"></span>收藏 {{ $article->collections }}</span>
                                </div>
                            </header>
                            <div class="entry-content">
                                <blockquote>
                                    <p>{!! $article->body !!}</p>
                                </blockquote>
                                <p><img data-action="zoom" class="size-full wp-image-440039 aligncenter" src="{{ $article->thumb_url }}"
                                        alt="" width="680" height="320" /></p>

                                <p>来源：{{ $article->article_source }}</p>
                                <p>本文来源于夜色合作媒体@</p>
                            </div>
                        </article>
                        <div class="support-author">
                            <div class="support-title">您的赞赏，是对我创作的最大鼓励。</div><button class="button--pay" data-post-id="440033" data-author="80001"
                                                                                     data-avatar=""><i class="iconfont icon-money1"></i><span>|</span>赞赏</button></div>
                        <div class="post-actions">
                            <button title="收藏" class="button button--primary button--toggle button--recommend button-post-440033 " data-id="440033" data-action="popLogin"><span class="iconfont icon-heart"></span><span class="button-label is-default">收藏</span><span class="button-label is-active">已收藏</span> | <span class="count">0</span></button>
                            <button class="button button--primary button--postlike" data-action="post-like" data-id="440033"><span class="button-defaultState"></span><span class="button-activeState"></span><span class="iconfont icon-zan"></span>赞
                                | <span class="count">1</span></button>
                            <div class="u-floatRight post-tags"><a href="../../tag/_25e6_258a_25a5_25e8_25a1_25a8_25e8_25ae_25be_25e8_25ae_25a1_25e8_25a6_2581_25e7_25b4_25a0.htm"
                                                                   rel="tag">报表设计要素</a><a href="../../tag/_25e6_2595_25b0_25e6_258d_25ae_25e5_2588_2586_25e6_259e_2590_25e6_258a_25a5_25e8_25a1_25a8.htm"
                                                                                          rel="tag">数据分析报表</a><a href="../../tag/_25e6_2596_25b9_25e6_25b3_2595_25e8_25ae_25ba.htm"
                                                                                                                 rel="tag">方法论</a></div>
                        </div>
                        <div class="post-ads">
                            <a href="../../../www.qidianla.com/course/pm.html@channel=wm" target="_blank"><img src="../../../image.woshipm.com/wp-files/2015/05/detail-qidian.png"></a>
                        </div>
                    </div>
                    <div class="fixed-article-nav u-clearfix">
                        <div class="u-floatLeft"><a title="评论" href="#comments-440033"><span class="iconfont icon-pinglun"></span></a>
                            <button
                                    title="收藏" class="button button--primary button--toggle button--recommend button-post-440033 button--chromeless"
                                    data-id="440033" data-action="popLogin"><span class="iconfont icon-heart"></span></button>
                        </div>
                        <div class="u-floatRight">
                            <a class="share-weibo" target="_blank" href="../../../service.weibo.com/share/share.php@appkey=2775287854&title=_25e6_2595_2599_25e7_25a8_258b_25ef_25bd_259c_25e6_2595_25b0_25e6_258d_25ae_25e5_0dbbdc17b1"><span class="iconfont icon-weibo"></span></a><span class="share-wechat"><span class="iconfont icon-wechat"></span>
                                <div class="share-qrcode-image"><img src="../../../qr.liantu.com/api.php@text=http_3a_2f_2fwww.woshipm.com_2fdata-analysis_2f440033.html.png"
                                    />
                                    <p>扫码分享到微信</p>
                                </div>
                                </span>
                        </div>
                    </div>
                    <div id="comments-440033" class="comments-area">
                        <h2 class="comments-title">
                            评论（ <span>0</span> ）
                        </h2>
                        <div id="respond" class="respond respond-440033" role="form">
                            <form action="http://www.woshipm.com/wp-comments-post.php" method="post" id="commentform" data-post="440033" class="comment-form u-clearfix">
                                <div class="comment-avatar">
                                    <a class="comment-avatar" href="javascript:;"><img class="avatar" width="40" height="40" alt="" src="../../wp-content/themes/pm/build/img/default.jpg"></a>
                                </div>
                                <div class="comm-con">
                                    <div class="comment-empty"><span class=" u-cursorPointer" data-action="popLogin"><span class="u-underline">登录</span>后参与评论</span>
                                    </div>
                                </div>
                                <input type='hidden' name='comment_post_ID' value='440033' id='comment_post_ID' />
                                <input type='hidden' name='comment_parent' id='comment_parent' value='0' />
                            </form>
                        </div>
                        <div class="commentshow" id="comment-post-440033">
                            <ol class="comment-list comment-list-440033">
                            </ol>
                        </div>
                    </div>
                    <div class="load-next-post button--loadmore" data-url="http://www.woshipm.com/pmd/440014.html">加载中</div>
                </div>
                <div class="right-column">
                    <div class="sidebar">
                        <div class="widget">
                            <div class="author-board">
                                <div class="author-board-left">
                                    <a href="../../u/80001/default.htm" target="_blank" id="article-avatar-440033"><img src="../../../image.woshipm.com/wp-files/2016/04/36data.png!avatar.png" alt=""
                                                                                                                        height="56" width="56" class="avatar"></a>
                                    <button class="button button--toggleAuthor author-board-btn" data-action="showLoginForm" data-id="80001"><span class="text">订阅专栏</span></button>                                        </div>
                                <div class="author-board-right">
                                    <h3 class="auhtor-title"><a target="_blank" href="../../u/80001/default.htm">36大数据<span class="is-staff">合作媒体</span></a></h3>
                                    <p class="author-descripiton">大数据第一平台</p>
                                    <div class="author-meta"><span>18篇<i>作品</i></span><span>71.3k<i>阅读总量</i></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="widget-ad">
                            <a href="../../../www.qidianla.com/course/yunying.html@channel=b2" target="_blank">
                                <img src="../../../image.woshipm.com/wp-files/2016/09/yykecheng0907.png" alt="">
                            </a>
                        </div>
                        <div class="widget-ad">
                            <a href="../../../www.qidianla.com/course/pm.html@channel=b1" target="_blank">
                                <img src="../../../image.woshipm.com/wp-files/2016/08/06012021323377779.png" alt="">
                            </a>
                        </div>
                        <div class="widget-ad">
                            <a href="../../../https@www.jiguang.cn/devservice/@from=woshipm01" target="_blank">
                                <img src="../../../image.woshipm.com/wp-files/2016/10/wk3ed1psdttwhji0uwxr.jpg" alt="">
                            </a>
                        </div>
                        <aside id="hot_questions-2" class="widget widget_hot_questions">
                            <h3 class="widget-title">热门问题</h3>
                            <ul class="hot-question-list">
                                <li class="hot-question-item" data-id="33187"><span class="num">1</span><a target="_blank" href="../../../wen.woshipm.com/question/detail/0u5ne.html"
                                                                                                           class="link">怎么培养产品的细节意识，让产品更精致？</a></li>
                                <li class="hot-question-item" data-id="33184"><span class="num">2</span><a target="_blank" href="../../../wen.woshipm.com/question/detail/g0krr.html"
                                                                                                           class="link">#每日一问#KPI考核VS产品体验，产品人应该怎么平衡？</a></li>
                                <li class="hot-question-item" data-id="7042"><span class="num">3</span><a target="_blank" href="../../../wen.woshipm.com/question/detail/0952s.html"
                                                                                                          class="link">PM跟项目经理有冲突，该怎么解决？</a></li>
                                <li class="hot-question-item" data-id="7041"><span class="num">4</span><a target="_blank" href="../../../wen.woshipm.com/question/detail/tk4ij.html"
                                                                                                          class="link">想了解下，什么时候用户卸载一个应用的可能性最高？</a></li>
                                <li class="hot-question-item" data-id="6756"><span class="num">5</span><a target="_blank" href="../../../wen.woshipm.com/question/detail/ta1lf.html"
                                                                                                          class="link">为什么用户很长时间都不愿意升级应用？</a></li>
                                <li class="hot-question-item" data-id="6746"><span class="num">6</span><a target="_blank" href="../../../wen.woshipm.com/question/detail/5rk2s.html"
                                                                                                          class="link">对产品的长期发展而言，应如何维持用户的活跃度和高质量内容的平衡？</a></li>
                                <li class="hot-question-item" data-id="6626"><span class="num">7</span><a target="_blank" href="../../../wen.woshipm.com/question/detail/0cr2s.html"
                                                                                                          class="link">B端产品初期冷启动，该选择什么推广方式？</a></li>
                                <li class="hot-question-item" data-id="6624"><span class="num">8</span><a target="_blank" href="../../../wen.woshipm.com/question/detail/gefdr.html"
                                                                                                          class="link">从需求到功能，产品经理应如何判断和分析？</a></li>
                                <li class="hot-question-item" data-id="6523"><span class="num">9</span><a target="_blank" href="../../../wen.woshipm.com/question/detail/slj6e.html"
                                                                                                          class="link">产品设计要遵循用户体验的原则听多了，但是落地执行后的评判标准和原则是？</a></li>
                                <li class="hot-question-item" data-id="5561"><span class="num">10</span><a target="_blank" href="../../../wen.woshipm.com/question/detail/kv7ij.html"
                                                                                                           class="link">产品经理应如何管理团队？</a></li>
                            </ul>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
