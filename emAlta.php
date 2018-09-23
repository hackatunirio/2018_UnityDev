<?php 
	include_once 'php/controller.php';
	include('php/cabecalho.php');
	include('php/funcaoAux.php');

	$exibirPerfil = false;
	$exibirModalErrorLogin = false;

	$posts = carregarPostForum();

	//verifica a sessao
	if (isset($_SESSION['user'])) {
		$exibirPerfil = true; // variavel responsavel por saber se é pra apresentar o perfil ou nao...
	}

	//verifica se recebeu algum modal
	if (isset($_GET['login'])) {
		if ($_GET['login'] == 'n') {
			$exibirModalErrorLogin = true;
			$msgModal = "Error: Não foi possivel fazer login!"; 
		} else {
			//tratamento de se o login funcionar
		}
	}
?>

<script type="text/javascript" src="js/jquery.js"></script>

	<?php if ($exibirModalErrorLogin) {
	?>
	<div class="alert alert-danger" role="alert">
	  <?php echo $msgModal; ?>
	</div>
	<?php
		}
	?>
		<div class="conteudo">
			<?php comentarPost(); ?>
			<div class="container">
				<div class="row">
					<?php
					//Começa a puxar o conteudo dos posts
						foreach ($posts as $post) {
        			?>
					<div class="caixaTimeLine" id="evento">
						<div id="fotoTime">
							<div class="quadrado">
								<img src="img/perfil/<?php echo $post[12]; ?>">
							</div>
							<div class="row">
								<label id="nomePoste"><b><?php echo $post[8]; ?></b> publicou em</b> <b class="<?php 

								if($post[5] == 'Evento'){
									echo 'iconeMaisEvento';
								} else if($post[5] == 'Projeto'){
									echo 'iconeMaisProjeto';
								}else if($post[5] == 'Empreendedorismo'){
									echo 'iconeMaisEmpreendedorismo';
								} else {
									echo 'iconeMaisForum';
								}
								 ?>"><?php echo $post[5]; ?></b><small> 
									Nvl: <?php echo $post[13]; ?></small></label>
							</div>
							<?php 
								if (isset($_SESSION['id'])){
								?>
							<div class="row" id="iconeMais">
								<?php if($_SESSION['id'] == $post[1]) { ?>
								<a href="php/controller.php?f=deletarPost&id=<?php echo $post[0]; ?>"><i class="fa fa-trash-o"></i></a>
							<?php } else { ?>
								<a href="php/controller.php?f=denuciar(<?php echo $post[0]; ?>)"><i class="fa fa-hand-paper-o"></i></a>
							<?php } ?>
							</div>
							<?php } ?>
							<div class="row" id="textoTimeLine">
                                <p><?php echo $post[2]; ?></p>
                                <?php if ($post[4] == null) {?>
                                	<embed src="<?php echo $post[6]; ?>" width="500" height="350">
                                	<?php } else { ?>                                	
                                	<img src="<?php echo $post[4]; ?>" width="350" height="350">
                                <?php } ?>
                                
                            </div>
                            <?php $resultado = postCurtidas($post[0]);  ?>
           
							<div class="row" id="reacaoTime">
								<i class="fa fa-thumbs-up reacaoTimeEventoCurtir" id="<?php echo $post[0]; ?>"><b id="curtir<?php echo $post[0]; ?>"><?php echo $resultado[0][0]; ?></b></i>
								<i class="fa fa-comment-o reacaoTimeEventoComentar" id="<?php $post[0]; ?>"><b>  <?php echo $resultado[0][1]; ?></b></i>
								<i class="fa fa-external-link reacaoTimeEventoCompartilhar" id="<?php $post[0]; ?>"><b>  <?php echo $resultado[0][2]; ?></b></i>
							</div>
						</div>
					</div>
					<?php
						}
        			?>
				</div>
			</div>
		</div>

		<div class="listaAnexo">
			<div class="row">
				<h6>Arquivos Compartilhados</h6>
			</div>
			<?php 
			$listaAnexos = listarArquivosForum();
			foreach ($listaAnexos as $listaAnexo) {
				?>
			<div class="row" id="arquivosAnexados">
				<i class="fa fa-file-pdf-o"><a href="<?php echo $listaAnexo[2]; ?>" title="<?php echo $listaAnexo[0]; ?>"><?php echo $listaAnexo[0]; ?></a></i>
			</div>
			<?php }?>
		</div>
	</div>

	<div class="modal" tabindex="-1" role="dialog" id="modalFoto">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      	<div class="cabecalhoTitulo">
	        	<h5 class="modal-title">Atualize a Foto do Perfil</h5>
		    	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		    		<span aria-hidden="true">&times;</span>
		    	</button>
	      	</div>
	      	<div class="modal-body">
		      	<div class="row" id="fotoModal">
		      		<div class="circuloModal">
						<img src="img/fotoUsuario.png">
					</div>
		      	</div>
	        	<div class="row">
	        		<div class="custom-file" id="arquivoAnexarInput">
	        			<input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
						<input type="file" class="custom-file-input" id="arquivoAnexar" name="arquivoAnexar">
						<label class="custom-file-label" for="customFileLang">Selecione uma foto..</label>
					</div>
	        	</div>
	      	</div>
	      	<div class="row" id="botaoModal">
	      		<button type="button" id="salvarFoto" class="btn btn-primary">Salvar</button>
	      	</div>
	    </div>
	  </div>
	</div>

	<div class="modal" tabindex="-1" role="dialog" id="modalTimeLine">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      	<div class="cabecalhoTitulo">
	        	<h5 class="modal-title"></h5>
		    	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		    		<span aria-hidden="true">&times;</span>
		    	</button>
	      	</div>
	      	<div class="modal-body">
		      	<div class="row" id="fotoModal">
		      		<div class="row">
		      			<i class="fa fa-trash-o"><a href="php/controller.php?f=">Excluir Públicação</a></i>
		      		</div>
		      		<br><br>
		      		<div class="row">
		      			<i class="fa fa-hand-paper-o"><a href="#">Denunciar</a></i>
		      		</div>
		      	</div>
	      	</div>
	    </div>
	  </div>
	</div>

	<?php telaLogin(); ?>
	
	      		
		

