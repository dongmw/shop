/*
 省市区三级联动
 http://www.whphp.com
 长乐未央 版权所有
 */

var $pca = $("#pca");
var _this = $("#city");
var city_json;
var prov_index;
var city_index;

//选择城市
var cityStart = function () {
    var html = '';
    html += '<ul class="ui-list ui-list-bordered" id="city">';

    $.each(city_json.citylist[prov_index].c, function (i, city) {
        html += '<li class="ui-list-item">' + city.n + '</li>';
    });

    html += '</ul>';

    _this.html(html);
};

//选择区域
var areaStart = function () {
    var html = '';
    html += '<ul class="ui-list ui-list-bordered" id="area">';

    $.each(city_json.citylist[prov_index].c[city_index].a, function (i, area) {
        html += '<li class="ui-list-item">' + area.s + '</li>';
    });

    html += '</ul>';
    _this.html(html);
};

//取得省列表
var init = function () {
    var val = '';

    var html = '';
    html += '<ul class="ui-list ui-list-bordered" id="prov">';

    $.each(city_json.citylist, function (i, prov) {
        html += '<li class="ui-list-item">' + prov.p + '</li>';
    });

    html += '</ul>';
    _this.html(html);

    // 选择省份的事件
    _this.on("click", "#prov li", function () {
        //将省的索引值,传给cityStart
        prov_index = $(this).index();
        val += $(this).text() + " ";
        cityStart();
    });

    // 选择城市的事件
    _this.on("click", "#city li", function () {
        city_index = $(this).index();
        val += $(this).text() + " ";
        areaStart();
    });

    _this.on("click", "#area li", function () {
        val += $(this).text();
        $('.ui-mask').hide();
        $('.ui-pop').hide();
        $pca.val(val);
    });
}


//初始化, 读取省市区列表
$.getJSON('/wechat/js/city.min.js', function (json) {
    city_json = json;
});

$pca.click(function (e) {
    $('.ui-mask').show();
    $('.ui-pop').show();
    init();
});


$(".ui-pop-close").click(function () {
    $('.ui-mask').hide();
    $('.ui-pop').hide();
})