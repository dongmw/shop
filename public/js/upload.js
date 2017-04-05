//文件上传
var opts = {
    url: "/admin/upload",
    type: "POST",
    beforeSend: function () {
        $("#loading").attr("class", "am-icon-spinner am-icon-pulse");
    },
    success: function (result, status, xhr) {
        if (result.status == "0") {
            alert(result.msg);
            $("#loading").attr("class", "am-icon-cloud-upload");
            return false;
        }

        $("input[name='image_id']").val(result.image_id);
        $("#img_show").attr('src', result.medium);
        $("#loading").attr("class", "am-icon-cloud-upload");
    },
    error: function (result, status, errorThrown) {
        alert('文件上传失败');
    }
}


$('#image_upload').fileUpload(opts);



