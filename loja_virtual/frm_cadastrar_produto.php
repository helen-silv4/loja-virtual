<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cello Games | Cadastrar Produtos</title>
	<link href="img/icone2.ico" rel="sortcut icon"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="jquery.mask.js"></script>
	<script>
		$(document).ready(function(){
			$('#preco').mask('000.000.000.000.000,00', {reverse: true});
		});
	</script>
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

		$consultaCategoria = $cn->query("select * from tbl_categoria_produto");
		$consultaDesenvolvedor = $cn->query("select * from tbl_desenvolvedor");
		$consultaFornecedor = $cn->query("select * from tbl_fornecedor");
	?>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4">
				<h2 align="center">Inclusão de Produtos</h2>
				<form method="post" action="insProduto.php" name="incluiProd" enctype="multipart/form-data">
					<div class="form-group">					
						<label for="sltcategoria">Categoria</label>
						<select class="form-control" name="sltcategoria">
							<option value="">Selecione</option>
							<?php while ($listaCategoria = $consultaCategoria->fetch(PDO::FETCH_ASSOC)) { ?>
								<option value="<?php echo $listaCategoria['cod_categoria_produto']; ?>"><?php echo $listaCategoria['descricao_categoria_produto']; ?></option>	
							<?php } ?>				
						</select>
					</div>
					
					<div class="form-group">
						<label for="txtnomeproduto">Nome do Produto</label>
						<input name="txtnomeproduto" type="text" class="form-control" required id="txtnomeproduto">
					</div>
				
				    <div class="form-group">
						<label for="sltdesenvolvedor">Desenvolvedor</label>
						<select class="form-control" name="sltdesenvolvedor">
							<option value="">Selecione</option>
							<?php while ($listaDesenvolvedor = $consultaDesenvolvedor->fetch(PDO::FETCH_ASSOC)) { ?>
						  		<option value="<?php echo $listaDesenvolvedor['cod_desenvolvedor']; ?>"><?php echo $listaDesenvolvedor['nome_desenvolvedor']; ?></option>	
						  	<?php } ?>
						</select>
					</div>	

					<div class="form-group">
						<label for="sltfornecedor">Fornecedor</label>
						<select class="form-control" name="sltfornecedor">
							<option value="">Selecione</option>
							<?php while ($listaFornecedor = $consultaFornecedor->fetch(PDO::FETCH_ASSOC)) { ?>
						  		<option value="<?php echo $listaFornecedor['cod_fornecedor']; ?>"><?php echo $listaFornecedor['nome_fornecedor']; ?></option>	
						  	 <?php } ?>
						</select>
					</div>				
					
					<div class="form-group">
						<label for="txtpreco">Preço</label>
						<input type="text" class="form-control"  name="txtpreco"  required id="txtpreco">
					</div>
					
					<div class="form-group">
						<label for="txtqtde">Quantidade em Estoque</label>
						<input type="number" class="form-control" name="txtqtde" required id="txtqtde">
					</div>
					
					<div class="form-group">
						<label for="txtdescricao">Descrição do Produto</label>
						<textarea rows="5" class="form-control" name="txtdescricao"></textarea>
					</div>					
					
					<div class="form-group">
						<label for="txtfoto1">Foto</label>
						<input type="file" accept="image/*" class="form-control" name="txtfoto1" required id="txtfoto1">
					</div>
					
					<div class="form-group">
						<label for="sltlanc">Lançamento ?</label>
						<select class="form-control" name="sltlanc">
							<option value="">Selecione</option>
							<option value="S">Sim</option>
							<option value="N">Não</option>					  
						</select>
					</div>
			
					<button type="submit" class="btn btn-lg btn-default">
						<span class="glyphicon glyphicon-pencil"> Cadastrar </span>
					</button>
				</form>
			</div>
		</div>
	</div>
	<br><br><br>
</body>
</html>