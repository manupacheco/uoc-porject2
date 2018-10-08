function validateForm() {
  var name = document.getElementById('name').value;
  if (name == "") {
    document.getElementById('status').className = 'alert-mail';
    document.getElementById('status').innerHTML = "Nombre no puede estar vacío";
    return false;
  }
  var email = document.getElementById('email').value;
  if (email == "") {
    document.getElementById('status').className = 'alert-mail';
    document.getElementById('status').innerHTML = "Mail no puede estar vacío";
    return false;
  } else {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (!re.test(email)) {
      document.getElementById('status').className = 'alert-mail';
      document.getElementById('status').innerHTML = "Formato del mail invalido";
      return false;
    }
  }
  var subject = document.getElementById('subject').value;
  if (subject == "") {
    document.getElementById('status').className = 'alert-mail';
    document.getElementById('status').innerHTML = "Asunto no puede estar vacío";
    return false;
  }
  var message = document.getElementById('message').value;
  if (message == "") {
    document.getElementById('status').className = 'alert-mail';
    document.getElementById('status').innerHTML = "Mensaje no puede estar vacío";
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
    url: "helpers/mail.php",
    type: "POST",
    data: formData,
    success: function (data) {
      document.getElementById('status').className = '';
      document.getElementById('status').innerHTML = "Enviado!"
      $('#contact-form').closest('form').find("input[type=text], textarea").val("");
    },
    error: function (err) {
      document.getElementById('status').className = 'alert-mail';
      document.getElementById('status').innerHTML = err;
    }
  });
}

$(document).ready(function () {
  document.getElementById('datepicker').valueAsDate = new Date();
});