<?php 
	//faz a conexao com o banco de dados.
	function model_conexao(){
		//conexao com o servidor
		//servidor, usuario, senhar, db
		$conection = new mysqli("localhost", "root", "", "universidade");
		//definição do portgues.
		$conection->set_charset("utf8");

		//retorna a conexao feita.
		return $conection;
	}
?>