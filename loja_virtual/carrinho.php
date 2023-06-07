<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Cello Games | Carrinho</title>
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
    
        session_start(); // iniciando sessão
        
        // verificando se usuário está logado
        if(empty($_SESSION['ID'])){ 
            header('location:formlogin.php'); // enviando para formlogon.php
        }
        
        include 'conexao.php';  // incluindo arquivo de conexão
        include 'nav.php'; // incluindo arquivo barra de navegação
        include 'cabecalho.html'; // incluindo cabeçalho
        
        // verificando se o codigo do produto NÃO está vazio
        if (!empty($_GET['cod'])) {
        
            // inserindo o código do produto na variável $cod_prod
            $cod_prod=$_GET['cod'];
            
            // se a sessão carrinho não estiver preenchida(setada)
            if (!isset($_SESSION['carrinho'])) {
                  // será criado uma sessão chamado carrinho para receber um vetor
                  $_SESSION['carrinho'] = array();
            }

            // se a variavel $cod_prod não estiver setado(preenchida)
            if (!isset($_SESSION['carrinho'][$cod_prod])) {
                // será adicionado um produto ao carrinho
                $_SESSION['carrinho'][$cod_prod]=1;
            }
            
            // caso contrario, se ela estiver setada, adicione novos produtos
            else {
                  $_SESSION['carrinho'][$cod_prod]+=1;
            }
                // incluindo o arquivo 'mostrar_carrinho.php'
                include 'mostrar_carrinho.php';
            
        } else {
            
            //mostrando o carrinho  vazio   
            include 'mostrar_carrinho.php';
            
        }   
    
    ?>
    
    <div class="container-fluid">
        <!-- exibindo o valor da variavel total da compra -->
        <div class="row text-center" style="margin-top: 15px;">
            <h1>Total: R$ <?php echo number_format($total,3,',','.'); ?> </h1>
        </div>
        
        <div class="row text-center" style="margin-top: 15px;">
            <a href="index.php"><button class="btn btn-lg btn-primary">Continuar Comprando</button></a>
            <?php if(count($_SESSION['carrinho']) > 0) { ?>
                <a href="finalizar_compra.php"><button class="btn btn-lg btn-success">Finalizar Compra</button></a>
            <?php } ?>    
        </div>
    </div>
    
    <br><br><br><br><br>
    <?php
        include 'rodape.html';
    ?>
    
</body>
</html>