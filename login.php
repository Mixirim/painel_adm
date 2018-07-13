<?php
session_start();
require_once "config.php";
if (!isset($_SESSION['user_session']) && !isset($_SESSION['pwd_session'])) {
?>

<?php
  include "cabecalho.php";
?>

  <div class="text-center">
    <form method="post" action="?go=logar" class="form-signin">
      <img class="mb-4" src="img/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Entrar</h1>
      <p>Entre com seus dados conforme solicitado abaixo</p>
      <label for="inputEmail" class="sr-only">Email</label>
      <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Senha</label>
      <input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Password" required>
      
      <button class="btn btn-lg btn-primary btn-block" type="submit" id="btnEntrar">Entrar</button>
    </form>
    <p><a href="cadastro.php">Clique aqui para se cadastrar</a></p>
  </div>

<?php
  include "rodape.php";
?>

<?php
  }else{
    echo "<meta http-equiv='refresh' content='0, ./logado/'>";
  }
?>

<?php
if(@$_GET['go'] == 'logar'){
  $email = $_POST['email'];
  $pwd = $_POST['senha'];

  if(empty($email)){
    echo "<script>alert('Preencha todos os campos para logar-se.'); history.back();</script>";
  }elseif(empty($pwd)){
    echo "<script>alert('Preencha todos os campos para logar-se.'); history.back();</script>";
  }else{
    $query1 = mysql_num_rows(mysql_query("SELECT * FROM usuario WHERE email = '$email' AND senha = '$pwd'"));
    if($query1 == 1){
      $_SESSION['email_session'] = $email;
      $_SESSION['pwd_session'] = $pwd;
      echo "<script>alert('Usuário logado com sucesso.');</script>"; 
      echo "<meta http-equiv='refresh' content='0, url=./logado/'>";
    }else{
      echo "<script>alert('Usuário e senha não correspondem.');</script>";
      echo "<meta http-equiv='refresh' content='0, url=./'>";
    }
  }
}

?>