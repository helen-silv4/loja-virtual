<?php
	$servidor = "Localhost";
	$usuario = "root";
	$senha = "";
	$banco = "loja_games";

	$cn = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
?>