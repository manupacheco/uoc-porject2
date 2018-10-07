<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>El INPRL - Nuevo parte</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php 
    include 'partials/css-imports.php';
  ?>
</head>
<body>
  <?php
    include 'partials/navbar.php';
    include 'helpers/select_trabajadores.php';
  ?>

    <div class="info card card-image mb-3" style="background-image: url(https://images.unsplash.com/photo-1521540124319-66c09f0d5999?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=de1ecb553b42a0e7c749445672db4cf2&auto=format&fit=crop&w=1283&q=80);">
      <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">
        <div class="container info-text align-items-center">
          <h2 class="card-title pt-2"><strong>Nuevo Parte</strong></h2>
          <p>Información sobre los riesgos laborales que una persona que trabaje como desarrollador web pueda llegar a
            sufrir en su puesto de trabajo y su prevención.</p>
        </div>
      </div>
    </div>

  <section class="section info container">
      <div class="row">
        <div class="col-md-2"></div>
          <div class="col-md-8 mb-md-0 mb-5">
              <form id="parte-form" name="parte-form" action="helpers/add_parte.php" method="POST">
                  <div class="row">
                      <div class="col-md-4">
                        <div class="md-form">
                          <input placeholder="Seleccionar fecha" type="date" id="datepicker" name="fecha" class="form-control datepicker">
                        </div>
                      </div>
                      <div class="col-md-8">
                          <label for="nombre">Trabajdor</label>
                          <select class="md-form form-control" id="nombre" name="nombre" required>
                              <option value="" disabled selected>Selecciona un trabajador...</option>
                              <?php
                                while ($columna = mysqli_fetch_array( $resultado ))
                                {
                                  echo "<option value='" . $columna['nombre'] . $columna['DNI'] ."'>";
                                  echo $columna['nombre'];
                                  echo "</option>";
                                }
                              ?>
                          </select>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                          <div class="md-form">
                              <textarea type="text" id="causa" name="causa" rows="2" class="form-control md-textarea"></textarea>
                              <label for="causa" class="">Causa o tipología del accidente</label>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                          <div class="md-form mb-0">
                              <input type="text" id="tipo_lesion" name="tipo_lesion" class="form-control">
                              <label for="tipo_lesion" class="">Tipo o naturaleza de la lesión</label>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="md-form mb-0">
                              <input type="text" id="parte_lesion" name="parte_lesion" class="form-control">
                              <label for="parte_lesion" class="">Parte del cuerpo lesionada</label>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 checks">
                      <span>Gravedad </span>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="baja" name="gravedad" value="Baja">
                        <label class="custom-control-label" for="baja">Baja</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="normal" name="gravedad" value="Normal">
                        <label class="custom-control-label" for="normal">Normal</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="alta" name="gravedad" value="Alta">
                        <label class="custom-control-label" for="alta">Alta</label>
                      </div>
                    </div>
                    <div class="col-md-6 checks">
                      <span>¿Ha causado baja? </span>
                      <label class="bs-switch">
                        <input type="checkbox" id="causa_baja" name="causa_baja" value="Si">
                        <span class="slider round"></span>
                      </label>
                    </div>
                  </div>
                  <div class="text-md-center">
                    <input class="btn btn-indigo text-center text-md-center" type="submit" value="NUEVO PARTE"/>
                  </div>
              </form>
              <div id="status"></div>
          </div>
      </div>
  </section>

  <?php 
    include 'partials/footer.php';
  ?>
</body>
</html>