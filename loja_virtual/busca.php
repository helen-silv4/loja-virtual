<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Cello Games | Busca</title>
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
		include 'nav.php';
		include 'cabecalho.html';

		if(empty($_GET['txtbuscar'])){
			echo "<html><script>location.href='index.php';</script></html>";
		}

		$pesquisa = $_GET['txtbuscar'];
		$consulta = $cn->query("select * from view_produto where nome_produto like concat ('%','$pesquisa','%') or nome_desenvolvedor like concat ('%','$pesquisa','%')");
		
		if($consulta->rowCount() == 0){
			echo "<html><script>location.href='erro2.php';</script></html>";
		}

	?>
	
	<div class="container-fluid">
		<?php while($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) {?>
			<div class="row" style="margin-top: 15px;">
				<div class="col-sm-1 col-sm-offset-1">
					<img src="img/<?php echo $exibe['descricao_capa']; ?>" class="img-responsive">
				</div>
				<div class="col-sm-5">
					<h4 style="padding-top:20px"><?php echo $exibe['nome_produto']; ?></h4>
				</div>
				<div class="col-sm-2">
					<h4 style="padding-top:20px">R$ <?php echo number_format($exibe['valor_preco'],2,',','.'); ?></h4>
				</div>
				<div class="col-sm-2 col-xs-offset-right-1" style="padding-top:20px">
					<a href="detalhe.php?cod=<?php echo $exibe['cod_produto'];?>">
						<button class="btn btn-lg btn-block btn-info">	
							<span class="glyphicon glyphicon-info-sign"> Detalhes</span>
						</button>
					</a>
				</div> 		
			</div>		
		<?php } ?>
	</div>

	<br><br><br><br><br><br><br><br><br><br>
	<?php
		include 'rodape.html';
	?>
</body>
</html>