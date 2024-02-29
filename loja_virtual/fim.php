<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Cello Games | Finalizar  Compra</title>
    <link href="img/icone2.ico" rel="sortcut icon"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
		include 'conexao.php';	
		include 'nav.php';
		include 'cabecalho.html';
	?>
	<div class="container-fluid">
		<div class="row">
			<br><br>
			<div class="col-sm-4 col-sm-offset-4 text-center">
				<h2>Compra efetuada com sucesso!!<br>Seu número de registro é: 
					<p style="color: #0000FF;"><?php echo $ticket; ?></p>
				</h2>							
			</div>
		</div>
	</div>
	<br><br><br><br><br><br><br>
	<?php 
		include 'rodape.html' 
	?>
</body>
</html>
