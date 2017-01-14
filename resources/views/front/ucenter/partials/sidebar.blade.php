<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/1/8
 * Time: 下午12:02
 */
?>
<div class="list-group list-group-minimal"><!-- Add class "list-group-minimal" for less padding between list items -->
    <a href="{{ route('ucenter.article',$user->id) }}" class="list-group-item @if($currentRoute=='user.article') active @endif">
        <i class="fa-file-image-o"></i>
        Ta的文章
    </a>
    <a href="{{ route('ucenter.posts',$user->id) }}" class="list-group-item @if($currentRoute=='user.profile') active @endif">
        <i class="fa-cog"></i>
        Ta的帖子
    </a>
</div>
