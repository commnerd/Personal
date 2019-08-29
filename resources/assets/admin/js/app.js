
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$('.quill-editor').each(function() {
    var editor = this;

    var quill = new Quill(editor, {
        theme: 'snow'
    });
});

$("form").on("submit", function () {
    var form = this;
    $('.quill-editor', this).each(function() {
        var editor = this;
        var content = $(editor).html();
        var name = $(editor).prop("data-name");
        $(form).append('<textarea name="'+name+'" style="display:none">'+content+'</textarea>');
   });
});

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
    format: 'M yyyy',
    autoclose: true,
    viewMode: 'months',
    minViewMode: 'months',
    maxViewMode: 'months'
});

$('input[name="active"]').change(function() {
    var val = $(this).val();
    $('form.activate').append('<input type="hidden" name="activate" value="'+val+'" />').submit();
});
