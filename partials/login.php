
<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Acceso</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="partials/login.php">
            <div class="modal-body mx-3">
                <div class="md-form mb-5">
                    <i class="fa fa-envelope prefix grey-text"></i>
                    <input type="email" id="username" name="username" class="form-control validate">
                    <label data-error="wrong" data-success="right" for="defaultForm-email">Usuario</label>
                </div>

                <div class="md-form mb-4">
                    <i class="fa fa-lock prefix grey-text"></i>
                    <input type="password" id="password" name="password" class="form-control validate">
                    <label data-error="wrong" data-success="right" for="defaultForm-pass">Contraseña</label>
                </div>
                <span class="test-user">Usuario de test: <b>manu@manu.es</b>  |  contaseña: <b>123</b></span>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="submit" name="login" class="btn btn-indigo">Login</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php
  include_once ('../services/auth_service.php');
  $auth_service = new authService();

  if(isset($_POST["login"])) {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
      if ($auth_service->login($_POST['username'], $_POST['password'])) {
        header('Location: ../consulta_parte.php');
      } else {
        header('Location: ../index.php?errorlogin=true');
      } 
    } else {
      header('Location: ../index.php?errorlogin=true');
    }
  };
?>