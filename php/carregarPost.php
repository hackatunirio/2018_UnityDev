<?php 
	//chama a conexao com o banco.
	include_once 'controller.php';

	if (!isset($_SESSION['id'])) {
		header("Location: login.php?ins=error");
	}

	//chama a função para carregar os posts.
	$posts = carregarPost(1);

	//verifica se é pra exibir a janela modal aviso
	if (isset($_GET['ins'])) {
		$msg = $_GET['ins'];

		if ($msg == 'y') {
			echo "Inserrido com sucesso!";
		} else {
			echo "Erro ao tentar inserir!";
		}
	}

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<link rel="stylesheet" type="text/css" href="../lib/css/estilo.css">
 </head>
 <body>
 	<a href="deslogar.php">Sair</a>
 	<span><?php echo $_SESSION['user']; ?></span>
 	<form action="controller.php?f=criarPost" method="POST">
 		<input type="text" name="msg">
 		<input type="submit" name="enviar">
 	</form>
 	<div class="conteudo">
        <div class="container">
        	<?php 
        		foreach ($posts as $post) {
        			?>
        				<div class="row">
			                <div class="caixaTimeLine" id="evento">
			                    <h1>Olha Mundo um Evento! <br> <?php echo $post[2]; ?></h1>
			                </div>
            			</div>
        			<?php
        		}
        	?>
        </div>
    </div>
 
 </body>
 </html>