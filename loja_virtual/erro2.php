<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cello Games | Erro</title>
	<link href="img/icone2.ico" rel="sortcut icon"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
				<br><br><br><br>
				<img src=" img/erro.png" alt="erro" style="width:100%;">
				<h3>Nenhum produto foi encontrado!</h3>	
				<br> 
				<a href="index.php"><button type="button" class="btn btn-lg btn-primary"> <i class="glyphicon glyphicon-repeat"></i> Continuar</button></a>
			</div>
		</div>
	</div>

	<br><br><br><br><br><br>
	<?php 
		include 'rodape.html' 
	?>
</body>
</html>