</body>
<script>
	 function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
        console.log('Full Name: ' + profile.getName());
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());

        // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;
        console.log("ID Token: " + id_token);
      };
</script>
<script>
	$('.reacaoTimeEventoCurtir').click(function() {
		var objeto = $(this);
		var id = objeto.attr('id');

	    $.ajax({
	        type: 'POST',
	        dataType: 'json',
	        url: 'php/controller.php?f=postCurtir',
	        async: true,
	        data: 'id='+id,
	        success: function(response) {
	        	console.log(response);
	            var el = document.getElementById("curtir"+id);
	        	$(el).empty();
	        	$(el).append(response[0].id);
	        }
	    });

	    return false;
	});
</script>
<script>
	$(document).ready(function()
	{
		var daltonico = 0;

	   $('.altoContraste').click(function()
	   {
		   	if(daltonico == 0)
		   	{
		   		daltonico = 1;
		      	$('div').css('background-color', '#000');
		      	$('div').css('color', '#FFF');
		      	$('a').css('color', '#FF0');
		      	$('p').css('color', '#FF0');
		      	$('button').css('background', '#ff0');
		      	$('button').css('color', '#000');
		      	$('label').css('color', '#ff0');
		      	$('i').css('color', '#ff0');
		  
		    }

		    else if(daltonico == 1)
		    {
		    	daltonico = 2;
		      	$('div').css('background-color', '#000');
		      	$('div').css('color', '#FFF');
		      	$('a').css('color', '#fff');
		      	$('p').css('color', '#fff');
		      	$('button').css('background', '#fff');
		      	$('button').css('color', '#000');
		      	$('label').css('color', '#fff');
		      	$('i').css('color', '#fff');

		    }

		    else if(daltonico == 2)
		    {
		    	daltonico = 0;
		    	location.reload();
		    }
	   });
	});
</script>

</html>