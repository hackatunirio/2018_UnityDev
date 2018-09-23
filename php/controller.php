<?php 
//chama a conexao com o banco.
include_once 'config/conexao.php';
session_start(); //starta a sessao

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
	}
}

//LISTAR TODAS AS FUNÇÕES DISPONIVEIS NO SISTEMA

/*		USUARIO - CRUD	 	*/
//inserir usuario
function inserirUsuario(){
	$conexao = model_conexao();

	extract($_POST);

	$sql = "SELECT * FROM usuario WHERE login = '".$login."'";
	$resulado = $conexao->query($sql);

	//verifica se já nao existe o login.
	if ($resulado->num_rows) {
		//Inseri no banco.
		$data = dataHora();
		$sql = "INSERT INTO usuario (nome, login, senha, dataLogin) VALUES ('".$nome."', '".$login."', '".$senha."', '".$data."')";

		$resultado = $conexao->query($sql);

		if ($resultado) {
			header("Location: login.php?ins=y");
		} else {
			header("Location: inscrever.php?ins=n");
		}
	} else {
		header("Location: inscrever.php?ins=loginExiste");
	}
}
//editar

//excluir

//logar
function login(){
	$conexao = model_conexao();

	//Extrai os dados.
	extract($_POST);

	//instrução SQL
	$sql = "SELECT * FROM usuario WHERE login = '".$usuario."' AND senha = '".$senha."'";

	$resultado = $conexao->query($sql);

	//Verifica se a execução retornou alguma informação.
	if($resultado->num_rows){
		$resul = $resultado->fetch_all();
		$_SESSION['id'] = $resul[0][0];	
		$_SESSION['user'] = $resul[0][1];
		$_SESSION['login'] = $resul[0][2];	
		$_SESSION['foto'] = $resul[0][5];
		$_SESSION['lvl'] = $resul[0][6];
		$_SESSION['email'] = $resul[0][7];	
		header("Location: ../index.php"); //Caso seja bem sucedido
	} else {
		header("Location: ../index.php?login=n"); //caso seja mal sucedido
	}
}

function loginFacebook(){
	$conexao = model_conexao();

	//Extrai os dados.
	extract($_POST);

	//instrução SQL
	$sql = "SELECT * FROM usuario WHERE login = '".$usuario."' AND senha = '".$senha."'";

	$resultado = $conexao->query($sql);

	//Verifica se a execução retornou alguma informação.
	if($resultado->num_rows){
		$resul = $resultado->fetch_all();
		$_SESSION['id'] = $resul[0][0];	
		$_SESSION['user'] = $resul[0][1];
		$_SESSION['login'] = $resul[0][2];	
		$_SESSION['foto'] = $resul[0][5];
		$_SESSION['lvl'] = $resul[0][6];
		$_SESSION['email'] = $resul[0][7];	
		header("Location: ../index.php"); //Caso seja bem sucedido
	} else {
		header("Location: ../index.php?login=n"); //caso seja mal sucedido
	}
}

//deslogar
function deslogar(){
	session_destroy();
	header("Location: ../index.php");
}

/*		POST - CRUD	 	*/

//função para carregar os post's da página.
function carregarPost(){
	$conexao = model_conexao();

	$sql = "SELECT p.*, u.* FROM post as p LEFT JOIN usuario as u ON p.idUsuario = u.idUsuario ORDER BY data DESC";

	$resultPost = $conexao->query($sql);
	$resul = $resultPost->fetch_all();

	return $resul;
}

//função para carregarPostEventos
function carregarPostEventos(){
	$conexao = model_conexao();

	$sql = "SELECT p.*, u.* FROM post as p LEFT JOIN usuario as u ON p.idUsuario = u.idUsuario WHERE p.tipo = 'Evento' ORDER BY data DESC";

	$resultPost = $conexao->query($sql);
	$resul = $resultPost->fetch_all();

	return $resul;
}

//função para carregarPostProjeto
function carregarPostProjeto(){
	$conexao = model_conexao();

	$sql = "SELECT p.*, u.* FROM post as p LEFT JOIN usuario as u ON p.idUsuario = u.idUsuario WHERE p.tipo = 'Projeto' ORDER BY data DESC";

	$resultPost = $conexao->query($sql);
	$resul = $resultPost->fetch_all();

	return $resul;
}

//função para carregarPostEmpreendedorismo
function carregarPostEmpreendedorismo(){
	$conexao = model_conexao();

	$sql = "SELECT p.*, u.* FROM post as p LEFT JOIN usuario as u ON p.idUsuario = u.idUsuario WHERE p.tipo = 'Empreendedorismo' ORDER BY data DESC";

	$resultPost = $conexao->query($sql);
	$resul = $resultPost->fetch_all();

	return $resul;
}

//função para carregarPostEmpreendedorismo
function carregarPostForum(){
	$conexao = model_conexao();

	$sql = "SELECT p.*, u.* FROM post as p LEFT JOIN usuario as u ON p.idUsuario = u.idUsuario WHERE p.tipo = 'Fórum' ORDER BY data DESC";

	$resultPost = $conexao->query($sql);
	$resul = $resultPost->fetch_all();

	return $resul;
}

