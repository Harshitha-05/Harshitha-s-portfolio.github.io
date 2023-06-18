$(document).ready(function () {
  $('#php-email-form').submit(function (event) {
    event.preventDefault();

    var formData = $(this).serialize();
    $.ajax({
      type: 'POST',
      url: $(this).attr('action'),
      data: formData
    }).done(function (response) {
      console.log(response);
      alert('Message sent!');
    }).fail(function (jqXHR, textStatus, errorThrown) {
      console.error(
        "The following error occurred: " +
        textStatus, errorThrown
      );
    });
  });
});