<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Cello Games | Área Usuário</title>
    <link href="img/icone2.ico" rel="sortcut icon"/>
    <!--Responsividade-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!-- Imagens Rodapé-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
        .navbar{
            margin-bottom: 0;
        }
        
        #busca{
                height: 30px;
                margin-top: 7px;
        }
    </style> 	
</head>
<body>	
	
	<?php
	
		session_start();

		if(empty($_SESSION['ID'])){ 
            header('location:formlogin.php'); // enviando para formlogon.php
        } 
		
		include 'conexao.php';	
		include 'nav.php';
		include 'cabecalho.html';

		$cod_usuario = $_SESSION['ID'];
		$consulta_venda = $cn->query("select * from view_venda where cod_cliente = '$cod_usuario' group by numero_ticket");

	?>
	
	<div class="container-fluid">
		<div class="row" style="margin-top: 15px;">
			<b><h3 class="text-center">Minhas Compras</h3></b>
		</div>
		<div class="col-sm-10 col-sm-offset-1">
	    	<div class="row" style="margin-top: 15px;">
		        <table class="table table-hover">
		            <thead>
		            	<tr class="bg-primary">
		              		<th scope="col">Data</th>
		              		<th scope="col">Ticket</th>
		              		<th scope="col"></th>
		            	</tr>
		          	</thead>
		        	<tbody>
		            	<?php while($exibeVenda = $consulta_venda->fetch(PDO::FETCH_ASSOC)) { ?>
		                	<tr>
		                  		<th scope="row"><?php echo date('d/m/Y', strtotime($exibeVenda['data_venda']));?></th> <!--Convertendo a data para o formato brasileiro-->
		                  		<td><?php echo $exibeVenda['numero_ticket'];?></td>
		                  		<td><a href="ticket.php?ticket=<?php echo $exibeVenda['numero_ticket'];?>"><button class="btn btn-sm btn-success btn-block">Visualizar</button></a></td>
		                	</tr>
		            	<?php } ?> 
		        	</tbody>
		        </table>
	    	</div>
    	</div>    
  	</div>

	<br><br><br><br><br>
	<?php
		include 'rodape.html';
	?>
	
</body>
</html>