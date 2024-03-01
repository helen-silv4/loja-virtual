<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Cello Games | Carrinho</title>
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
        
        if(empty($_SESSION['ID'])) { 
            header('location:formlogin.php');
        }
        
        include 'conexao.php';  
        include 'nav.php'; 
        
        if (!empty($_GET['cod'])) {
            $cod_prod=$_GET['cod'];
            
            if (!isset($_SESSION['carrinho'])) {
                  $_SESSION['carrinho'] = array();
            }

            if (!isset($_SESSION['carrinho'][$cod_prod])) {
                $_SESSION['carrinho'][$cod_prod]=1;
            }
            else {
                  $_SESSION['carrinho'][$cod_prod]+=1;
            }
            
            include 'mostrar_carrinho.php';  
        } 
        else { 
            include 'mostrar_carrinho.php';
        }   
    ?>
    
    <div class="container-fluid">
        <div class="row text-center" style="margin-top: 15px;">
            <h1>Total: R$ <?php echo number_format($total,3,',','.'); ?> </h1>
        </div>
        
        <div class="row text-center" style="margin-top: 15px;">
            <a href="index.php">
                <button class="btn btn-lg btn-primary">Continuar Comprando</button>
            </a>
            <?php if(count($_SESSION['carrinho']) > 0) { ?>
                <a href="finalizar_compra.php">
                    <button class="btn btn-lg btn-success">Finalizar Compra</button>
                </a>
            <?php } ?>    
        </div>
    </div>
    <br><br><br>
</body>
</html>