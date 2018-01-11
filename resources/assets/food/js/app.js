
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$('a[href="#delete"]').click(function() {
    var form = $(this).parent();
    $('.modal').modal('show');
    $('.modal .btn-danger').click(function() {
        $(form).submit();
    });
    return false;
});
