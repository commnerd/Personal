
/**
 * First we will load all of this project's JavaScript dependencies.
 */

require('./bootstrap');

var quill = new Quill('.quill-editor', {
    theme: 'snow'
})
.format({ height: '700px' })
.on('text-change', function(delta, oldDelta, source) {
    $(source).next().val($(source).val())
});

if($('.flash-message .alert').length > 0) {
    setTimeout(function() {
        $('.flash-message .alert').fadeOut('slow');
    }, 5000);

    $('html, body').animate({
        scrollTop: $(".form-group.has-error").offset().top
    }, 2000);
}
