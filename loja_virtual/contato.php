<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cello Games | Contato</title>
	<link href="img/icone2.ico" rel="sortcut icon"/>
	<!--Responsividade-->
	<meta name="viewport" content="widht=device-widht,initial-scale=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery Jogo -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- JavaScript compilado-->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!-- Imagens Rodapé-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
		include 'cabecalho.html'; 

	?>

	<div class="container-fluid">
		<h2 class="text-center"><b>Entre em Contato</b></h2>
		<div class="row">
			<div class="col-sm-5 col-sm-offset-1"> 
				 <img src="img/contact.png" class="img-responsive" style="width:100%;">
			</div>
				
	 		<div class="col-sm-5">
				<form method="post" action="enviaremailcontato.php" name="conta">
					<br/><br/>
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

	<?php 

		include 'rodape.html'

	?>
</body>
</html>