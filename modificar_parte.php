<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>El INPRL - Modificar parte</title>
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
        <h2 class="card-title pt-2"><strong>MODIFICAR PARTE</strong></h2>
        <p></p>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <form action="" method="GET">
          <div class="column">
            <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6">
                <div class="md-form">
                  <input type="text" id="id_accidente" name="id_accidente" class="form-control" required>
                  <label for="id_accidente" class="">Código identificador del accidente</label>
                </div>
              </div>
             </div>
            <div class="text-md-center">
              <input class="btn btn-indigo text-center text-md-center" type="submit" name="buscar" value="BUSCAR PARTE"/>
            </div>
          </div>
        </form>
      </div>
    </div>

    <?php
      if(isset($_POST["modificar"])) {
    ?>
    <br>
    <div class="row">
      <div class="col-md-2"></div>
        <div class="alert alert-primary alert-dismissible fade show col-md-8" role="alert">
          <?php 
            $parte_service->updateParte($_POST['cod_parte'], $_POST['dni'],$_POST['nombre'], $_POST['fecha'], $_POST['causa'], $_POST['tipo_lesion'], $_POST['parte_lesion'], $_POST['gravedad'], $_POST['causa_baja']);
          ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    </div>
    <?php   
      }
      if(isset($_POST["eliminar"])) {
    ?>
    <br>
    <div class="row">
      <div class="col-md-2"></div>
        <div class="alert alert-primary alert-dismissible fade show col-md-8" role="alert">
          <?php 
            $parte_service->deleteParte($_POST['cod_parte']);
          ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    </div>
    <?php   
      }
    if(isset($_GET["buscar"])) {
    ?>  
      <hr/>
      <div class="row message">
          <?php 
            $parte_service->searchParte($_GET['id_accidente']);
            $parte_service->selectTrabajadores();
          ?>
      </div>
      <?php
      if($parte_service->parte){
      ?>
      <section class="section info container">
        <div class="row">
          <div class="col-md-2"></div>
            <div class="col-md-8 mb-md-0 mb-5">
                <form id="parte-form" name="parte-form" action="modificar_parte.php" method="POST"> 
                    <div class="row">
                        <div class="col-md-4">
                          <div class="trabajador">
                            <label class="">Código identificador del accidente</label>
                            <input type="text" id="cod_parte" name="cod_parte" class="form-control disabled" value=<?php echo $parte_service->parte['cod_parte'] ?>>
                          </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-4">
                          <div class="md-form label-date">
                            <label>Fecha del accidente</label>
                            <input placeholder="Seleccionar fecha" type="date" name="fecha" class="form-control datepicker" value=<?php echo $parte_service->parte['Fecha_accidente'] ?> required>
                          </div>
                        </div>
                        <div class="col-md-8 trabajador">
                            <label for="nombre">Trabajador</label>
                            <select class="md-form form-control" id="nombre" name="nombre" required>
                                <option value="" disabled selected>Selecciona un trabajador...</option>
                                <?php
                                  while ($columna = mysqli_fetch_array( $parte_service->trabajadores ))
                                  {
                                    $selected = '';
                                    if($columna['DNI'] === $parte_service->parte['DNI']){
                                      $selected = 'selected';
                                    };
                                    echo "<option value='" . $columna['nombre'] . $columna['DNI'] ."'" . $selected . ">";
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
                                <textarea type="text" id="causa" name="causa" rows="2" class="form-control md-textarea" required><?php echo $parte_service->parte['Causa_accidente'] ?></textarea>
                                <label for="causa" class="">Causa o tipología del accidente</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <input type="text" id="tipo_lesion" name="tipo_lesion" class="form-control" value=<?php echo $parte_service->parte['Tipo_lesion'] ?> required>
                                <label for="tipo_lesion" class="">Tipo o naturaleza de la lesión</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <input type="text" id="parte_lesion" name="parte_lesion" class="form-control" value=<?php echo $parte_service->parte['Partes_cuerpo_lesionado'] ?> required>
                                <label for="parte_lesion" class="">Parte del cuerpo lesionada</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 checks">
                        <span>Gravedad </span>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="baja" name="gravedad" value="Baja" <?php if($parte_service->parte['Gravedad']==='Baja'){echo 'checked';} ?>>
                          <label class="custom-control-label" for="baja">Baja</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="normal" name="gravedad" value="Normal" <?php if($parte_service->parte['Gravedad']==='Normal'){echo 'checked';} ?>>
                          <label class="custom-control-label" for="normal">Normal</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="alta" name="gravedad" value="Alta" <?php if($parte_service->parte['Gravedad']==='Alta'){echo 'checked';} ?>>
                          <label class="custom-control-label" for="alta">Alta</label>
                        </div>
                      </div>
                      <div class="col-md-6 checks">
                        <span>¿Ha causado baja? </span>
                        <label class="bs-switch">
                          <input type="checkbox" id="causa_baja" name="causa_baja" value="Si" <?php if($parte_service->parte['Baja']==='Si'){echo 'checked';} ?>>
                          <span class="slider round"></span>
                        </label>
                      </div>
                    </div>
                    <div class="text-md-center">
                      <input class="btn btn-indigo text-center text-md-center" type="submit" name="modificar" value="MODIFICAR"/>
                      <input class="btn btn-danger text-center text-md-center" type="submit" name="eliminar" value="ELIMINAR"/>
                    </div>
                    <br><br>
                </form>
                <div id="status"></div>
            </div>
        </div>
      </section>
      <?php 
      };
    }; 
    ?>
  </div>

  <?php 
    include 'partials/footer.php';
  ?>
</body>
</html>