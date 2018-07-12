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
              <div class="col-md-6 d-flex justify-content-center"><button class="botao" type="button">Cadastrar Administrador</button></div>
              <div class="col-md-6 d-flex justify-content-center"><button class="botao" type="button">Visualizar Administradores</button></div>
              <div class="col-md-6 d-flex justify-content-center"><button class="botao" type="button">Visualizar Inscritos</button></div>
              <div class="col-md-6 d-flex justify-content-center"><button class="botao" type="button">Visualizar Concursos</button></div>
          </div>
      </div>
  </div>

<?php
  include("../rodape.php");
?>

<?php
}
?>
