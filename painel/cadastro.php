<?php
//require_once "config.php";
include ("cabecalho.php");
?>

<br/><br/><br/><br/>
<div id="cadastro">
	<form class="form-horizontal" method="post" action="?go=cadastrar">
	<h3 class="text-center">Cadastrar Administrador do Sistema</h3>
		<div id="cad_table">
			<div class="form-group">
				<label class="col-md-4 control-label">Nome:</label>
				<div class="col-md-4">
					<input type="text" name="nome" id="nome" class="form-control input-md" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label">Email:</label>
				<div class="col-md-4">
					<input type="email" name="email" id="email" class="form-control input-md" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label">Senha:</label>
				<div class="col-md-4">
					<input type="password" name="senha" id="senha" class="form-control input-md" maxlength="15" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="btn_cad"></label>
		        <div class="col-md-8">
					<button id="btnCad" name="btn_cadastrar" class="btn btn-success">Cadastrar</button>
		          	<button id="btnLimpar" name="btn_limpar" class="btn btn-danger">Limpar</button>
					<!--<input type="submit" value="Cadastrar" id="btnCad"> 
					<a href="./"><input type="button" value="Cancelar" class="btn" id="btnCancelar"></a>-->
				</div>
			</div>
		</div>
	</form>
</div>

</body>
</html>

<?php
if(@$_GET['go'] == 'cadastrar'){
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	//$user = $_POST['usuario'];
	$pwd = $_POST['senha'];

	if(empty($nome)){
		echo "<script>alert('O preenchimento do campo NOME é obrigatório.'); history.back();</script>";
	}elseif(empty($email)){
		echo "<script>alert('O preenchimento do campo E-MAIL é obrigatório..'); history.back();</script>";
	//}elseif(empty($user)){
		//echo "<script>alert('Preencha todos os campos para se cadastrar.'); history.back();</script>";
	}elseif(empty($pwd)){
		echo "<script>alert('O preenchimento do campo SENHA é obrigatório..'); history.back();</script>";
	}else{
		$query1 = mysql_num_rows(mysql_query("SELECT * FROM adm WHERE email = '$email'"));
		if($query1 == 1){
			echo "<script>alert('Este e-mail já está cadastrado.'); history.back();</script>"; 
		}else{
			mysql_query("insert into adm (nome, email, senha, data) values ('$nome','$email','$pwd', NOW())");
			echo "<script>alert('Usuário cadastrado com sucesso.');</script>";
			echo "<meta http-equiv='refresh' content='0, url=./'>";
		}
	}
}

?>

<?php
	include ("footer.php");
?>