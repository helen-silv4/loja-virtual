<?php
	include 'conexao.php';

	$recebe_email = $_POST['txtEmail'];

	$consulta_email = $cn->query("select nome_usuario,descricao_email,descricao_senha from tbl_usuario where descricao_email = '$recebe_email'");

	if($consulta_email->rowCount() == 0){
		header("location:erro3.php");
	}
	else{
		// $exibe é uma variavel de vetor recebe a consulta
		$exibe=$consulta_email->fetch(PDO::FETCH_ASSOC);
		
		$recebe_nome=$exibe['nome_usuario'];  // pegar o nome do usuario do email
		$recebe_senha=$exibe['descricao_senha'];  // pegar a senha do usuario do email
		
		// incluindo as três classes que importadas do PHPMailer
		include 'PHPMailerAutoload.php';
		include 'class.phpmailer.php';  
		include 'class.smtp.php';
		
		
		// criando uma nova classe
		$mail = new PHPMailer;
		
		$mail->isSMTP();  // parametro smtp
		$mail->CharSet = 'UTF-8'; // evitando problemas de acentuação
		$mail->SMTPDebug = 2; // opção 2 significa porta de duas vias, lado cliente e servidor
		$mail->Host = 'smtp.gmail.com'; // host
		$mail->Port = 587; // porta que gmail utiliza
		$mail->SMTPSecure = 'tls'; // protocolo tls
		$mail->SMTPAuth = true; // se exsitir autenticação
		$mail->Username = "seuemail@gmail.com";  // inserir email que vai disparar email para as pessoas
		$mail->Password = "suasenha";  // senha do gmail
		$mail->setFrom('seuemail@gmail.com', 'Cello Games');  // email novamente
		$mail->addReplyTo('seuemail@gmail.com', 'Cello Games');  // se usuario quiser enviar email
		$mail->addAddress($recebe_email, $recebe_nome);  // para quem vai o email
		$mail->Subject = 'Recuperação de Senha | Cello Games';  // tiitulo do email
		$mail->msgHTML('Sua Senha na loja Cello Games é:'.$recebe_senha);
		
		// array que informa que não estamos usando conexao segura
		$mail->SMTPOptions = array(
			'ssl' => array(
        	'verify_peer' => false,
        	'verify_peer_name' => false,
        	'allow_self_signed' => true
    		)
		);
		
		// se ocorrer algum problema ao enviar email, mostrar erro na tela
		if (!$mail->send()) {
			echo "ERRO::::: " . $mail->ErrorInfo;
		} else {
			echo "<html><script>location.href='ok2.php'</script></html>";
		}
	}
?>