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
	?>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4 text-center">
				<br><br><br><br>
				<img src=" img/erro.png" alt="erro" style="width:100%;">
				<h3>E-mail não cadastrado!</h3>	
				<a href="formusuario.php">
					<button type="button" class="btn btn-lg btn-success">
						Cadastre-se
					</button>
				</a>
			</div>
		</div>
	</div>
	<br><br><br>
</body>
</html>