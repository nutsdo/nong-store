/**
 * Created by lvdingtao on 2016/11/12.
 */

;(function( $ ) {

    "use strict";

    //yese class
    var Yese = function(element, options){
        this.$element = $(element);
        this.options  = $.extend({}, Yese.DEFAULTS, options);
    };

    //默认选项
    Yese.DEFAULTS = {
        loading: 'loading...'
    };

    Yese.prototype.like = function(){
        console.log('do like');
    };

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
