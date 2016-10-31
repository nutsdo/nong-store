<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2016/10/31
 * Time: 下午11:42
 */
?>

{!! Html::script('assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') !!}
{!! Html::script('assets/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js') !!}
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        language:  'zh-CN',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });
</script>
