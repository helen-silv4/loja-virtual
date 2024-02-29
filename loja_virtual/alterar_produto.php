<?php
	include 'conexao.php';  
	include 'resize-class.php'; // classe para redimensionar imagem

	$cod_produto = $_GET['cod_altera'];
	$consulta = $cn->query("SELECT descricao_capa FROM tbl_produto WHERE cod_produto = '$cod_produto'"); 
	$exibe = $consulta->fetch(PDO::FETCH_ASSOC);

	$categoria = $_POST['sltcategoria'];
	$produto = $_POST['txtnome'];
	$desenvolvedor = $_POST['sltdesenvolvedor'];
	$fornecedor = $_POST['sltfornecedor'];
	$preco = $_POST['txtpreco'];
	$qtde = $_POST['txtqtde'];
	$descricao = $_POST['txtdescricao'];
	$lanc = $_POST['sltlanc'];

	$remover1='.'; 
	$preco = str_replace($remover1, '', $preco); // substituindo . por vazio
	$remover2=',';
	$preco = str_replace($remover2, '.', $preco); // substituindo , por .

	$recebe_foto1 = $_FILES['txtfoto1']; 

	$destino = "img/";  

	if (!empty($recebe_foto1['name'])) { 
		preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_foto1['name'],$extencao1); 
		$img_nome1 = md5(uniqid(time())).".".$extencao1[1];
		$upload_foto1=1; // se variavel criada for 1 precisará trocar imagem
	}
	else {  
		$img_nome1=$exibe['descricao_capa'];
		$upload_foto1=0; 
	}
		
	try {
		$alterar = $cn->query (
			"UPDATE tbl_produto SET  
			cod_categoria_produto = '$categoria',
			nome_produto = '$produto',
			cod_desenvolvedor = '$desenvolvedor',
			cod_fornecedor = '$fornecedor',
			valor_preco = '$preco',
			qtd_estoque = '$qtde',
			descricao_produto = '$descricao',
			descricao_capa = '$img_nome1',
			sg_lancamento = '$lanc'
		
			WHERE cod_produto = '$cod_produto' 	
		"); 
		
		if ($upload_foto1==1) { 
			move_uploaded_file($recebe_foto1['tmp_name'], $destino.$img_nome1);             
			$resizeObj = new resize($destino.$img_nome1);
			$resizeObj -> resizeImage(271, 377, 'crop');
			$resizeObj -> saveImage($destino.$img_nome1, 100);
		}
		header('location:adm.php');
		
	} 
	catch(PDOException $e) { 
		echo $e->getMessage();  
	}
?>