<?php 
	
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="controller.php?f=inserirUsuario" method="POST">
		<legend>Nome</legend>
		<input type="text" name="nome">
		<legend>Login</legend>
		<input type="text" name="login">
		<legend>Senha</legend>
		<input type="password" name="senha">
		<legend>Redigitar a senha</legend>
		<input type="password" name="senha2">
		<input type="submit" name="Cadastrar">
	</form>
</body>
</html>