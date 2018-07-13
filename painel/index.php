<?php
    session_start();
    require_once "../config.php";
    if (!isset($_SESSION['user_session']) && !isset($_SESSION['pwd_session'])) {
      echo "<meta http-equiv='refresh' content='0, ../'>";
    }else{
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
              <div class="col-md-6 d-flex justify-content-center"><a href="cadastro.php" class="botao" role="button">Cadastrar Administrador</a></div>
              <div class="col-md-6 d-flex justify-content-center"><a class="botao" role="button">Visualizar Administradores</a></div>
              <div class="col-md-6 d-flex justify-content-center"><a class="botao" role="button">Visualizar Inscritos</a></div>
              <div class="col-md-6 d-flex justify-content-center"><a class="botao" role="button">Visualizar Concursos</a></div>
          </div>
      </div>
  </div>

<?php
  include("../rodape.php");
?>

<?php
}
?>
