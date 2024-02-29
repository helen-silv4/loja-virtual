<?php
	session_start();
	$cod_prod=$_GET['cd'];
	unset($_SESSION['carrinho'][$cod_prod]);
	header('location:carrinho.php');
?>