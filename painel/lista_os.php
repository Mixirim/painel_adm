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

			
				$query = "SELECT * FROM controle_os";
					
				$resultado = mysql_query($query, $con);


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

							<p>
								<strong>Data de cadastro:</strong>
								<?php //echo $linha['data']; 
								echo date('d/m/Y H:i:s',strtotime($linha['data']));?>
							</p>

							
							
							<!-- Button trigger modal EXCLUIR -->
							<button class="btn btn-danger btn-md" data-toggle="modal" data-target="#myModal<?php echo $linha['num_os']; ?>">
							  Excluir
							</button>

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


							<!--INICIO ATUALIZA-->
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#atualizaModal" data-cliente="<?php echo $linha['cliente'];?>" data-numeroos="<?php echo $linha['num_os'];?>" data-tel="<?php echo $linha['telefone'];?>" data-op="<?php echo $linha['operadora'];?>" data-mail="<?php echo $linha['email'];?>" data-status="<?php echo $linha['status'];?>">Alterar o Status do Reparo</button>

							<div class="modal fade" id="atualizaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							        <h4 class="modal-title" id="exampleModalLabel">New message</h4>
							      </div>
							      <div class="modal-body">
							        <form method="post" action="lista_os.php?go=atualiza">
							          <div class="form-group">
							          	<div class="form-inline">
								            <label for="numero_os" class="control-label">Nº O.S.:</label>
								            <input type="text" name="os" class="form-control" id="numero_os">
							            </div>
							          </div>
							          <div class="form-group">
							          	<div class="form-inline">
								            <label for="cliente_nome" class="control-label">Cliente:</label>
								            <input type="text" name="cli" class="form-control" id="cliente_nome">
							            </div>
							          </div>
							          <div class="form-group">
								        <div class="form-inline">
							          		<label for="numero_tel" class="control-label">Telefone:</label>
								            <input type="text" name="tel" class="form-control" id="numero_tel">
								            <label for="operadora_tel" class="control-label">Operadora:</label>
								            <input type="text" name="op" class="form-control" id="operadora_tel">
						            	</div>
								      </div>
							 
							          <div class="form-group">
							          	<div class="form-inline">
							            	<label for="endereco_email" class="control-label">E-Mail:</label>
							            	<input type="text" name="mail" class="form-control" id="endereco_email">
						            	</div>
							          </div>
							          <div class="form-group">
							            <label for="texto_status" class="control-label">Status</label>
							            <textarea class="form-control" name="stat" id="texto_status"></textarea>
							          </div>
							          	<div class="modal-footer">
							        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							        		<button type="submit" class="btn btn-primary">Atualizar</button>
							      		</div>
							        </form>
							      </div>
							    </div>
							  </div>
							</div><!--FIM ATUALIZAR-->
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
	//include_once("../config.php");
if(@$_GET['go'] == 'atualiza'){
	$num_os = $_POST['os'];
	$cliente = $_POST['cli'];
	$telefone = $_POST['tel'];
	$operadora = $_POST['op'];
	$email = $_POST['mail'];
	$status = $_POST['stat'];
	//echo "$num_os - $cliente - $status";
	$result_atualiza = "UPDATE controle_os SET cliente='$cliente', telefone = '$telefone', operadora = '$operadora', email = '$email', status = '$status' WHERE num_os = '$num_os'";
	
	$resultado = mysql_query($result_atualiza);	
	echo "<script>alert('Cadastro Atualizado com Sucesso!');</script>";
	echo "<meta http-equiv='refresh' content='0, url=lista_os.php'>";
}

?>

<?php
	include ("footer.php");
?>