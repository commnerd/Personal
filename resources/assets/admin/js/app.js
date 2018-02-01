
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$('a[href="#delete"]').click(function() {
    var action = $(this).attr('delete_action');
    $('.modal').modal('show');
    $('.modal form').attr('action', action);
    $('.modal .btn-danger').click(function() {
        $(this).parent().submit();
    });
    return false;
});

$('.month-picker').datepicker({
    format: 'mm/yyyy',
    autoclose: true,
    viewMode: 'months',
    minViewMode: 'months',
    maxViewMode: 'months'
});
