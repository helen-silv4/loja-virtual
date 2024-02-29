<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Cello Games</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home<span class="sr-only">(current)</span></a></li>
        <li><a href="lanc.php">Lançamentos</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Jogos<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="jogo.php?cat=Ação">Ação</a></li>
            <li><a href="jogo.php?cat=Aventura">Aventura</a></li>
            <li><a href="jogo.php?cat=Estratégia">Estratégia</a></li>
            <li><a href="jogo.php?cat=Esporte">Esporte</a></li>
            <li><a href="jogo.php?cat=Corrida">Corrida</a></li>
            <li><a href="jogo.php?cat=Simulação">Simulação</a></li>
            <li><a href="jogo.php?cat=Batalha">Batalha</a></li>
            <li><a href="jogo.php?cat=RPG">RPG (interpretação)</a></li>
            <li><a href="jogo.php?cat=FPS">FPS (tiro)</a></li>
            <li><a href="jogo.php?cat=MMO">MMO (multjogador)</a></li>
          </ul>
        </li> 
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Consoles<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="console.php?cat=Xbox">Xbox</a></li>
            <li><a href="console.php?cat=Playstation">Playstation</a></li>
            <li><a href="console.php?cat=Nintendo">Nintendo</a></li>
            <li><a href="console.php?cat=Munitor Gamer">Munitor Gamer</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Acessórios<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="acessorio.php?cat=Controles">Controles</a></li>
            <li><a href="acessorio.php?cat=Headset">Headset</a></li>
            <li><a href="acessorio.php?cat=Fones de ouvido">Fones de ouvido</a></li>
            <li><a href="acessorio.php?cat=Controle de mídia">Controle de mídia</a></li>
            <li><a href="acessorio.php?cat=Teclado/Mouse">Teclado / Mouse</a></li>
            <li><a href="acessorio.php?cat=Cabo USB/HDMI/Carregador">Cabo USB / HDMI / Carregador</a></li>
            <li><a href="acessorio.php?cat=Cabo de força">Cabo de força</a></li>
          </ul>
        </li>
        <li><a href="contato.php">Contato</a></li>
      </ul>
      <form class="navbar-form navbar-right" role="search" name="frmpesquisa" method="get" action="busca.php">
        <div class="form-group">
          <input type="text" class="form-control" id="busca" placeholder="Buscar" name="txtbuscar" >
        </div>
          <button type="submit" class="btn btn-sm btn-default" id="busca"><img src="img/lupa.png"></button>
      </form>

      <ul class="nav navbar-nav navbar-right">  
        <?php if(empty($_SESSION['ID'])) { ?>
          <li>
            <a href="formlogin.php">
              <span class="glyphicon glyphicon-log-in"> Login</span>
            </a>
          </li>
        <?php } else { 
          if($_SESSION['Status'] == 0) {
            $consulta_usuario = $cn->query("select nome_usuario from tbl_usuario where cod_usuario = '$_SESSION[ID]'");
            $exibe_usuario = $consulta_usuario->fetch(PDO::FETCH_ASSOC);
            ?>
            <li>
              <a href="area_user.php">
                <span class="glyphicon glyphicon-user"> <?php echo $exibe_usuario['nome_usuario'];?>
              </a>
            </li>

            <li>
              <a href="carrinho.php"><span class="glyphicon glyphicon-shopping-cart"></a>
            </li>

            <li>
              <a href="sair.php"><span class="glyphicon glyphicon-log-out"> Sair</a>
            </li>
          <?php } else { ?>
            <li>
              <a href="carrinho.php"><span class="glyphicon glyphicon-shopping-cart"></a>
            </li>

            <li>
              <a href="sair.php"><span class="glyphicon glyphicon-log-out"> Sair</a>
            </li>

            <li>
              <a href="adm.php">
                <button class="btn btn-sm btn-success" id="adm">Administrador</button>
              </a>
            </li>  
        <?php } } ?>
      </ul>
    </div>
  </div>
</nav>