//função criar post.
function criarPost(){//(int $id, string $msg, date $data){
	extract($_POST);

	//verifica se o campo de msg nao está vazio.
	//conexao com o banco de dados
	$conexao = model_conexao();

	//Faz o upload do arquivo
	// Verifica se o campo PDF está vazio

	if ($_FILES['arquivoAnexar']['name'] != "") {
			//verifica o tipo
			if ($_FILES['arquivoAnexar']['type'] == 'image/jpeg') {
				$tipo = 1;
			} 
			
			if ($tipo == 1) {
				// Caso queira mudar o nome do arquivo basta descomentar a linha abaixo e fazer a modificação
				$_FILES['arquivoAnexar']['name'] = md5(time()).'.jpg';
			} else {
				$_FILES['arquivoAnexar']['name'] = md5(time()).'.pdf';
			}
			

			// Move o arquivo para uma pasta
			move_uploaded_file($_FILES['arquivoAnexar']['tmp_name'],"../upload/".$_FILES['arquivoAnexar']['name']);

			// $pdf_path é a variável que guarda o endereço em que o PDF foi salvo (para adicionar na base de dados)
			$anexo = "upload/".$_FILES['arquivoAnexar']['name'];
		
	} else {
		// Caso seja falso, retornará o erro
		 header("Location: ../index.php?anexo=n");
	}

	//chama a função data hora
	$data = dataHora();
	if ($tipo == 1) {
		$sql = "INSERT INTO post (idUsuario, msg, data, tipo, imagem) 
		VALUES('".$_SESSION['id']."', '".$msg."', '".$data."', '".$tipoPost."', '".$anexo."')";
	} else {
		$sql = "INSERT INTO post (idUsuario, msg, data, tipo, anexo) 
		VALUES('".$_SESSION['id']."', '".$msg."', '".$data."', '".$tipoPost."', '".$anexo."')";
	}

	//executa o sql
	$resultado = $conexao->query($sql);

	if ($resultado) {
		//criou o post
		header("Location: ../index.php?post=y");
	} else {
		//erro ao criar o post
		header("Location: ../index.php?post=n");
	}
}

//editar post

//excluir post
function deletarPost(){
	//faz a conexao com o banco de dados.
	$conexao = model_conexao();

	$id = $_GET['id'];

	//sql para deletar o post
	$sql = "DELETE FROM post WHERE idPost = '".$id."'";

	//executa o SQL
	$resultado = $conexao->query($sql);

	//verifica se o post foi deletado
	if ($resultado) {
		//caso o post seja deletado.
		header("Location: ../index.php?post=y");
	} else {
		//o post ja foi deletado
		header("Location: ../index.php?post=error");
	}
}

//Linkar post com curtidas
function postCurtidas(int $idPost){
	$conexao = model_conexao();

	$sql = "SELECT DISTINCT 
	(SELECT COUNT(*) FROM curtida as c WHERE c.idPost = '".$idPost."') AS qtdC, 
    (SELECT COUNT(*) FROM comentario AS com WHERE com.idPost = '".$idPost."') AS qtdCom,
    (SELECT COUNT(*) FROM compartilhamento AS comp WHERE comp.idPost = '".$idPost."') AS qtdComp
	FROM post as p";

	$resultado = $conexao->query($sql);
	$resul = $resultado->fetch_all();
	return $resul;
}

//Gerar Curtida
function postCurtir(){
	$conexao = model_conexao();

	extract($_POST);

	$sql = "INSERT INTO curtida (idPost, idUsuario) VALUES('".$id."', '".$_SESSION['id']."')";

	$resultado = $conexao->query($sql);

	//refazer uma consulta no banco pelo id
	$sql = "SELECT count(idPost) FROM curtida WHERE idPost = '".$id."'";

	//Executa o model
	$resultadoJson = $conexao->query($sql);
	$resul = $resultadoJson->fetch_all();

	//retornar em modo json para o ajax
	$vetor[] = array('id'=>$resul[0][0]);
	echo json_encode($vetor);

}
//Gerar Compartilhamento
function postCompartilhar($id){
	$conexao = model_conexao();

	$sql = "INSERT INTO compartilhamento (idPost, idUsuario) VALUES('".$id."', '".$_SESSION['id']."')";

	$resultado = $conexao->query($sql);
}

//Listar arquivos compartilhados
function listarArquivos(){
	$conexao = model_conexao();

	$sql = "SELECT msg, tipo, anexo FROM post WHERE anexo != '' ORDER BY data DESC";

	$resultado = $conexao->query($sql);
	$resul = $resultado->fetch_all();
	return $resul;
}

//Listar arquivos listar Arquivos Eventos
function listarArquivosEventos(){
	$conexao = model_conexao();

	$sql = "SELECT msg, tipo, anexo FROM post WHERE anexo != '' AND tipo = 'Evento' ORDER BY data DESC";

	$resultado = $conexao->query($sql);
	$resul = $resultado->fetch_all();
	return $resul;
}

//Listar arquivos listarArquivosProjeto
function listarArquivosProjeto(){
	$conexao = model_conexao();

	$sql = "SELECT msg, tipo, anexo FROM post WHERE anexo != '' AND tipo = 'Projeto' ORDER BY data DESC";

	$resultado = $conexao->query($sql);
	$resul = $resultado->fetch_all();
	return $resul;
}

//Listar arquivos listarArquivosEmpreendedorismo
function listarArquivosEmpreendedorismo(){
	$conexao = model_conexao();

	$sql = "SELECT msg, tipo, anexo FROM post WHERE anexo != '' AND tipo = 'Empreendedorismo' ORDER BY data DESC";

	$resultado = $conexao->query($sql);
	$resul = $resultado->fetch_all();
	return $resul;
}

//Listar arquivos listarArquivosForum
function listarArquivosForum(){
	$conexao = model_conexao();

	$sql = "SELECT msg, tipo, anexo FROM post WHERE anexo != '' AND tipo = 'Fórum' ORDER BY data DESC";

	$resultado = $conexao->query($sql);
	$resul = $resultado->fetch_all();
	return $resul;
}

/*		FUNÇÕES AUXILIARES		*/
//pega data e hora do servidor
function dataHora(){
	$data = date("Y-m-d H:i:s");
	return $data;
}
?>