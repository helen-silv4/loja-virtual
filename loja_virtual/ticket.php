<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Cello Games | Ticket</title>
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
		session_start();
		
		if (empty($_SESSION['ID'])) {
			header('location:formlogin.php');
		}
		
		include 'conexao.php';	
		include 'nav.php';
		include 'cabecalho.html';
		
		$ticket_compra=$_GET['ticket'];
		$consulta_venda = $cn->query("SELECT * FROM view_Venda WHERE numero_ticket='$ticket_compra'");
	?>
	
	<div class="container-fluid">
		<div class="row" style="margin-top: 15px;">
			<h3 class="text-center">Compra: <?php echo $ticket_compra ?></h3>
		</div>

		<div class="col-sm-10 col-sm-offset-1">
	        <div class="row" style="margin-top: 15px;">
	            <table class="table table-hover">
	                <thead>
		                <tr class="bg-primary">
		                    <th scope="col">Data</th>
		                    <th scope="col">Ticket</th>
		                    <th scope="col">Produto</th>
		                    <th scope="col">Quantidade</th>
		                    <th scope="col">Preço</th>
		                </tr>
	                </thead>
					<?php
						$total=0;								
						while ($exibeVenda=$consulta_venda->fetch(PDO::FETCH_ASSOC)) {		
						$total += $exibeVenda['valor_total_item'];
					?>
					<tbody>
	                    <th scope="row"><?php echo date('d/m/Y', strtotime($exibeVenda['data_venda']));?></th> <!--Convertendo a data para o formato brasileiro-->
	                        <td><?php echo $exibeVenda['numero_ticket'];?></td>
	                        <td><?php echo $exibeVenda['nome_produto'];?></td>
	                        <td><?php echo $exibeVenda['qtd_produto'];?></td>
	                        <td><?php echo number_format($exibeVenda['valor_total_item'],3,',','.');?></td> <!--Exibibir o valor com três casas decimais e onde estiver '.' substituir por ','-->
                        </tr>
                        <?php } ?>
              		</tbody>
              	</table>
        	</div>
     	</div> 
    </div>

    <div class="container-fluid">
    	<div class="row" style="margin-top: 15px;">
			<h3 class="text-center">Total: R$ <?php echo number_format($total,3,',','.');?></h3>
		</div>
    </div>

	<br><br><br><br><br>
	<?php
		include 'rodape.html';
	?>
</body>
</html>