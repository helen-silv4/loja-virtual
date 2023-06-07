<?php

	include 'conexao.php';

	$nome = $_POST['nomeContato'];
	$email = $_POST['emailContato'];
	$descricao = $_POST['descricaoContato'];

	$consulta = $cn->query("select descricao_email_form from tbl_form where descricao_email_form = '$email';");
	
	$exibe = $consulta->fetch(PDO::FETCH_ASSOC);

	if($consulta ->rowCount() == 1){
		header('location:erro4.php');
	}
	else{
		$incluir = $cn->query("insert into tbl_form values (Default, '$nome', '$email', '$descricao');");
		header('location:ok2.php');
	}

?>