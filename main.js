function validateForm() {
  var name = document.getElementById('name').value;
  if (name == "") {
    document.getElementById('status').innerHTML = "Name cannot be empty";
    return false;
  }
  var email = document.getElementById('email').value;
  if (email == "") {
    document.getElementById('status').innerHTML = "Email cannot be empty";
    return false;
  } else {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (!re.test(email)) {
      document.getElementById('status').innerHTML = "Email format invalid";
      return false;
    }
  }
  var subject = document.getElementById('subject').value;
  if (subject == "") {
    document.getElementById('status').innerHTML = "Subject cannot be empty";
    return false;
  }
  var message = document.getElementById('message').value;
  if (message == "") {
    document.getElementById('status').innerHTML = "Message cannot be empty";
    return false;
  }
  document.getElementById('status').innerHTML = "Enviando...";
  formData = {
    'name': $('input[name=name]').val(),
    'email': $('input[name=email]').val(),
    'subject': $('input[name=subject]').val(),
    'message': $('textarea[name=message]').val()
  };
  $.ajax({
    url: "mail.php",
    type: "POST",
    data: formData,
    success: function (data) {
      document.getElementById('status').innerHTML = "Enviado!"
      $('#contact-form').closest('form').find("input[type=text], textarea").val("");
    },
    error: function (err) {
      $('#status').text(err);
    }
  });
}