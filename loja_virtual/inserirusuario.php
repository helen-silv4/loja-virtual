<?php  

	include 'conexao.php';

	$nome = $_POST['txtnome'];
	$email = $_POST['txtemail'];
	$senha = $_POST['txtsenha'];
	$end = $_POST['txtendereco'];
	$cidade = $_POST['txtcidade'];
	$cep = $_POST['txtcep'];

	/* Testando variáveis
	echo $nome.'<br/>';
	echo $email.'<br/>';
	echo $senha.'<br/>';
	echo $end.'<br/>';
	echo $cidade.'<br/>';
	echo $cep.'<br/>';*/

	$consulta = $cn->query("select descricao_email from tbl_usuario where descricao_email='$email'");
	$exibe = $consulta->fetch(PDO::FETCH_ASSOC);

	if($consulta->rowCount() == 1){
		//echo 'Email já cadastrado no sistema.';
		header('location:erro1.php');
	}
	else {
		//echo 'Email pode ser cadastrado no sistema.';
		$incluir = $cn->query("
			insert into tbl_usuario(nome_usuario,descricao_email,descricao_senha,descricao_status,descricao_endereco,descricao_cidade,num_cep)
			values('$nome','$email','$senha','0','$end','$cidade','$cep')");
			header('location:ok.php');
	}

?>