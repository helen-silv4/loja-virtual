<?php

	include 'conexao.php'; 
	include 'resize-class.php';

	$cod_categoria= $_POST['sltcategoria'];  
	$nome_produto = $_POST['txtnomeproduto']; 
	$cod_desenvolvedor = $_POST['sltdesenvolvedor']; 
	$cod_fornecedor = $_POST['sltfornecedor'];
	$valor_preco = $_POST['txtpreco'];
	$qtd_estoque = $_POST['txtqtde'];
	$descricao_produto = $_POST['txtdescricao'];
	$sl_lancamento= $_POST['sltlanc'];

	$remover1='.'; 
	$valor_preco = str_replace($remover1, '', $valor_preco); 
	$remover2=',';
	$valor_preco = str_replace($remover2, '.', $valor_preco);

	$recebe_foto1 = $_FILES['txtfoto1'];

	$destino = "img/";  
	preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_foto1['name'],$extencao1);

	// a função md5 vai gerar um valor randomico  com base no horario "time"
	// incrementar o ponto e a extensão
	// função md5 é criado para gerar criptografia
	$img_nome1 = md5(uniqid(time())).".".$extencao1[1];

	try { 
		$inserir=$cn->query("INSERT INTO tbl_produto(cod_categoria_produto, nome_produto, cod_desenvolvedor, cod_fornecedor, valor_preco, qtd_estoque, descricao_produto, descricao_capa, sg_lancamento) VALUES ('$cod_categoria', '$nome_produto', '$cod_desenvolvedor', '$cod_fornecedor', '$valor_preco', '$qtd_estoque', '$descricao_produto', '$img_nome1', '$sl_lancamento')");
		
		move_uploaded_file($recebe_foto1['tmp_name'], $destino.$img_nome1);             
		$resizeObj = new resize($destino.$img_nome1);
		$resizeObj -> resizeImage(271, 377, 'crop');
		$resizeObj -> saveImage($destino.$img_nome1, 100);

		header('location:index.php');
	}
	catch(PDOException $e) {
		echo $e->getMessage();
	}
?>
