<nav class="navbar navbar-expand-lg navbar-dark elegant-color fixed-top scrolling-navbar">
  <div class="container">
    <i class="fa fa-pie-chart white-text"> </i><a class="navbar-brand" href="/"> INPRL</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse nav-main" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="/">El INPRL</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/info_riesgos.php">Información sobre riesgos</a>
        </li>
        <?php
          include_once ('services/auth_service.php');
          $auth_service = new authService();
          if($auth_service->userIsAuth()){
        ?>
          <li class="nav-item">
            <a class="nav-link" href="/nuevo_parte.php">Nuevo parte</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/modificar_parte.php">Modificar parte</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/consulta_parte.php">Consultar parte</a>
          </li>
        <?php   
          }
        ?>
      </ul>
      <?php
        if($auth_service->userIsAuth()){
      ?>
        <a href='index.php?logout=true' class="nav-link btn-light" name="logout">LOGOUT</a>
      <?php 
        } else {
      ?>
      <a href="" class="nav-link btn-light" data-toggle="modal" data-target="#modalLoginForm">LOGIN</a>
      <?php 
        };
      ?>
    </div>
  </div>
</nav>
<?php
include 'login.php'
?>