<?php

	$servidor = "Localhost";
	$usuario = "root";
	$senha = "1234567";
	$banco = "loja_games";

	$cn = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
?>