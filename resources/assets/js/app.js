
/**
 * First we will load all of this project's JavaScript dependencies.
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

if($('.flash-message .alert').length > 0) {
    setTimeout(function() {
        $('.flash-message .alert').fadeOut('slow');
    }, 5000);

    $('html, body').animate({
        scrollTop: $(".form-group.has-error").offset().top
    }, 2000);
}
