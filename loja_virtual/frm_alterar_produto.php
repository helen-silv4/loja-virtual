<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Cello Games | Alteração Produto</title>
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
		
		$cd = $_GET['id']; // id do produto
		$cd2 = $_GET['id2']; // id categoria 
		$cd3 = $_GET['id3']; // id desenvolvedor
		$cd4 = $_GET['id4']; // id fornecedor
		
		include 'conexao.php';	
		include 'nav.php';
		
		$consulta = $cn->query("SELECT * FROM tbl_produto WHERE cod_produto='$cd'");	
		$exibe = $consulta->fetch(PDO::FETCH_ASSOC);
		
		$consultaCat = $cn->query("SELECT cod_categoria_produto, descricao_categoria_produto FROM tbl_categoria_produto where cod_categoria_produto='$cd2' union select cod_categoria_produto, descricao_categoria_produto FROM tbl_categoria_produto where cod_categoria_produto !='$cd2'");
		
		$consultaDesenvolvedor = $cn->query("SELECT cod_desenvolvedor, nome_desenvolvedor FROM tbl_desenvolvedor where cod_desenvolvedor ='$cd3' union select cod_desenvolvedor, nome_desenvolvedor FROM tbl_desenvolvedor where cod_desenvolvedor !='$cd3'");

		$consultaFornecedor = $cn->query("SELECT cod_fornecedor, nome_fornecedor FROM tbl_fornecedor where cod_fornecedor ='$cd4' union select cod_fornecedor, nome_fornecedor FROM tbl_fornecedor where cod_fornecedor !='$cd4'");
	?>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4">
				<h2 align="center">Alteração de Produtos</h2>
				<form method="post" action="alterar_produto.php?cod_altera=<?php echo $cd; ?>" name="incluiProd" enctype="multipart/form-data">
					<div class="form-group">					
						<label for="sltcategoria">Categoria</label>
						<select class="form-control" name="sltcategoria">
							<?php					
								while($exibecat = $consultaCat->fetch(PDO::FETCH_ASSOC)){
							?>
							<option value="<?php echo $exibe['cod_categoria_produto'];?>"><?php echo $exibecat['descricao_categoria_produto'];?></option>;
							<?php }	?>	
						</select>
					</div>
					
					<div class="form-group">
						<label for="txtnome">Nome do Produto</label>
						<input type="text" name="txtnome" value="<?php echo $exibe['nome_produto']; ?>"  class="form-control" required id="txtnome">
					</div>
					
					<div class="form-group">					
						<label for="sltdesenvolvedor">Desenvolvedor</label>
						<select class="form-control" name="sltdesenvolvedor">
							<?php					
								while($exibedesenvolvedor = $consultaDesenvolvedor->fetch(PDO::FETCH_ASSOC)){
							?>
							<option value="<?php echo $exibedesenvolvedor['cod_desenvolvedor'];?>"><?php echo $exibedesenvolvedor['nome_desenvolvedor'];?></option>;
							<?php }	?>	
						</select>
					</div>

					<div class="form-group">					
						<label for="sltfornecedor">Fornecedor</label>
						<select class="form-control" name="sltfornecedor">
							<?php					
								while($exibefornecedor = $consultaFornecedor->fetch(PDO::FETCH_ASSOC)){
							?>
							<option value="<?php echo $exibefornecedor['cod_fornecedor'];?>"><?php echo $exibefornecedor['nome_fornecedor'];?></option>;
							<?php }	?>	
						</select>
					</div>
					
					<div class="form-group">
						<label for="txtpreco">Preço</label>
						<input type="text" class="form-control" required name="txtpreco" value="<?php echo $exibe['valor_preco']; ?>" id="txtpreco">
					</div>
					
					<div class="form-group">
						<label for="txtqtde">Quantidade em Estoque</label>
						<input type="number" class="form-control" name="txtqtde" value="<?php echo $exibe['qtd_estoque']; ?>" required id="txtqtde">
					</div>
					
					<div class="form-group">
						<label for="txtdescricao">Descrição do Produto</label>
						<textarea rows="5" class="form-control" name="txtdescricao"><?php echo $exibe['descricao_produto']; ?></textarea>
					</div>
					
					<div class="form-group">
						<label for="txtfoto1">Foto</label>
						<input type="file" accept="image/*" class="form-control" name="txtfoto1" id="txtfoto1">
					</div>
					
					<div class="form-group">
						<img src="img/<?php echo $exibe['descricao_capa']; ?>" width="100px" >
					</div>
					
					<div class="form-group">
						<label for="sltlanc">Lançamento?</label>
						<select class="form-control" name="sltlanc">					  				
							<option value="S" <?=($exibe['sg_lancamento'] == 'S')?'selected':''?>>Sim</option>	<option value="N" <?=($exibe['sg_lancamento'] == 'N')?'selected':''?>>Não</option>	  
						</select>
					</div>
						
					<button type="submit" class="btn btn-lg btn-default">
						<span class="glyphicon glyphicon-pencil"> Alterar </span>
					</button>
				</form>
			</div>
		</div>
	</div>
	<br><br><br>
</body>
</html>