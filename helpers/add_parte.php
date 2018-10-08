<?php
  if(isset( $_POST['nombre']))
    $nombre = $_POST['nombre'];
  if(isset( $_POST['fecha']))
    $fecha = $_POST['fecha'];
  if(isset( $_POST['causa']))
    $causa = $_POST['causa'];
  if(isset( $_POST['tipo_lesion']))
    $tipo_lesion = $_POST['tipo_lesion'];
  if(isset( $_POST['parte_lesion']))
    $parte_lesion = $_POST['parte_lesion'];
  if(isset( $_POST['gravedad']))
    $gravedad = $_POST['gravedad'];
  if(isset( $_POST['causa_baja']))
    $causa_baja = $_POST['causa_baja'];

  if($causa_baja === Null){
    $causa_baja = 'No';
  };

  if ($gravedad === NULL){
    echo "Debe selecciona un nivel de gravedad";
  } else {
    $dni = substr($nombre, -9);
    $nombre = substr($nombre, 0, -9);

    $user = "kaf973v6aw57qimb";
    $password = "ya08nw15qbx811el";
    $server = "vlvlnl1grfzh34vj.chr7pe7iynqr.eu-west-1.rds.amazonaws.com";
    $db = "aww4ukatfyp42dxq";
    
    $conexion = mysqli_connect( $server, $user, $password ) or die ("Ha habido un problema con el servidor, intentelo más tarde");
    $db = mysqli_select_db( $conexion, $db ) or die ( "Ha habido un problema con la base de datos, intentelo más tarde" );

    $consulta = "INSERT INTO parte (DNI, Fecha_accidente, Persona_accidentada, Causa_accidente, Tipo_lesion, Partes_cuerpo_lesionado, Gravedad, Baja) VALUES ('$dni', '$fecha', '$nombre', '$causa', '$tipo_lesion', '$parte_lesion', '$gravedad', '$causa_baja')";
    $resultado = mysqli_query( $conexion, $consulta ) or die ( "Ha habido un problema con la conexón, intentelo más tarde");
    mysqli_close( $conexion );
    echo "Parte creado correctamente.";
  }
?>