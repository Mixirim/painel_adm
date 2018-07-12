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


  

  <h1>Logado</h1>
  <p><a href="../index.php">Voltar para a página Inicial</a></p>



<!--a tag BODY fecha no arquivo rodape.php-->


<?php
  include "../rodape.php";
?>

<?php
	if (@$_GET['go'] == 'sair') 
	{
		unset($_SESSION['email_session']);
		unset($_SESSION['pwd_session']);
		echo "<meta http-equiv='refresh' content='0,URL=../index.php'>";
	}
?>

<?php
}
?>