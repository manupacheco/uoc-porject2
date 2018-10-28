<?php
  include_once ('helpers/is_auth.php');
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>El INPRL - Consultar parte</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php 
    include 'partials/css-imports.php';
  ?>
</head>
<body>
  <?php
    include 'partials/navbar.php';
    require_once ('services/parte_service.php');
    $parte_service = new parteService();
  ?>

  <div class="info card card-image mb-3" style="background-image: url(https://images.unsplash.com/photo-1521540124319-66c09f0d5999?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=de1ecb553b42a0e7c749445672db4cf2&auto=format&fit=crop&w=1283&q=80);">
    <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">
      <div class="container info-text align-items-center">
        <h2 class="card-title pt-2"><strong>CONSULTAR PARTE</strong></h2>
        <p></p>
      </div>
    </div>
  </div>
  
    <?php
      if(isset($_GET["buscar"])) {
    ?>
    <br>
    <div class="text-md-center">
      <?php 
        $parte_service->consultarPartes($_GET['cod_parte'],$_GET['nombre'],$_GET['fecha'], $_GET['causa'], $_GET['tipo_lesion'], $_GET['parte_lesion'], $_GET['gravedad'], $_GET['causa_baja']);
      ?><br>
      <a class="btn btn-indigo text-center text-md-center" href="/consulta_parte.php">NUEVA BÚSQUEDA</a>
    </div>

    <div class="table-margins">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Código</th>
            <th scope="col">Fecha</th>
            <th scope="col">Nombre</th>
            <th scope="col">Causa</th>
            <th scope="col">Tipo lesion</th>
            <th scope="col">Parte cuerpo lesionada</th>
            <th scope="col">Gravedad</th>
            <th scope="col">Causa baja</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          while ($parte_fila = mysqli_fetch_array($parte_service->partes)){
            echo "<tr>";
            echo "<th scope='row'>". $parte_fila['cod_parte'] ."</th>";
            echo "<td>". $parte_fila['Fecha_accidente'] ."</td>";
            echo "<td>". $parte_fila['Persona_accidentada'] ."</td>";
            echo "<td>". $parte_fila['Causa_accidente'] ."</td>";
            echo "<td>". $parte_fila['Tipo_lesion'] ."</td>";
            echo "<td>". $parte_fila['Partes_cuerpo_lesionado'] ."</td>";
            echo "<td>". $parte_fila['Gravedad'] ."</td>";
            echo "<td>". $parte_fila['Baja'] ."</td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
      <br><br>
    </div>
    <?php   
      } else {
    ?>
    <section class="section info container">
      <div class="row">
        <div class="col-md-2"></div>
          <div class="col-md-8 mb-md-0 mb-5">
              <form id="parte-form" name="parte-form" action="consulta_parte.php" method="GET"> 
                  <div class="row">                   
                      <div class="col-md-6">
                        <div class="md-form mb-0">
                          <input type="number" id="cod_parte" name="cod_parte" class="form-control">
                          <label for="cod_parte" class="">Código identificador del accidente</label>
                        </div>
                      </div>
                      <div class="col-md-2"></div>
                      <div class="col-md-4">
                        <div class="md-form label-date">
                          <label>Fecha del accidente</label>
                          <input placeholder="Seleccionar fecha" type="date" name="fecha" class="form-control datepicker">
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="md-form mb-0">
                        <input type="text" id="nombre" name="nombre" class="form-control">
                        <label for="nombre" class="">Nombre del trabajador</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="md-form mb-0">
                        <input type="text" id="causa" name="causa" class="form-control">
                        <label for="causa" class="">Causa o tipología del accidente</label>
                      </div>
                    </div>
                  </div><br>
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
                    <input class="btn btn-indigo text-center text-md-center" type="submit" name="buscar" value="BUSCAR"/>
                  </div>
                  <br><br>
              </form>
              <div id="status"></div>
          </div>
      </div>
    </section>
    <?php  
      }
    ?>
  <?php 
    include 'partials/footer.php';
  ?>
</body>
</html>