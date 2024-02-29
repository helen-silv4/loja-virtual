<?php
	include 'conexao.php';

	session_start();
	
	$Vemail = $_POST['txtemail'];
	$Vsenha = $_POST['txtsenha'];

	$consulta = $cn->query("select cod_usuario,nome_usuario,descricao_email, descricao_senha, descricao_status from tbl_usuario where descricao_email = '$Vemail' and descricao_senha = '$Vsenha'");

	if($consulta->rowCount() == 1){ 
		$exibeUsuario = $consulta->fetch(PDO::FETCH_ASSOC);

		if($exibeUsuario['descricao_status'] == 0) {
			$_SESSION['ID'] = $exibeUsuario['cod_usuario'];
			$_SESSION['Status'] = 0;
			header('location:index.php');
		}
		else {
			$_SESSION['ID'] = $exibeUsuario['cod_usuario'];
			$_SESSION['Status'] = 1;
			header('location:index.php');
		}	
	}
	else {
		header('location:erro.php');
	}	
?>