<?php

	include 'conexao.php';  // incluindo a conexao
	include 'resize-class.php'; // classe para redimensionar imagem

	$cod_produto = $_GET['cod_altera'];  // variavel recebe o código do produto que recebemos do frm_alterar_produto.php

	// abaixo criando a consulta pelo codigo do produto que recebemos acima
	$consulta = $cn->query("SELECT descricao_capa FROM tbl_produto WHERE cod_produto = '$cod_produto'"); 

	//criando uma array 
	$exibe = $consulta->fetch(PDO::FETCH_ASSOC);

	// todas as alterações feitas nos campos serão salvas nas variaveis abaixo
	$categoria = $_POST['sltcategoria'];  // armazenando o valor de sltcategoriajogo na variavel $categoria
	$produto = $_POST['txtnome'];
	$desenvolvedor = $_POST['sltdesenvolvedor'];
	$fornecedor = $_POST['sltfornecedor'];
	$preco = $_POST['txtpreco'];
	$qtde = $_POST['txtqtde'];
	$descricao = $_POST['txtdescricao'];
	$lanc = $_POST['sltlanc'];

	$remover1='.';  // variável que vai receber o ponto
	$preco = str_replace($remover1, '', $preco); // substituindo . por vazio
	$remover2=','; // variável que vai receber a virgula
	$preco = str_replace($remover2, '.', $preco); // substituindo , por .

	$recebe_foto1 = $_FILES['txtfoto1'];  // recebendo conteudo do campo file

	$destino = "img/";  //pasta aonde será feito upload da imagem

	if (!empty($recebe_foto1['name'])) { // se a propriedade name [propriedade que pega o nome da imagem] não estiver vazia faça

		preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_foto1['name'],$extencao1); // pegar extensão
		$img_nome1 = md5(uniqid(time())).".".$extencao1[1]; //gerar nome unico para img, enviar esta variável

		$upload_foto1=1; // se variavel criada for 1 precisará trocar imagem

	}

	else {  // caso não haja alteração na imagem, pegar o nome da imagem que está no banco
		
		$img_nome1=$exibe['descricao_capa'];
		$upload_foto1=0;  // zero pq não fará atualização de fotos
		
	}
		
	try {
		// comando update para realizar as trocas
		$alterar = $cn->query("UPDATE tbl_produto SET  
		
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
		"); // as alterações serão feitas baseadas pelo codigo que recebemos
		
		if ($upload_foto1==1) {  // se a foto1 for igual a 1 é pq foi feito alteração será feita
			
			
			move_uploaded_file($recebe_foto1['tmp_name'], $destino.$img_nome1);             
			$resizeObj = new resize($destino.$img_nome1);
			$resizeObj -> resizeImage(271, 377, 'crop');
			$resizeObj -> saveImage($destino.$img_nome1, 100);
			
		}
		
		header('location:adm.php');  // redirecionando para a pagina menu principal (se tudo der certo)
		
	} catch(PDOException $e) {  // se existir algum problema, será gerado uma mensagem de erro
		echo $e->getMessage();  
	}

?>