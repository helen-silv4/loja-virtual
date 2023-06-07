<?php
	include 'conexao.php';

	session_start(); //iniciando uma sessão
	
	$Vemail = $_POST['txtemail'];
	$Vsenha = $_POST['txtsenha'];

	//echo $Vemail.'<br/>';
	//echo $Vsenha.'<br/>';

	$consulta = $cn->query("select cod_usuario,nome_usuario,descricao_email, descricao_senha, descricao_status from tbl_usuario where descricao_email = '$Vemail' and descricao_senha = '$Vsenha'");

	if($consulta->rowCount() == 1){ //rowCount: verifica se o usuário existe ou não
		//echo 'Usuário cadastrado com sucesso.';
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
		//echo 'Usuário não Cadastrado.';
		header('location:erro.php');
	}	
?>