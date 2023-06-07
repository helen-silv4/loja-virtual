<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cello Games | Erro</title>
	<link href="img/icone2.ico" rel="sortcut icon"/>
	<!--Responsividade-->		
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!-- Imagens Rodapé-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		.navbar{
			margin-bottom: 0;
		}
			
		#busca{
			height: 30px;
			margin-top: 7px;
		}	
	</style>
</head>
<body>
	<?php
	
		include 'conexao.php';	
		include 'nav.php';
		include 'cabecalho.html';
	
	?>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4 text-center">
				<br><br><br>
				<img src=" img/erro.png" alt="erro" style="width:100%;">
				<h2>Email já em uso na Loja!</h2>
				<a href="formusuario.php" class="btn btn-block btn-warning" role="button">Tentar Novamente</a>
				<a href="esquecisenha.php" class="btn btn-block btn-primary" role="button">Esqueci a senha</a>
			</div>
		</div>
	</div>

	<br><br><br><br><br>
	<?php 
		include 'rodape.html' 
	?>
	
</body>
</html>