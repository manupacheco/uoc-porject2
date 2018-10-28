<?php
  include_once ('services/auth_service.php');
  $auth_service = new authService();
  if(!($auth_service->userIsAuth())){
    header('Location: index.php');
  }
?>