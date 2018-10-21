<?php

  class ConnectDB{
    private $user = "kaf973v6aw57qimb";
    private $password = "ya08nw15qbx811el";
    private $server = "vlvlnl1grfzh34vj.chr7pe7iynqr.eu-west-1.rds.amazonaws.com";
    private $db = "aww4ukatfyp42dxq";
    private $conn;
    
	  public function createConnection(){
    $this->conn = new mysqli($this->server, $this->user, $this->password, $this->db);
      if($this->conn->connect_errno) {
        exit ("Error al conectarse a MySQL: (" . $this->conn->connect_errno . ")");
      }
    }
  
    public function closeConnection(){
      $this->conn->close();
    }

    public function executeQuery($sql){
      $result = $this->conn->query($sql);
      return $result;
    }
  }
?>