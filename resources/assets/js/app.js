
/**
 * First we will load all of this project's JavaScript dependencies.
 */

require('./bootstrap');

if($('.flash-message .alert').length > 0) {
    setTimeout(function() {
        $('.flash-message .alert').fadeOut('slow');
    }, 5000);

    $('html, body').animate({
        scrollTop: $(".form-group.has-error").offset().top
    }, 2000);
}
