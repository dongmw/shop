$(function () {
    FastClick.attach(document.body);
});

$(window).load(function () {
    $("#globalLoading").hide();
    $("#wrapper").show();
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});