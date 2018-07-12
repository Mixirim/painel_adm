<?php
	include ("header.php");
?>

<!-- Begin page content -->
		
		<div class="container"><br/><br/><br/>
			<h3>Listagem de O.S.</h3>
			<!-- Painel -->
			
			<div class="row">

			<?php

				if (isset($_GET["id_excluir"]))
				{
					$num_os=$_GET["id_excluir"];
					
					$query = "DELETE FROM controle_os WHERE num_os='$num_os'";
					
					mysql_query($query,$con);
				}
					
				

					
				
			?>

			<?php

			//if (isset($_GET["id_atualiza"]))
				//{
					//$query = "SELECT * FROM controle_os";
					//$resultado = mysql_query($query, $con);

				////

				//$linha = mysql_fetch_array($resultado)


					//$num_os=$_GET["id_atualiza"];
					//$num_os = $linha['num_os'];
					//$num_os = $_GET['num_os'];
					//$status = $linha['status'];

					//if ($num_os and $status) 
					//{
				
						//$query = "UPDATE controle_os SET status='$status' WHERE num_os='$num_os'";
						
						//mysql_query($query,$con);
					//}
				//}



				$query = "SELECT * FROM controle_os";
					
				$resultado = mysql_query($query, $con);

				////

				//$linha = mysql_fetch_array($resultado);

				
				//if (isset($_GET["id_atualiza"]))
				//{
					//$num_os=$_GET["id_atualiza"];
					//$status = $linha['status'];
					//$status=$_GET["status"];
					//$query = "UPDATE controle_os SET status='$status' WHERE num_os='$num_os'";
					
					//mysql_query($query,$con);
				//}

				///

			while ($linha = mysql_fetch_array($resultado))
			{
				
			?>
					
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading"><strong><?php echo $linha['cliente']; ?></strong><span class="badge pull-right"><?php echo $linha['num_os']; ?></span></div>
						<div class="panel-body">
						
							<p>
								<strong>Nº OS:</strong>
								<?php echo $linha['num_os']; ?>
							</p>

							<p class="pull-right">
								<strong>Status:</strong>
								<?php echo $linha['status']; ?>
							</p>

							<p>
								<strong>Nome do Cliente:</strong>
								<?php echo $linha['cliente']; ?>
							</p>

							<p>
								<strong>Telefone:</strong>
								<?php echo $linha['telefone']; ?>
								<strong>Operadora:</strong>
								<?php echo $linha['operadora']; ?>
							</p>
							
							<p>
								<strong>E-mail:</strong>
								<?php echo $linha['email']; ?>
							</p>
							
							<p>
								<strong>Mensagem:</strong>
								<?php echo nl2br($linha['mensagem']); ?>
							</p>

							
							
							<!-- Button trigger modal EXCLUIR -->
							<a href="#" role="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#myModal<?php echo $linha['num_os']; ?>">
							  Excluir
							</a>

							<!-- Modal EXCLUIR -->
							<div class="modal fade" id="myModal<?php echo $linha['num_os']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							        <h4 class="modal-title" id="myModalLabel">Excluir Administrador</h4>
							      </div>
							      <div class="modal-body">
							        <p>Tem certeza que deseja excluir a O.S. do Cliente <?php echo $linha['cliente']; ?> ?</p>
							        
							      </div>
							      <div class="modal-footer">
							        <a href="#" role="button" class="btn btn-default" data-dismiss="modal">Cancelar</a>
							        <a href="lista_os.php?id_excluir=<?php echo $linha['num_os']; ?>" class="btn btn-danger btn-md" role="button">Excluir</a>
							      </div>
							    </div>
							  </div>
							</div><!--FIM Modal EXCLUIR-->

							<!-- Button trigger modal ATUALIZAR STATUS -->
							<a href="#" role="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal<?php echo $linha['status']; ?>">
							  Status
							</a>

							<!-- Modal -->
							<div class="modal fade" id="myModal<?php echo $linha['status']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							        <h4 class="modal-title" id="myModalLabel">Inserir / Atualizar Status do Reparo do Cliente <?php echo $linha['cliente']; ?></h4>
							      </div>
							      <div class="modal-body">
							      	<form method="post" action="lista_os.php?go=atualiza" class="form-signin">
								      	<label for="status" class="sr-only">Status</label>
								      	<textarea name="status" id="status" class="txt"><?php echo $linha['status'];?></textarea>
							      	</form>
							      	<a href="#" role="button" class="btn btn-default" data-dismiss="modal">Cancelar</a>
							      	<!--<a href="#" class="btn btn-danger btn-md" role="button">Atualizar</a>-->

							      </div>
							      <div class="modal-footer">
							        <input type="submit" class="btn btn-primary" value="Atualizarr">
							        
							      </div>
							    </div>
							  </div>
							</div><!--FIM Modal ATUALIZAR STATUS-->
						</div>
					</div>
				</div>
				<?php
					}
				//}
				?>
			</div>
		</div>
<?php
if(@$_GET['go'] == 'atualiza'){

	echo "<script>alert('o Status é $status');</script>";

	//$status = $_POST['status'];
	$status = $linha['status'];

	if(empty($status)){
		echo "<script>alert('Preencha o campo Status'); history.back();</script>";
	}else{

		
		$query = mysql_query("UPDATE controle_os SET status='$status' WHERE num_os='$num_os'");
		
		
		echo "<script>alert('Ordem de Serviço Atualizada com sucesso!');</script>";
		//echo "<meta http-equiv='refresh' content='0, url=lista_os.php'>";
	}
}

?>

<?php
	include ("footer.php");
?>