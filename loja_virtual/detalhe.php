<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Cello Games | Detalhes</title>
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
		include 'conexao.php';	
		
		if(!empty($_GET['cod'])) { 
			$cod_produto = $_GET['cod'];

			$consulta = $cn->query("select * from view_produto where cod_produto = '$cod_produto'");
			$exibe =  $consulta->fetch(PDO::FETCH_ASSOC);
		} 
		else {
			header("location:index.php");
		}

		include 'nav.php';
		include 'cabecalho.html';
	?>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-1">
				<h2>
					<strong>Detalhes do Produto</strong>
				</h2>
				<img src="img/<?php echo $exibe['descricao_capa'];?>" class="img-responsive" style="width:100%;">
			</div>
				
	 		<div class="col-sm-6">
				<br><br>
				<h3><?php echo $exibe['nome_produto'];?></h3>
				<p><?php echo $exibe['descricao_produto'];?></p>
				<p>
					<strong><?php echo $exibe['nome_desenvolvedor'];?></strong>
				</p>
				<div>
					<?php
						echo '<h4>R$ ' . $exibe['valor_preco'] . '</h4>';
					?>
				</div>
				<a href="carrinho.php?cod=<?php echo $exibe['cod_produto'];?>">
					<button class="btn btn-lg btn-success">Comprar</button>
				</a>
			</div>		
		</div>
	</div>	
	<br><br><br>
	<?php 
		include 'rodape.html'; 
	?>
</body>
</html>