<?php

	include 'conexao.php'; 

	$cd=$_GET['id']; 
	$pasta = "img/";
	$consulta = $cn->query("SELECT * FROM tbl_produto WHERE cod_produto = '$cd'");

	$exibe = $consulta->fetch(PDO::FETCH_ASSOC);

	$excluir = $cn->query("DELETE FROM tbl_produto WHERE cod_produto = '$cd'");

	$foto1=$exibe['descricao_capa']; 

	if ($foto1!="") {
		unlink($pasta.$foto1); // exclusão da foto na pasta
	}

	header('location:lista_produto.php');
?>