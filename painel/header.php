<?php
	session_start();
require_once "../config.php";
?>


<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Sistema Soluções em Informática</title>

		<!-- Bootstrap core CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="admin.css" rel="stylesheet">
		<link href="../css/login.css" rel="stylesheet">

		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">


		<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
		<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
		<script src="../js/ie-emulation-modes-warning.js"></script>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>

		<!-- Fixed navbar -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Menu</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php"><img src="../img/sistema_logo.png" width="150"></a>
				</div>
				<div id="navbar" class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li><a href="cadastro_os.php">Cadastra OS</a></li>
						<li><a href="lista_os.php">Visualiza OS</a></li>
						<li><a href="cadastro.php">Cadastra Administrador</a></li>
						<li><a href="lista_adm.php">Visualiza Administradores</a></li>
						<!-- Button trigger modal -->
						<li><a href="#" type="button" data-toggle="modal" data-target="#ModalSair">
						  Sair
						</a></li>

						<!-- Modal -->
						<div class="modal fade" id="ModalSair" tabindex="1" role="dialog" aria-labelledby="myModalLabel">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title" id="myModalLabel">Mensagem de Confirmação</h4>
						      </div>
						      <div class="modal-body">
						        Tem certeza que deseja Sair?
						      </div>
						      <div class="modal-footer">
						        <a href="#" type="button" class="btn btn-default" data-dismiss="modal">Fechar</a>
						        <a href="?go=sair" type="button" class="btn btn-primary">Sair</a>
						      </div>
						    </div>
						  </div>
						</div><!--FIM do Modal Sair-->
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</nav>




<?php
	if (@$_GET['go'] == 'sair') 
	{
		//if (!isset($_SESSION['email_session']) && !isset($_SESSION['pwd_session'])) 
		//{
			//echo "<meta http-equiv='refresh' content='0, ../index.php'>";
		//}else{
			unset($_SESSION['email_session']);
			unset($_SESSION['pwd_session']);
			echo "<meta http-equiv='refresh' content='0,URL=index.php'>";
			
		//}
	}
?>
