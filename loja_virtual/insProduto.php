<?php

	include 'conexao.php';  // include com arquivo de conexao
	include 'resize-class.php'; //classe que redimenciona o tamanho da imagem

	//variáveis que vão receber os dados do formulário que esta na pagina formJogo
	$cod_categoria= $_POST['sltcategoria'];  // recebendo o valor do campo select, valor numérico
	$nome_produto = $_POST['txtnomeproduto']; 
	$cod_desenvolvedor = $_POST['sltdesenvolvedor']; // recebendo o valor do campo select, valor numérico
	$cod_fornecedor = $_POST['sltfornecedor']; // recebendo o valor do campo select, valor numérico
	$valor_preco = $_POST['txtpreco'];
	$qtd_estoque = $_POST['txtqtde'];
	$descricao_produto = $_POST['txtdescricao'];
	$sl_lancamento= $_POST['sltlanc'];

	$remover1='.';  // criando variável e atribuindo o valor de ponto para ela
	$valor_preco = str_replace($remover1, '', $valor_preco); // removendo ponto de casa decimal,substituindo por vazio
	$remover2=','; // criando variável e atribuindo o valor de virgula para ela
	$valor_preco = str_replace($remover2, '.', $valor_preco); // removendo virgula de casa decimal,substituindo por ponto

	$recebe_foto1 = $_FILES['txtfoto1'];

	$destino = "img/";  // informando para qual diretorio será enviado a imagem

	//gerando número aleatorio para imagem
	// preg_match vai pegar imagens nas extensões jpg|jpeg|png|gif
	// do nome que esta na variavel $recebe_foto1 do parametro name e a $extensão vai receber o formato
	preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_foto1['name'],$extencao1);

	// a função md5 vai gerar um valor randomico  com base no horario "time"
	// incrementar o ponto e a extensão
	// função md5 é criado para gerar criptografia
	$img_nome1 = md5(uniqid(time())).".".$extencao1[1];

	try {  // try para tentar inserir
		
		$inserir=$cn->query("INSERT INTO tbl_produto(cod_categoria_produto, nome_produto, cod_desenvolvedor, cod_fornecedor, valor_preco, qtd_estoque, descricao_produto, descricao_capa, sg_lancamento) VALUES ('$cod_categoria', '$nome_produto', '$cod_desenvolvedor', '$cod_fornecedor', '$valor_preco', '$qtd_estoque', '$descricao_produto', '$img_nome1', '$sl_lancamento')");
		
		move_uploaded_file($recebe_foto1['tmp_name'], $destino.$img_nome1);             
		$resizeObj = new resize($destino.$img_nome1);
		$resizeObj -> resizeImage(271, 377, 'crop');
		$resizeObj -> saveImage($destino.$img_nome1, 100);

		header('location:index.php');
		
	}catch(PDOException $e) {  // se houver algum erro explodir na tela a mensagem de erro
		echo $e->getMessage();
	}

?>
