<?php
	session_start();  
	include 'conexao.php';

	$data = date('Y-m-d'); 
	$ticket = uniqid();     
	$cod_user = $_SESSION['ID']; 

	foreach ($_SESSION['carrinho'] as $cd => $qnt)  {
	    $consulta = $cn->query("SELECT valor_preco FROM tbl_produto WHERE cod_produto='$cd'");
	    $exibe = $consulta->fetch(PDO::FETCH_ASSOC);
	    $preco = $exibe['valor_preco'];
	    
		$inserir = $cn->query("INSERT INTO tbl_venda(numero_ticket,cod_cliente,cod_produto,qtd_produto,valor_item,data_venda)  VALUES
		('$ticket','$cod_user','$cd','$qnt','$preco','$data')");
	}

	include 'fim.php';
?>