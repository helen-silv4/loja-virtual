<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Cello Games | Lista Produtos</title>
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
	
		session_start();	
		
		// se a sessão id estiver vazia ou se a sessão estatus for diferente de adm entao execute
		if(empty($_SESSION['Status']) || $_SESSION['Status'] != 1){
				header('location:index.php');  // redireciona para página index.php
		}
		
		include 'conexao.php';	
		include 'nav.php';
		include 'cabecalho.html';
		
		$consulta = $cn->query("SELECT * from tbl_produto");
	?>
	
	<div class="container-fluid">
		<?php 

			while ($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) {
		
		?>

		<div class="row" style="margin-top: 15px;">
			
			<div class="col-sm-1 col-sm-offset-1"><img src="img/<?php echo $exibe['descricao_capa']; ?>" class="img-responsive"></div>
			<div class="col-sm-5"><h4 style="padding-top:20px"><?php echo $exibe['nome_produto']; ?></h4></div>
			<div class="col-sm-2" style="padding-top:20px">	
				
			<a href="frm_alterar_produto.php?id=<?php echo $exibe['cod_produto'];?>&id2=<?php echo $exibe['cod_categoria_produto'];?>&id3=<?php echo $exibe['cod_desenvolvedor'];?>&id4=<?php echo $exibe['cod_fornecedor'];?>">
				<button class="btn btn-lg btn-block btn-default">
					<span class="glyphicon glyphicon-pencil"> Alterar</span>
				</button>
			</a>
			</div>
			
			<div class="col-sm-2 col-xs-offset-right-1" style="padding-top:20px">
				<a href="excluir_produto.php?id=<?php echo $exibe['cod_produto']; ?>">	
				<button class="btn btn-lg btn-block btn-danger">
				<span class="glyphicon glyphicon-remove"> Excluir</span>		
				</button>
				</a>
			</div> 
					
		</div>		
		
		<?php } ?>
	
	</div>

	<br><br><br>
	<?php
		include 'rodape.html';
	?>
	
</body>
</html>