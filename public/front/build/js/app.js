/**
 * Created by lvdingtao on 2016/11/12.
 */
$.ajaxSetup({
    headers: { "X-CSRF-TOKEN" : $('meta[name=csrf-token]').attr('content') }
});
;(function( $ ) {

    "use strict";

    //yese class
    var Yese = function(element, options){
        this.$element = $(element);
        this.options  = $.extend({}, Yese.DEFAULTS, options);
        this.id       = this.$element.data('id');
        this.url      = this.$element.data('url');
    };

    //默认选项
    Yese.DEFAULTS = {
        loading: 'loading...'
    };

    Yese.prototype.like = function(){
        var $el = this.$element;
        var url = this.url;
        var id  = this.id;
        $.ajax({
            url:url,
            type:'post',
            data:{article_id:id},
            success:function(res){
                if (res.status==200) {
                    if (res.type=='success'){
                        $el.removeClass('btn-fillet-purple');
                        $el.addClass('btn-purple');
                        $el.find('count').text(parseInt($el.find('count').text())+1);
                    }else if (res.type=='cancel'){
                        $el.removeClass('btn-purple');
                        $el.addClass('btn-fillet-purple');
                        $el.find('count').text(parseInt($el.find('count').text())-1);
                    }
                }

            },
            dataType:'json'
        });
    };

    Yese.prototype.collection = function(){

        var $el = this.$element;
        var url = this.url;
        var id  = this.id;
        $.ajax({
            url:url,
            type:'post',
            data:{article_id:id},
            success:function(res){
                if (res.status==200) {

                    if (res.type=='success'){
                        $el.removeClass('btn-fillet-green');
                        $el.addClass('btn-secondary');
                        $el.find('count').text(parseInt($el.find('count').text())+1);
                    }else if (res.type=='cancel'){
                        $el.removeClass('btn-secondary');
                        $el.addClass('btn-fillet-green');
                        $el.find('count').text(parseInt($el.find('count').text())-1);
                    }
                }
            },
            dataType:'json'
        });

    }

    Yese.prototype.follow = function(){

        var $el = this.$element;
        var url = this.url;
        var author_id = $el.data('author');
        $.ajax({
            url:url,
            type:'post',
            data:{follow_id:author_id},
            success:function(res){
                if (res.status_code==200){
                    if (res.type=='unfollow'){
                        $el.find('span').text('订阅');
                    }else if (res.type=='followed'){
                        $el.find('span').text('取消订阅');
                    }
                }
            },
            dataType:'json'
        });

    }

    Yese.prototype.load_more = function(){

        var $el = this.$element;
        var url = this.$element.data('next');
        $.ajax({
            url:url,
            data:{},
            success:function(res){
                $('.article-list').append(res.data);
                $('button[data-yese=ys-load_more]').data('next',res.next);
                if (res.next==null){
                    $('[data-yese=ys-load_more]').attr('disabled',true).text('没有更多内容了');
                }

            },
            dataType:'json'
        });

    }

    //申请成为作者
    Yese.prototype.apply = function(){

        var $el = this.$element;
        var user_id = $el.data('id');
        var url = $el.data('url');
        $.ajax({
            url:url,
            type:'post',
            data:{user_id:user_id,type:'author'},
            success:function(res){
                if (res.status==200){
                    $el.find('a').text('申请中').attr('disabled',true);
                }
                $el.find('a').text('申请中').attr('disabled',true);
            },
            dataType:'json'
        });

    }

    Yese.prototype.init = function(){

        console.log('call init method');
    };

    //yese plugin definition

    $.fn.yese = function(option) {

        return this.each(function(){

            var $this = $(this);
            //是否初始化
            var data = $this.data('ys.button');

            var options = typeof option == 'object' && option;

            if (!data) $this.data('ys.button',(data = new Yese(this, options)));

            if (typeof option == 'string' ) {

                data[option]();

            } else {

                $.error('method is undefined in yese plugin');

            }
        });

    };

    $.fn.yese.Constructor = Yese;

    //事件代理,智能初始化

    $(document).on('click.ys.btn.data-api', '[data-yese^="ys-"]', function(e){

        var $ele = $(e.target);

        //查找要初始化的对象
        if (!$ele.data('yese')) $ele = $ele.closest('[data-yese^="ys-"]');

        var operation = $ele.data('yese').replace(/^ys-/,'');

        $ele.yese(operation);

        e.preventDefault();
    });


}( jQuery ));

//$('.ys-like').yese('like');
