<?php

class parteService {
  private $db;
  public $trabajadores;
  public $parte;

  public function __construct(){ 
    require_once "connect_db.php";
    $this->db = new ConnectDB();
  }

  public function addParte($dni, $nombre, $fecha, $causa, $tipo_lesion, $parte_lesion, $gravedad, $causa_baja) {
    
    if($causa_baja === Null){
      $causa_baja = 'No';
    };
    if ($gravedad === NULL){
      echo "Debe selecciona un nivel de gravedad";
    } else {
      $dni = substr($nombre, -9);
      $nombre = substr($nombre, 0, -9);

      $this->db->createConnection();
      $consulta = "INSERT INTO parte (DNI, Fecha_accidente, Persona_accidentada, Causa_accidente, Tipo_lesion, Partes_cuerpo_lesionado, Gravedad, Baja) VALUES ('$dni', '$fecha', '$nombre', '$causa', '$tipo_lesion', '$parte_lesion', '$gravedad', '$causa_baja')";
      $this->db->executeQuery($consulta);
      $this->db->closeConnection();
      echo "Parte creado correctamente.";
    }
  }

  public function searchParte($id_accidente) {
    $this->db->createConnection();
    $consulta = "SELECT * FROM parte WHERE cod_parte=$id_accidente";
    $resultado = $this->db->executeQuery($consulta);
      if ($resultado->num_rows > 0) {
        $this->parte = mysqli_fetch_array( $resultado );
      } else {
        echo "<b>No se ha encontrado ningún parte con ese código identificador<b>";
      }
    $this->db->closeConnection();
  } 

  public function updateParte($id_accidente, $dni, $nombre, $fecha, $causa, $tipo_lesion, $parte_lesion, $gravedad, $causa_baja) {
    if($causa_baja === Null){
      $causa_baja = 'No';
    };
    if ($gravedad === NULL){
      echo "Debe selecciona un nivel de gravedad";
    } else {
      $dni = substr($nombre, -9);
      $nombre = substr($nombre, 0, -9);
      $this->db->createConnection();
      $consulta = "UPDATE parte SET DNI='$dni', Fecha_accidente='$fecha', Persona_accidentada='$nombre', Causa_accidente='$causa', Tipo_lesion='$tipo_lesion', Partes_cuerpo_lesionado='$parte_lesion', Gravedad='$gravedad', Baja='$causa_baja' WHERE cod_parte=$id_accidente";
      $resultado = $this->db->executeQuery($consulta);
      if($resultado){
        if($resultado>0){
          echo "Datos modificados correctamente, parte: " . $id_accidente;
        }
      }else{
        echo "Error ocurrido al modificar datos en el sistema. Contacte con el administrador.";
      }
      $this->db->closeConnection();
    }
  }

  public function deleteParte($id_accidente) {
    $this->db->createConnection();
    $consulta = "DELETE FROM parte WHERE cod_parte=$id_accidente";
    $resultado = $this->db->executeQuery($consulta);
    if($resultado){
      if($resultado>0){
        echo "Datos eliminados correctamente, parte: " . $id_accidente;
      }
    }else{
      echo "Error ocurrido al eliminar datos en el sistema. Contacte con el administrador.";
    }
    $this->db->closeConnection();
  }

  public function selectTrabajadores() {
    $this->db->createConnection();
    $consulta = "SELECT * FROM trabajador";
    $this->trabajadores = $this->db->executeQuery($consulta);
    $this->db->closeConnection();
  }
};

?>