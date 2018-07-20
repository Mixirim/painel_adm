<?php
	include ("cabecalho.php");
?>

<!-- Begin page content -->
		
		<div class="container"><br/><br/><br/>
			<h3>Listagem de Inscritos nos Concursos</h3>
			<!-- Painel -->
			
			<div class="row">
			
			<?php
					
				if (isset($_GET["id_excluir"]))
				{
					$usuario_id=$_GET["id_excluir"];
					
					$query = "	DELETE FROM usuario 
								WHERE usuario_id='$usuario_id'";
					
					mysql_query($query,$con);
				}
			?>

			<?php
				
				$query = "	SELECT * FROM usuario";
				
				$resultado = mysql_query($query, $con);

				while ($linha = mysql_fetch_array($resultado))
				{
					  
				
			?>
					
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading"><strong><?php echo $linha['nome']; ?></strong><span class="badge pull-right"><?php echo $linha['usuario_id']; ?></span></div>
						<div class="panel-body">
						
							<p>
								<strong>ID Usuário:</strong>
								<?php echo $linha['usuario_id']; ?>
							</p>

							<p>
								<strong>Nome do Usuário:</strong>
								<?php echo $linha['nome']; ?>
							</p>

							<p>
								<strong>E-Mail:</strong>
								<?php echo $linha['email']; ?>
							</p>

							<p>
								<strong>Data de Cadastro:</strong>
								<?php echo date('d/m/Y H:i:s',strtotime($linha['data'])); ?>
							</p>

							
							<!-- Button trigger modal -->
							<a href="#" role="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#myModal<?php echo $linha['usuario_id']; ?>">
							  Excluir
							</a>

							<!-- Modal -->
							<div class="modal fade" id="myModal<?php echo $linha['usuario_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							        <h4 class="modal-title" id="myModalLabel">Excluir Administrador</h4>
							      </div>
							      <div class="modal-body">
							        <p>Tem certeza que deseja excluir o Administrador <?php echo $linha['nome']; ?> ?</p>
							        
							      </div>
							      <div class="modal-footer">
							        <a href="#" role="button" class="btn btn-default" data-dismiss="modal">Cancelar</a>
							        <a href="lista_adm.php?id_excluir=<?php echo $linha['usuario_id']; ?>" class="btn btn-danger btn-md" role="button">Excluir</a>
							      </div>
							    </div>
							  </div>
							</div><!--FIM Modal-->
						</div><!--FIM Panel Body-->
					</div><!--FIM panel panel-default-->
				</div><!--FIM col-md-12-->
				<?php
					}
				?>
			</div>
		</div>
<?php
	include ("footer.php");
?>