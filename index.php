<?php 
  if (isset($_GET['logout'])){
    include_once ('services/auth_service.php');
    $auth_service = new authService();
    $auth_service->logout();
  }
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>El INPRL</title>
  <?php 
    include 'partials/css-imports.php';
  ?>
</head>

<body>
  <?php 
    include 'partials/navbar.php';
  ?>

  <section class="info card card-image mb-3" style="background-image: url(https://images.unsplash.com/photo-1527199768775-bdabf8b32f61?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=7c3d4d6196ff46a8fabff56843392833&auto=format&fit=crop&w=1650&q=80);">
    <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">
      <div class="container info-text align-items-center">
        <h2 class="white-text"><i class="fa fa-pie-chart"></i> INPRL</h2>
        <h3 class="card-title pt-2"><strong>Prevención de riesgos laborales</strong></h3>
        <p>En el trabajo es el conjunto de actividades, medidas adaptadas o previstas en todas las fases
          de actividad de la empresa con el fin de evitar o disminuir las posibilidades de que los trabajadores sufran
          daños
          derivados del trabajo, ya sean estos accidentes, enfermedades, patologías o lesiones. El concepto de
          prevención de
          riesgos laborales ha venido a sustituir en los últimos años al de seguridad e higiene en el trabajo. La
          herramienta
          fundamental en la prevención de riesgos laborales es la evaluación de riesgos, que propondrá, si es
          necesario, unas
          medidas preventivas encaminadas a evitar o disminuir los riesgos en los puestos de trabajo.
          <br><small>Fuente: wikipedia</small></p>
        <a class="btn btn-indigo" href="https://es.wikipedia.org/wiki/Prevenci%C3%B3n_de_riesgos_laborales"><i class="fa fa-info left"></i>
          Más
          información</a>
      </div>
    </div>
  </section>

  <section class="about">
    <div class="container">
      <h2 class="h1-responsive font-weight-bold text-center my-5">Quienes somos</h2>
      <p class="lead black-text text-center w-responsive mx-auto mb-5">El Instituto Nacional de Prevención
        de Riesgos Laborales (INPRL) se encarga de divulgar contenido relacionado con la prevención de riesgos
        laborales. Para ello, en concreto esta aplicación, muestra información sobre prevención de aquellos riesgos
        laborales que puedan surgir trabajando como desarrollador de
        aplicaciones web.</p>
    </div>
  </section>
  <section class="contact">
    <div class="container section">
      <h2 class="h1-responsive font-weight-bold text-center my-5">Contacto</h2>
      <p class="lead grey-text text-center w-responsive mx-auto mb-5">Puede ponerse en contacto para solicitar
        información a través de los canales disponibles.</p>
      <div class="row">
        <div class="col-md-9 mb-md-0 mb-5">
          <form id="contact-form" name="contact-form">
            <div class="row">
              <div class="col-md-6">
                <div class="md-form mb-0">
                  <input type="text" id="name" name="name" class="form-control" require>
                  <label for="name" class="">Nombre</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="md-form mb-0">
                  <input type="text" id="email" name="email" class="form-control">
                  <label for="email" class="">Mail</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="md-form mb-0">
                  <input type="text" id="subject" name="subject" class="form-control">
                  <label for="subject" class="">Asunto</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="md-form mb-5">
                  <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                  <label for="message">Mensaje</label>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-3 text-center">
          <ul class="list-unstyled mb-0">
            <li><i class="fa fa-phone mt-4 fa-2x"></i>
              <p>+ 34 598 56 52</p>
            </li>

            <li><i class="fa fa-envelope mt-4 fa-2x"></i>
              <p>info@inprl.es</p>
            </li>
          </ul>
          <div class="text-center text-md-center">
            <a class="btn btn-indigo" onclick="validateForm()">Enviar</a>
          </div>
          <div id="status"></div>
        </div>
      </div>
    </div>
  </section>
  <section class="where">
    <div class="">
      <h2 class="h1-responsive font-weight-bold text-center my-5">Dónde estamos</h2>
      <p class="lead grey-text text-center w-responsive mx-auto mb-5"><i class="fa fa-map-marker fa-2x"></i> Calle
        Pamplona,
        96, 08018 Barcelona.</p>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2992.9110015845126!2d2.188111315976636!3d41.39773910331528!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a4a31927be4499%3A0x220615c70b8e0cbc!2sCalle+Pamplona%2C+96%2C+08018+Barcelona!5e0!3m2!1ses!2ses!4v1538298401738"
        width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
  </section>

  <?php 
    include 'partials/footer.php';
  ?>
</body>

</html>