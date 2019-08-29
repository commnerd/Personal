
/**
 * First we will load all of this project's JavaScript dependencies.
 */

require('./bootstrap');

$('.quill-editor').each(function() {
    var editor = this;

    var quill = new Quill(editor, {
        theme: 'snow',
        toolbar: {
          container: [
              ['header'],
              ['bold', 'italic', 'underline', 'link'],
              ['list'],
              ['clean'],
              ['customControl']
          ],
          handlers: {
            'customControl': function() { console.log('customControl was clicked') }
          }
        }
    });

    $(editor).next().val(quill.getText());

    quill.on('text-change', function(delta, oldDelta, source) {
        $(editor).next().val(quill.getText());
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
