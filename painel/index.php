<?php
   /* session_start();
    require_once "../config.php";
    if (!isset($_SESSION['user_session']) && !isset($_SESSION['pwd_session'])) {
      echo "<meta http-equiv='refresh' content='0, ../'>";
    }else{*/
?>

<?php
  include "cabecalho.php";
?>


  <div>
      <div class="container">
          <div class="row">
              <div class="col-md-12 d-flex justify-content-center"><img src="../img/bootstrap-solid.svg"></div>
          </div>
      </div>
  </div>
  <div>
      <div class="container">
          <div class="row">
            <div class="d-flex justify-content-center col-md-6 mt-4">
              <a href="cadastro.php" class="btn btn-primary btn-lg p-4" tabindex="-1" role="button" aria-disabled="true">Cadastrar Administrador</a>
            </div>
            <div class="d-flex justify-content-center col-md-6 mt-4">
              <a href="lista_adm.php" class="btn btn-primary btn-lg p-4" tabindex="-1" role="button" aria-disabled="true">Visualizar Administradores</a>
            </div>
            <div class="d-flex justify-content-center col-md-6 mt-4">
              <a href="lista_inscritos.php" class="btn btn-primary btn-lg p-4" tabindex="-1" role="button" aria-disabled="true">Visualizar Inscritos</a>
            </div>
            <div class="d-flex justify-content-center col-md-6 mt-4">
              <a href="#" class="btn btn-primary btn-lg p-4" tabindex="-1" role="button" aria-disabled="true">Visualizar Concursos</a>
            </div>
          </div><!--fim ROW-->
      </div><!--fim CONTAINER-->
  </div>

<?php
  include("../rodape.php");
?>

<?php
//}
?>
