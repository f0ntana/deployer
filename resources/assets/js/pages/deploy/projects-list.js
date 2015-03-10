$(document).ready(function () {

    if ($('[data-href]')) {
        $('[data-href]').load($('[data-href]').data('href'), function () {
            $('.list-group.checked-list-box .list-group-item').init();
        });
    }

    $("body").bind("ajaxComplete", function () {
        $(".list-group").listgroup()
    }).bind("ajaxStop", function () {
        $(".list-group").listgroup()
    }).bind("ajaxSuccess", function () {
        $(".list-group").listgroup()
    }).bind("ajaxError", function () {
        $(".list-group").listgroup()
    });
});