		<footer class="footer">
			<div class="container">
				<p class="text-muted">&copy; <?php echo date("Y"); ?> - Sistema Soluções em Informática</p>
			</div>
		</footer>

		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
		<script src="../js/bootstrap.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="../js/ie10-viewport-bug-workaround.js"></script>
		<script type="text/javascript">
			$('#atualizaModal').on('show.bs.modal', function (event) {
			  var button = $(event.relatedTarget) // Button that triggered the modal
			  var cliente_nome = button.data('cliente')
			  var numero_os = button.data('numeroos') // Extract info from data-* attributes
			  var telefone = button.data('tel')
			  var operadora = button.data('op')
			  var email = button.data('mail')
			  var status = button.data('status')
			
			  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
			  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
			  var modal = $(this)
			  modal.find('.modal-title').text('Atualizar Dados de ' + cliente_nome)
			  modal.find('#numero_os').val(numero_os)
			  modal.find('#cliente_nome').val(cliente_nome)
			  modal.find('#numero_tel').val(telefone)
			  modal.find('#operadora_tel').val(operadora)
			  modal.find('#endereco_email').val(email)
			  modal.find('#texto_status').val(status)
			})
		</script>
	</body>
	
</html>