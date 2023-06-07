<!DOCTYPE html>
<html lang="pt-br">
	<heade>
		<meta charset="utf-8"/>
		<title>Mostrar Produtos</title>
	</head>
	<bory>
		<?php
			include 'conexao.php';
			//variável $consulta vai receber variável $cn que receberá o resultado de uma query 
			$consulta = $cn->query('select * from view_produto');
			//variável $exibe receberá o resultado da consulta em forma de uma matriz tabela
			while ($exibe = $consulta->fetch(PDO::FETCH_ASSOC)){
				echo $exibe['descricao_categoria_produto'].'<br/>';
				echo $exibe['nome_produto'].'<br/>';
				echo $exibe['nome_desenvolvedor'].'<br/>';
				echo $exibe['nome_fornecedor'].'<br/>';
				echo $exibe['valor_preco'].'<br/>';
				echo $exibe['qtd_estoque'].'<br/>';
				echo $exibe['descricao_produto'].'<br/>';
				echo $exibe['sg_lancamento'].'<br/>';
				echo '<hr/>';
			}
		?>
	</bory>
</html>