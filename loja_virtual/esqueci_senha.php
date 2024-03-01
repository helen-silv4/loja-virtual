<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cello Games | Esqueci Senha</title>
	<link href="img/icone2.ico" rel="sortcut icon"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style type="text/css">
		.navbar {
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
			<div class="col-sm-4 col-sm-offset-4">
				<h2>Digite o email cadastrado na loja</h2>
				<form method="post" action="enviaremail.php" name="logon">
					<div class="form-group">
						<input name="txtEmail" type="email" class="form-control" required id="email">
					</div>
					<button type="submit" class="btn btn-lg btn-default">
						<span class="glyphicon glyphicon-envelope"> Enviar</span>
					</button>
				</form>
				
				<a href="formUsuario.php">
					<button type="submit" class="btn btn-lg btn-link">
						Ainda não sou cadastrado
					</button>
				</a>
			</div>
		</div>
	</div>
</body>
</html>