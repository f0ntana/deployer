$(document).ready(function () {

    $(document).on('submit', '.delete-record', function () {
        if (!confirm('Esta operação irá remover este registro.\n\nDeseja prosseguir?')) {
            return false;
        }

        return true;
    });

});