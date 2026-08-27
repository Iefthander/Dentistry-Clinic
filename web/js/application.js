$(function () {

    $('#id-pjax-account-index').on('click', '.btn-delete', function (event) {
        event.preventDefault();
        $('#id-active-form-account-index').attr('action', $(this).attr('href'));
        $('#id-modal-account').modal('show');
    });

    $('#id-pjax-account-view').on('click', '.btn-delete', function (event) {
        event.preventDefault();
        $('#id-active-form-account-index').attr('action', $(this).attr('href'));
        $('#id-modal-account').modal('show');
    });

    $(document).on('click', '.btn-close-account', function (event) {
        event.preventDefault();
        $('#id-modal-account').modal('hide');
    });

    $('#id-pjax-admin-index').on('click', '.btn-apply', function (event) {
        event.preventDefault();
        $('#id-active-form-admin-apply').attr('action', $(this).attr('href'));
        $('#id-modal-admin-apply').modal('show');
    });

    $(document).on('click', '.btn-close-apply', function (event) {
        event.preventDefault();
        $('#id-modal-admin-apply').modal('hide');
    });

    $('#id-pjax-admin-index').on('click', '.btn-deny', function (event) {
        event.preventDefault();
        $('#id-active-form-admin-deny').attr('action', $(this).attr('href'));
        $('#id-modal-admin-deny').modal('show');
    });

    $(document).on('click', '.btn-close-deny', function (event) {
        event.preventDefault();
        $('#id-modal-admin-deny').modal('hide');
    });

    var $totop = $('#dc-totop');
    $(window).on('scroll', function () {
        $totop.toggleClass('show', $(window).scrollTop() > 400);
    });
    $totop.on('click', function () {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

});
