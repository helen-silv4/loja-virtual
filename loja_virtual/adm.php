<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cello Games | Administrador</title>
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
		session_start();
		if(empty($_SESSION['Status']) || $_SESSION['Status'] != 1){
			header('location:index.php');
		}

		include 'conexao.php';	
		include 'nav.php';
	?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4 text-center">
				<br>
				<h2>Área administrativa</h2>
				
				
				<a href="frm_cadastrar_produto.php">			
					<button type="submit" class="btn btn-block btn-lg btn-primary">
						Incluir Produto
					</button>
				</a>	
				<br>
				
				<a href="lista_produto.php">	
					<button type="submit" class="btn btn-block btn-lg btn-primary">
						Alterar / Excluir Produto
					</button>
				</a>
				<br>
				
				<a href="venda.php">
					<button type="submit" class="btn btn-block btn-lg btn-primary">
						Vendas
					</button>
				</a>
				<br>
				
				<a href="sair.php">
					<button type="submit" class="btn btn-block btn-lg btn-danger">
						Sair da àrea administrativa
					</button>
				</a>
			</div>
		</div>
	</div>
	<br><br><br>	
</body>
</html>