<?php
	// iniciando a sessão, pois precisamos pegar o cd do usuario logado para salvar na tabela de vendas no campo cd_cliiente
	session_start();  

	include 'conexao.php';

	$data = date('Y-m-d');  // variavel que vai pegar a data do dia (ano mes dia -padrão do mysql)
	$ticket = uniqid();  // gerando um ticket com função uniqid(); 	gera um id unico    
	$cod_user = $_SESSION['ID'];  //recebendo o codigo do usuário logado, nesta pagina o usuario ja esta logado pois, em do carrinho de compra

	//// criando um loop para sessão carrinho q recebe o $cd e a quantidade
	foreach ($_SESSION['carrinho'] as $cd => $qnt)  {
	    $consulta = $cn->query("SELECT valor_preco FROM tbl_produto WHERE cod_produto='$cd'");
	    $exibe = $consulta->fetch(PDO::FETCH_ASSOC);
	    $preco = $exibe['valor_preco'];
	    
		
		$inserir = $cn->query("INSERT INTO tbl_venda(numero_ticket,cod_cliente,cod_produto,qtd_produto,valor_item,data_venda)  VALUES
		('$ticket','$cod_user','$cd','$qnt','$preco','$data')");
		
	}

	include 'fim.php';

?>