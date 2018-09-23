<?php 
	$exibirPerfil = false;

	if (isset($_SESSION['user'])) {
		$exibirPerfil = true;
	}
 ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width:device-width, initial-scale=1">
	<title>Univercidade</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.min.css">
	<link rel="icon" type="imagem/png" href="img/U.png">
	<!-- Login Google -->
	<meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="1009768052773-c2lm0c5rf523a474rdr6qevlfp3ncluu.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
	<!-- Finish -->
	<link rel="stylesheet" type="text/css" href="js/jqueryui/jquery-ui.min.css">
	<link rel="stylesheet" type="text/css" href="lib/css/estilo.css">
	<link rel="stylesheet" type="text/css" href="lib/css/estilo-mobile.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/controle.js"></script>
	<script type="text/javascript" src="js/jqueryui/jquery-ui.min.js"></script>
	<script type="text/javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<div id="menu-mobile-mask" class="visible-xs"></div>
	<div id="menu-mobile" class="visible-xs">
		<div id = "tituloMenu" class = "row">	
			<div id="logoMobile">
				<img src="img/logoSite.png">
			</div>
		</div>
		<ul class = "list-unstyled" id="menuMobile">	
			<li><i><img src="img/calendario.png"></i><a href="evento.php" style="color: #bf0711">Eventos</a></li>

			<li><i><img src="img/projetos.png"></i><a href="projeto.php" style="color: #e7b461">Projetos</a></li>

			<li><i><img src="img/grafico.png"></i><a href="empreendedorismo.php" style="color: #6fc387">Empreededorismo</a></li>

			<li><i><img src="img/megafone.png"></i><a href="forum.php" style="color: #1d3559">Fórum</a></li>

			<li><i><img src="img/fogo.png"></i><a href="emAlta.php">Em Alta</a></li>

			<li><i><img src="img/favorido.png"></i><a href="favorido.php" style="color: #9f14b2">Meus Favoridos</a></li>
			<br><br>

			<li><i><img src="img/visaoIcone.png"></i><a href="#" class="altoContraste">Acessibilidade</a></li>
			<li><i><img src="img/aumentarF.png"></i><a href="#" onclick="fonte('a');">Aumentar Fonte</a></li>
			<li><i><img src="img/diminuirF.png"></i><a href="#" onclick="fonte('d');">Diminuir Fonte</a></li>
			<li><i><img src="img/logon.png"></i><a href="#">LogoOff</a></li>
		</ul>
		<div class = "bar-close">	
			<button type = "button" class = "btn btn-close"><i class = "fa fa-close"></i></button>
		</div>
	</div>
	<div class="cabecalhoMob">
		<button id = "botaoAbrir" type = "button"><i class = "fa fa-bars"></i></button>
	</div>
	<div class="cabecalho">
		<div class="container">
			<div class="container">
				<ul>
					<li><i class="fa fa-home"><a href="index.php">Página Inicial</a></i></li>
					<li><i class="fa fa-bell"><a href="#">Notificações</a></i></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="container" id="logo">
		<a href="index.php"><img src="img/logoSite.png"></a>
	</div>

	<div class="container" id="campoBusca">
		<div class="input-group">
			<input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Pesquise um acontecimento...">
	        <div class="input-group-prepend">
	          <div class="input-group-text"><i class="fa fa-search-minus"></i></div>
	        </div>
      </div>
	</div>

	<div id="envelope">
		<div class="menu">
			<?php
				if (!$exibirPerfil) {
			?>
			<div id="logar">
				<div class="row">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalLogin">Realizar Login</button>
				</div>
			</div>
			<?php
				} else {
			?>
			<div id="foto">
				<div class="circulo">
					<?php 
					if (isset($_SESSION['foto'])) { ?>
						<img src="img/perfil/<?php echo $_SESSION['foto']; ?>" data-toggle="modal" data-target="#modalFoto">
					<?php 
						} else {
					?>
						<img src="img/fotoUsuario.png" data-toggle="modal" data-target="#modalFoto">
					<?php } ?>
					
				</div>
				<div class="row" id="nomeUsuarioDiv">
					<label id="nomeUsuario" name="nomeUsuario"><?php echo $_SESSION['user']; ?><small id="nivelUsuario" name="nivelUsuario"><?php echo $_SESSION['lvl']; ?></small></label>
				</div>
			</div>
			<?php } ?>

			<nav id="menu">
				<ul>
					<li><i><img src="img/calendario.png"></i><a href="evento.php" style="color: #bf0711">Eventos</a></li>

					<li><i><img src="img/projetos.png"></i><a href="projeto.php" style="color: #e7b461">Projetos</a></li>

					<li><i><img src="img/grafico.png"></i><a href="empreendedorismo.php" style="color: #6fc387">Empreededorismo</a></li>

					<li><i><img src="img/megafone.png"></i><a href="forum.php" style="color: #1d3559">Fórum</a></li>

					<li><i><img src="img/fogo.png"></i><a href="emAlta.php">Em Alta</a></li>

					<li><i><img src="img/favorido.png"></i><a href="favorido.php" style="color: #9f14b2">Meus Favoridos</a></li>
					<br>

					<li><i><img src="img/visaoIcone.png"></i><a href="#" class="altoContraste">Contraste</a></li>
					<li><i><img src="img/aumentarF.png"></i><a href="#" onclick="fonte('a');">Aumentar Fonte</a></li>
					<li><i><img src="img/diminuirF.png"></i><a href="#" onclick="fonte('d');">Diminuir Fonte</a></li>
					<?php
						if ($exibirPerfil) {
					?>
					<li><i><img src="img/logon.png"></i><a href="php/deslogar.php">LogoOff</a></li>
				<?php } ?>
				</ul>
			</nav>
		</div>
