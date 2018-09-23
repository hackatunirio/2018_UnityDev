<?php 
	require_once('controller.php');

	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		$teste = postCurtir($id);
	}
?>