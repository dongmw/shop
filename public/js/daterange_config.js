$(function () {
    //时间插件
    $('#created_at').daterangepicker({
        "autoUpdateInput": false,
        "autoApply": true,
        "locale": {
            "format": "YYYY-MM-DD",
            "applyLabel": "确定",
            "cancelLabel": "取消"
        }
    }, function (start, end, label) {
        this.element[0].value = start.format('YYYY-MM-DD') + ' ~ ' + end.format('YYYY-MM-DD');
    });
});