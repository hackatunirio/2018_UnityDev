<?php 
	//Funções auxiliares.
	//verifica qual função está chamando.
	if (isset($_GET['f'])) {
		//recebe o GET por parametro.
		$function = $_GET['f'];

		//verifica se existe a função que foi passada por GET
		if (function_exists($function)) {
			//caso a função exista chama ela.
			call_user_func($function);
			//depois de chamar fecha a função.
			exit();
		} else {
			header("Location: ../index.php");
		}
	}

	function comentarPost(){

				if (isset($_SESSION['user'])){
			?>
			<div id="dadosPost">
				<form action="php/controller.php?f=criarPost" enctype="multipart/form-data" method="POST">
				<div class="form-group" id="divTipo">
				    <select class="form-control" id="tipoPost" name="tipoPost" required>
				      <option>Selecione um tipo de post...</option>
				      <option value="Evento">Evento</option>
				      <option value="Projeto">Projeto</option>
				      <option value="Empreendedorismo">Empreendedorismo</option>
				      <option value="Fórum">Fórum</option>
				    </select>
				</div>
				<div class="row">
					<textarea class="inputCampoIdeia" rows="4" placeholder="Escreva aqui seu post.." id="ideiaPoster" name="msg" required></textarea>
				</div>
				<div class="row">
					<div class="custom-file" id="arquivoAnexarInput">
						<input class="custom-file-input" type="file" accept="application/pdf, image/jpeg" id="arquivoAnexar" name="arquivoAnexar" data-max-size="2000000" value="">
						<label class="custom-file-label" for="customFileLang">Selecione um arquivo..</label>
						<input type="checkbox" name="liberacao" value="documento" required> Permissão - liberar documento...
					</div>
				</div>
				<div class="row">
					
					<button type="submit" id="ideiaBotao" name="ideiaBotao" class="btn btn-primary">Postar</button>
				</div>
				</form>
			</div>
			<?php
			}
	}

	function telaLogin(){
			if (!isset($_SESSION['user'])){
		?>
		<div class="modal" tabindex="-1" role="dialog" id="modalLogin">
	  	<div class="modal-dialog" role="document">
	    <div class="modal-content">
	      	<div class="cabecalhoTitulo">
	        	<h5 class="modal-title">Fazer Login</h5>
		    	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		    		<span aria-hidden="true">&times;</span>
		    	</button>
	      	</div>
	      	<div class="container">
	      		<div id="camposLogin">
	      			<form action="php/controller.php?f=login" method="POST">
			      	<div class="row">
				      	<label class="inputLabel">Usuário:</label>
				    </div>
				    <div class="row">
				      	<input type="text" class="inputCampo" id="usuario" name="usuario">
					</div>
					<div class="row">
				      	<label class="inputLabel">Senha:</label>
				    </div>
				    <div class="row">
				      	<input type="password" class="inputCampo" id="senha" name="senha">
					</div>
			      	<div class="row"id="botaoCentro">
						<!-- Div do login do Google -->
						<div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
						<!-- -->
						<button type="submit" id="logar" name="logar" class="btn btn-primary">Login</button>
					</div>
					</form>
				</div>
			</div>
	    </div>
	  </div>
	</div>
		<?php
		}
	}
?>

 <script>
    $(function () {
        $("input:file").change(function () {
            var fileInput = $(this);
            var maxSize = $(this).data('max-size');
            console.log(fileInput.get(0).files[0].size);

            //aqui a sua função normal
            if (fileInput.get(0).files.length) {

                var fileSize = fileInput.get(0).files[0].size; // in bytes

                if (fileSize > maxSize) {
                    alert('Infelizmente o seu arquivo é maior que o permitido, permitimos apenas arquivos 2 Mb');
                    return false;
                }
            } else {
                alert('escolha o arquivo.');
                return false;
            }
        });
    });
</script>