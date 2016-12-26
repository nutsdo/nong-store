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
                if (res.status==200) $el.hasClass('is-active') ? $el.removeClass('is-active') : $el.addClass('is-active');
                if (res.type=='success'){
                    $el.find('.count').text(parseInt($el.find('.count').text())+1);
                }else if (res.type=='cancel'){
                    $el.find('.count').text(parseInt($el.find('.count').text())-1);
                }

            },
            dataType:'json'
        });
    };

    Yese.prototype.collection = function(){

        var $el = this.$element;
        var url = this.url;
        $.ajax({
            url:url,
            type:'post',
            data:{},
            success:function(res){
                if (res.status==200) $el.hasClass('is-active') ? $el.removeClass('is-active') : $el.addClass('is-active');
                if (res.type=='success'){
                    $el.find('.count').text(parseInt($el.find('.count').text())+1);
                }else {
                    $el.find('.count').text(parseInt($el.find('.count').text())-1);
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
                        $el.find('.text').text('关注');
                    }else if (res.type=='followed'){
                        $el.find('.text').text('取消关注');
                    }
                }
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
