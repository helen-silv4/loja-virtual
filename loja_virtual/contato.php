<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cello Games | Contato</title>
	<link href="img/icone2.ico" rel="sortcut icon"/>
	<meta name="viewport" content="widht=device-widht,initial-scale=1"> 
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
		session_start();
		include 'conexao.php';
		include 'nav.php';

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$nomeContato = mysqli_real_escape_string($conexao, $_POST['nomeContato']);
			$emailContato = mysqli_real_escape_string($conexao, $_POST['emailContato']);
			$descricaoContato = mysqli_real_escape_string($conexao, $_POST['descricaoContato']);

			$status = 0;

			if (isset($_SESSION['Status'])) {
				$status = ($_SESSION['Status'] == 1) ? 1 : 0;
			}

			$query = "INSERT INTO tbl_form (nome_usuario_form, descricao_email_form, descricao_form, status) VALUES ('$nomeContato', '$emailContato', '$descricaoContato', $status)";
			mysqli_query($conexao, $query);

			exit(); 
		}
	?>

	<div class="container-fluid">
		<h2 class="text-center"><br>
			<strong>Entre em Contato</strong>
		</h2>
		<div class="row">
			<div class="col-sm-5 col-sm-offset-1"> 
				 <img src="img/contact.png" class="img-responsive" style="width:100%;">
			</div>
				
	 		<div class="col-sm-5">
				<form method="post" action="enviaremailcontato.php" name="conta">
					<br><br>
					<div class="form-group">
						<label for="nomeContato">Nome</label>
						<input name="nomeContato" type="text" class="form-control" required id="nomeContato">
					</div>

					<div class="form-group">
						<label for="emailContato">Email</label>
						<input name="emailContato" type="email" class="form-control" required id="emailContato">
					</div>

					<div class="form-group">
						<label for="descricaoContato">Descrição</label>
						<textarea rows="5" class="form-control" name="descricaoContato"></textarea>
					</div>

					<button type="submit" class="btn btn-lg btn-success">
						Enviar  <span class="glyphicon glyphicon-arrow-right"></span>
					</button>
				</form>
			</div>		
		</div>
	</div>	
	<br>
	<?php 
		include 'rodape.html';
	?>
</body>
</html>