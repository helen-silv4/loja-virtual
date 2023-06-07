<?php 
	session_start();
	session_destroy(); //destruição da sessão
	header('Location:index.php');
?>