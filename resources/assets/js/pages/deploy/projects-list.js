$(document).ready(function () {

    if ($('[data-href]')) {
        $('[data-href]').load($('[data-href]').data('href'), function () {
            $('.list-group.checked-list-box .list-group-item').init();
        });
    }

    if ($('[data-target]')) {
        $(document).on('click', '[data-target]', function (e) {
            $($(this).data('target')).load($(this).attr('href'));
            e.preventDefault();
        });
    }

    $('document').on('click', '.load-branches', function (e) {
        e.preventDefault();

        alert('AQUI');
    });

});