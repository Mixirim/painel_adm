<?php
include ("header.php");
?>

<br/><br/><br/><br/>

<div id="cadastro">
	
	<form class="form-horizontal" method="post" action="?go=cadastrar">
	<h3 class="text-center">Cadastrar Ordem de Serviço</h3>
		<div id="cad_table">
			<div class="form-group">
				<label class="col-md-4 control-label">Cliente:</label>
				<div class="col-md-4">
					<input type="text" name="cliente" id="cliente" class="form-control input-md" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label">Telefone:</label>
				<div class="col-md-4">
					<input type="number" name="telefone" id="telefone" class="form-control input-md" />
				</div>
			</div>
			<div class="form-group">	
				<label class="col-md-4 control-label">Operadora:</label>
				<div class="col-md-4">
				<select id="operadora" name="operadora" class="form-control">
		            <option value="Claro">Claro</option>
		            <option value="Oi">Oi</option>
		            <option value="Tim">Tim</option>
		            <option value="Vivo">Vivo</option>
		            <option value="Fixo">Fixo</option>
		            <option value="Outro">Outro</option>
		          </select>
	          	</div>
          	</div>
			<div class="form-group">
				<label class="col-md-4 control-label">Email:</label>
				<div class="col-md-4">
					<input type="text" name="email" id="email" class="txt form-control input-md" />
				</div>
			</div>
			
			<div class="form-group">
		        <label class="col-md-4 control-label" for="mensagem">Defeito / Obs.</label>
		        <div class="col-md-4">                     
		          <textarea class="form-control" id="mensagem" name="mensagem"></textarea>
		        </div>
	      	</div>
			<div class="form-group">
		        <label class="col-md-4 control-label" for="status">Status do Conserto</label>
		        <div class="col-md-4">                     
		          <textarea class="form-control" id="status" name="status"></textarea>
		        </div>
	      	</div>
	      	<div class="form-group">
				<label class="col-md-4 control-label" for="btn_cadastrar"></label>
		        <div class="col-md-8">
		          <button id="btn_cadastrar" name="btn_cadastrar" class="btn btn-success">Cadastrar</button>
		          <button id="btn_limpar" name="btn_limpar" class="btn btn-danger">Limpar</button>
		        </div>	
			</div>
		</div><!--DIV ID cad_table-->
	</form>
</div>

</body>
</html>

<?php
if(@$_GET['go'] == 'cadastrar'){
	$cliente = $_POST['cliente'];
	$telefone = $_POST['telefone'];
	$operadora = $_POST['operadora'];
	$email = $_POST['email'];
	$mensagem = $_POST['mensagem'];
	$status = $_POST['status'];

	if(empty($cliente)){
		echo "<script>alert('Preencha o campo Cliente'); history.back();</script>";
	}elseif(empty($telefone)){
		echo "<script>alert('Preencha o campo Telefone'); history.back();</script>";
	}elseif(empty($operadora)){
		echo "<script>alert('Selecione a Operadora de telefonia'); history.back();</script>";
	}elseif(empty($email)){
		echo "<script>alert('Preencha o campo E-Mail'); history.back();</script>";
	}elseif(empty($mensagem)){
		echo "<script>alert('Descreva o Defeito e demais observações'); history.back();</script>";
	}else{
		$query1 = mysql_num_rows(mysql_query("SELECT * FROM controle_os WHERE email = '$email'"));
		
		mysql_query("insert into controle_os (cliente, telefone, operadora, email, mensagem, status, data) values ('$cliente','$telefone','$operadora','$email','$mensagem','$status', NOW())");
		echo "<script>alert('Ordem de Serviço cadastrada com sucesso!');</script>";
		echo "<meta http-equiv='refresh' content='0, url=./'>";
	}
}

?>

<?php
	include("footer.php");
?>