<?php
	include 'conexao.php';

	$recebe_email = $_POST['txtEmail'];
	$consulta_email = $cn->query("select nome_usuario,descricao_email,descricao_senha from tbl_usuario where descricao_email = '$recebe_email'");

	if($consulta_email->rowCount() == 0) {
		header("location:erro3.php");
	}
	else {
		$exibe=$consulta_email->fetch(PDO::FETCH_ASSOC);
		
		$recebe_nome=$exibe['nome_usuario'];  
		$recebe_senha=$exibe['descricao_senha']; 
		
		include 'PHPMailerAutoload.php';
		include 'class.phpmailer.php';  
		include 'class.smtp.php';
		
		$mail = new PHPMailer;
		
		$mail->isSMTP(); 
		$mail->CharSet = 'UTF-8';
		$mail->SMTPDebug = 2;
		$mail->Host = 'smtp.gmail.com'; 
		$mail->Port = 587; 
		$mail->SMTPSecure = 'tls'; 
		$mail->SMTPAuth = true; 
		$mail->Username = "seuemail@gmail.com";  
		$mail->Password = "suasenha";
		$mail->setFrom('seuemail@gmail.com', 'Cello Games'); 
		$mail->addReplyTo('seuemail@gmail.com', 'Cello Games'); 
		$mail->addAddress($recebe_email, $recebe_nome);  
		$mail->Subject = 'Recuperação de Senha | Cello Games'; 
		$mail->msgHTML('Sua Senha na loja Cello Games é:'.$recebe_senha);
		
		$mail->SMTPOptions = array(
			'ssl' => array(
        	'verify_peer' => false,
        	'verify_peer_name' => false,
        	'allow_self_signed' => true
    		)
		);
		
		if (!$mail->send()) {
			echo "ERRO::::: " . $mail->ErrorInfo;
		} else {
			echo "<html><script>location.href='ok2.php'</script></html>";
		}
	}
?>