$(document).ready(function () {
    var loader = '<div class="spinner"><div class="rect1"></div><div class="rect2"></div><div class="rect3"></div><div class="rect4"></div><div class="rect5"></div></div>';

    /**
     * Load ajax content in target element data-target
     */
    $(document).on('click', '[data-target]', function (e) {
        $($(this).data('target')).html(loader);
        $($(this).data('target')).load($(this).attr('href'));
        e.preventDefault();
    });

    /**
     * Load ajax content in element data-href
     */
    $('[data-href]').each(function () {
        $(this).html(loader);
        $(this).load($(this).data('href'));
    });

    /**
     * Make checked list-group
     */
    $(document).on('click', '.checked-list-group a', function (e) {
        $('a', $(this).parent('.checked-list-group')).removeClass('active');
        $(this).addClass('active');

        e.preventDefault();
    });

});