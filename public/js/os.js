$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

(function ($) {
    'use strict';

    $(document).ready(function () {
        NProgress.start();
    });


    $(window).on('load', function() {
        NProgress.done();
    });


    $(function () {
        var $fullText = $('.admin-fullText');
        $('#admin-fullscreen').on('click', function () {
            $.AMUI.fullscreen.toggle();
        });

        $(document).on($.AMUI.fullscreen.raw.fullscreenchange, function () {
            $fullText.text($.AMUI.fullscreen.isFullscreen ? '退出全屏' : '开启全屏');
        });
    });

    //切换栏目
    $("#change_system").change(function () {
        var url = $(this).val();
        location.href = url;
    })

    //全选
    $("#checked").click(function () {
        $('.checked_id').prop("checked", this.checked);
    });
})(jQuery);