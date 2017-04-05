//使用ckfinder上传
$("#ck_thumb_upload").click(function () {
    CKFinder.modal({
        chooseFiles: true,
        language: 'zh-cn',
        onInit: function (finder) {
            finder.on('files:choose', function (evt) {
                var url = evt.data.files.first().getUrl();
                $("input[name='thumb']").val(url);
                $("#img_show").attr('src', url);
            });

            finder.on('file:choose:resizedImage', function (evt) {
                var url = evt.data.resizedUrl;
                $("input[name='thumb']").val(url);
                $("#img_show").attr('src', url);
            });
        }
    });
});