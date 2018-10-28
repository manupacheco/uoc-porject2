<?php

class authService {
  private $db;

  public function __construct(){ 
    require_once "connect_db.php";
    $this->db = new ConnectDB();
  }

  public function userIsAuth(){
    if(!isset($_SESSION)){
      session_start();
    }
    if(isset($_SESSION['username'])){
      return true;
    } else {
      return false;
    }
  }

  public function login($username, $password){
    if (!isset($_SESSION)){
      session_start();
    }
    $this->db->createConnection();
    // $username = mysql_real_escape_string($username);
    // $password = mysql_real_escape_string($password);
    $user = $this->db->executeQuery("SELECT * FROM user WHERE username='$username' AND pass='$password'");
    if (!$user){ return false;}
    if ( $user->num_rows > 0 ){
      $_SESSION['username'] = $username;
      return true;
    } else {
      return false;
    }
    $this->db->closeConnection();
  }

  public function logout(){
    if(!isset($_SESSION)){
      session_start();
    };
    unset($_SESSION['username']);
    session_destroy();
    header('Location: ../index.php');
  }
};
?>
