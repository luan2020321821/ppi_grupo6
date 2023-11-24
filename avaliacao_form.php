<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="icon" href="images/IF1.png" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Controle de Progressões CPPD</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet" />
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body>
  <?php
  session_start();

  include "config.php";

  $emaillogado = $_SESSION['email'];
  $sqlx = "SELECT * FROM usuario WHERE usuario.email='$emaillogado'";
  $query = mysql_query($sqlx) or die(mysql_error());
  $puxa = mysql_fetch_array($query);
  $nome = $puxa["nome"];
  $membrocppd = $puxa["membrocppd"];

  if ($membrocppd != 1) {
    header("Location: index.php");
    exit();
  }
  ?>

  <div class="hero_area">
    <header class="header_section">
      <div class="header_top">
        <div class="cppd-link">
          <span>
            <H1>CPPD</H1>
          </span> Comissão Permanente de Pessoal Docente
        </div>
        <div class="container-fluid">
          <div class="top_nav_container">
            <div class="logo_if" align="right">
              <img src="images/IFFar_logo.png">
            </div>
          </div>
        </div>
      </div>
      <div class="header_bottom">
        <div class="container-fluid">
          <nav class="navbar navbar-expand-lg custom_nav-container ">
            <div class="fonte-logado">
              <span class="fonte-logado"><span>Olá <b>
                    <?php echo $nome; ?>
                  </b></span>, <br>você está logado como: Membro CPPD</span>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ">
                <li class="nav-item ">
                  <a class="nav-link" href="membrocppd.php">
                    <h1 class="fa fa-home"></h1> Home <span class="sr-only">(current)</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="notificacoes.php"><i class="fa fa-bell"></i> Notificações</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="meu_usuario.php"><i class="fa fa-user"></i> Minhas Informações</a>
                </li>
                <li class="nav-item sair">
                  <a type="button" class=" btn btn-danger" href="index.php"><i class="fa fa-sign-out"></i> Sair</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </header>
    <br>

    <?php

    $sqlRequerimento_id = "SELECT id, titulo FROM requerimentos WHERE status = 'pendente' ORDER BY id DESC LIMIT 1";
    $result = mysql_query($sqlRequerimento_id) or die(mysql_error());

    while ($row = mysql_fetch_assoc($result)) {
      echo "<div class='requerimento'>";
      echo "<h2>" . $row['titulo'] . "</h2>";
      $requerimentoId = $row['id'];
      $requerimentoTitulo = $row['titulo'];
      echo "</div>";
    }


    ?>


    <h2>Avaliação do Requerimento Nº
      <?php echo "$requerimentoId" ?>
    </h2>
    <h2>Nome:
      <?php echo "$requerimentoTitulo" ?>
    </h2>
    
    <br>

    <h3>Corpo do formulário</h3>

    <br>
    <div align="center">
      <a href="aprovado.php"><button class="btn btn-info">Aprovado</button></a>
      <a href="reprovado.php"><button class="btn btn-danger">Reprovado</button></a>
    </div>
    <br>

    <section class="info_section ">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="info_contact">
              <h5>
                <a href="" class="navbar-brand">
                  <span>
                    Topo
                  </span>
                </a>
              </h5>
              <p>
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                IFFar Campus FW
              </p>
              <p>
                <i class="fa fa-phone" aria-hidden="true"></i>
                +01 123456789
              </p>
              <p>
                <i class="fa fa-envelope" aria-hidden="true"></i>
                cppd2023@iffar.edu.br
              </p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="info_info">
              <h5>
                <i class="fa fa-info"></i> Informações
              </h5>
              <p>
                Sistema ainda em desenvolvimento. Criado para a PPI da turma 34 no ano de 2023.
              </p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="info_links">
              <h5>
                Links Úteis
              </h5>
              <ul>
                <li>
                  <a href="index.php">
                    Home
                  </a>
                </li>
                <li>
                  <a href="https://www.iffarroupilha.edu.br/" target="_blank">IFFar</a>
                </li>
                <li>
                  <a href="https://sites.google.com/iffarroupilha.edu.br/cppd-fw/progress%C3%A3o-promo%C3%A7%C3%A3o?authuser=0"
                    target="_blank">Site da CPPD</a>
                </li>

              </ul>
            </div>
          </div>
          <div class="col-md-3">
            <div class="info_links">
              <h5>
                <i class="fa fa-users"></i> Membros CPPD
              </h5>
              <ul>
                <li>
                  <span><b>Quandale Dingle:</b></span>
                  <a href="mailto:quandale.dingle@iffarroupilha.edu.br?">quandale.dingle@iffarroupilha.edu.br</a>
                </li>
                <li>
                  <span><b>Quandale Dingle:</b></span>
                  <a href="mailto:quandale.dingle@iffarroupilha.edu.br?">quandale.dingle@iffarroupilha.edu.br</a>
                </li>
                <li>
                  <span><b>Quandale Dingle:</b></span>
                  <a href="mailto:quandale.dingle@iffarroupilha.edu.br?">quandale.dingle@iffarroupilha.edu.br</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <footer class="footer_section">
      <div class="container">
        <p>
          &copy; <span id="displayYear"></span> Todos os direitos reservados pelo
          <a href="https://html.design/">grupo: Davi, Gabriel Brizola e Luan</a>
        </p>
      </div>
    </footer>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/custom.js"></script>


</body>

</html>