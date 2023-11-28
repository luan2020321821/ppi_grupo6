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
            <!--<div class="user_option_box">
              <a href="index.php" class="cart-link">
                <i class="fa fa-sign-out" aria-hidden="true"></i>
                <span>
                  Olá <b><?php //echo $nome; ?></b>
                </span>
              </a>
              <a href="meu_usuario.php" class="cart-link">
                <i class="fa fa-id-card" aria-hidden="true"></i>
                <span>
                  Minhas Informações
                </span>
              </a>
              </a>
            </div>-->
          </div>
        </div>
      </div>
      <div class="header_bottom">
        <div class="container-fluid">
          <nav class="navbar navbar-expand-lg custom_nav-container ">
            <div class="fonte-logado">
              <span class="fonte-logado"><span>Olá <b>
                    <?php echo $nome; ?>
                  </b></span>, <br>você está logado como: Professor</span>
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="restrito.php"><i class="fa fa-home"></i> Home <span
                      class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="notificacoes.php"><i class="fa fa-bell"></i> Notificações</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="meu_usuario.php"><i class="fa fa-user"></i> Minhas Informações</a>
                </li>
                <li class="nav-item sair">
                  <a type="button" class="btn btn-danger btn" href="index.php"><i class="fa fa-sign-out"></i> Sair</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </header>
    <br>
    <!--INICIO DOS CARDS-->
    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center cards-tela-principal">
      <!--<div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
              <div class="card-header py-3">
                <h4 class="my-0 fw-normal"><i class="fa fa-pencil"></i> Formulário de Progressão</h4>
              </div>
              <div class="card-body">
                <div align="left">
                  <p><i class="fa fa-arrow-right"></i> Edite os formulários de progressão que os professores irão acessar.</p>
                  <p><i class="fa fa-arrow-right"></i> Você pode alterar as partes, as categorias e os critérios do formulário.</p>
                </div>
                <div id="botao-card">
                <a type="button" class="w-50 btn btn-lg btn-primary" href="progressao.php">Editar</a>
                </div>
              </div>
            </div>
          </div>
          
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
              <div class="card-header py-3">
                <h4 class="my-0 fw-normal"><i class="fa fa-file"></i> Avaliar Progressões</h4>
              </div>
              <div class="card-body ">
                <div align="left">
                  <p><i class="fa fa-arrow-right"></i> Avalie as progressões pendentes caso disponível.</p> 
                  <p><i class="fa fa-arrow-right"></i> Novas avaliações serão notificadas por e-mail.</p> 
                </div>
                <div id="botao-card">
                <a type="button" class="w-50 btn btn-lg btn-primary" href="#">Avaliar</a>
                </div>
              </div>
            </div>
          </div>

        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
              <div class="card-header py-3">
                <h4 class="my-0 fw-normal"><i class="fa fa-search"></i> Gerenciar Membros CPPD</h4>
              </div>
              <div class="card-body">
                <div align="left">
                  <p><i class="fa fa-arrow-right"></i> Liste os atuais Membros da CPPD.</p>
                  <p><i class="fa fa-arrow-right"></i> Você pode adicionar ou remover algum professor do cargo de membro.</p>
                  <p>** <i>Você não poderá remover a si mesmo.</i></p>
                </div>
                <div id="botao-card">
                <a type="button" class="w-50 btn btn-lg btn-primary" href="lista_usuarios.php">Gerenciar</a>
                </div>
              </div>
            </div>
          </div>-->

      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-header py-3">
            <h4 class="my-0 fw-normal"><i class="fa fa-calendar"></i> Consultar Progressão</h4>
          </div>
          <div class="card-body">
            <div align="left">
              <p><i class="fa fa-arrow-right"></i> Verifique se sua progressão funcional já está disponível.</p>
              <p><i class="fa fa-arrow-right"></i> Caso não esteja dinponível ainda será informada a data da próxima
                progressão.</p>
            </div>
            <div id="botao-card">
              <a type="button" class="w-50 btn btn-lg btn-primary" href="consulta.php">Consultar</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-header py-3">
            <h4 class="my-0 fw-normal"><i class="fa fa-history"></i> Meu Histórico</h4>
          </div>
          <div class="card-body">
            <div align="left">
              <p><i class="fa fa-arrow-right"></i> Veja todas as suas progressões já feitas até o momento.</p>
              <p><i class="fa fa-arrow-right"></i> Acesse os arquivos enviados anteriormente.</p>
            </div>
            <div id="botao-card">
              <a type="button" class="w-50 btn btn-lg btn-primary" href="historico.php">Acessar</a>
            </div>
          </div>
        </div>
      </div>
      </di>
    </div>
  </div>
  <!-- FIM DOS CARDS-->

  <section class="client_section layout_padding-bottom">
    <div class="container">

      <h2 align="center">
        Qual o objetivo do sistema da CPPD?
      </h2>

    </div>
    <div class="client_container ">
      <div id="carouselExample2Controls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container">
              <div class="box">
                <div class="detail-box">
                  <p>
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                  </p>
                  <p>
                    O objetivo desse sistema será calcular a progressão dos professores após 2 anos do progresso de
                    ensino, organizando os arquivos, facilitando a geração de documentos e modernizando o seu acesso e
                    uso.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container">
              <div class="box">
                <div class="detail-box">
                  <p>
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                  </p>
                  <p>
                    Nosso sistema foi feito a fim de modernizar, organizar e facilitar a CPPD, substituindo o sistema
                    antigo onde era manual e agora é em um sistema web.
                    Nosso sistema web funciona a partir de um cadastro que a comissão da CPPD irá fazer, esse é o
                    primeiro passo.
                    No segundo passo os professores irão ter acesso e vão poder consultar seus processos para ver se tem
                    a possibilidade de "subir de nível".
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container">
              <div class="box">
                <div class="detail-box">
                  <p>
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                  </p>
                  <p>
                    Eles poderão consultar a planilha onde contém o anexo dos documentos para serem enviados no sistema
                    a partir disso o usuário preenche os campos solicitados e com isso no final é gerado a pontuação
                    necessária para ele ser aprovado, porém após serem enviados (anexados) no sistema os membros da CPPD
                    irão fazer a avaliação e a verificação dos documentos solicitados e ver se a pontuação que foi
                    gerada é acessível com os documentos.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel_btn-box">
          <a class="carousel-control-prev" href="#carouselExample2Controls" role="button" data-slide="prev">
            <span>
              <i class="fa fa-angle-left" aria-hidden="true"></i>
            </span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExample2Controls" role="button" data-slide="next">
            <span>
              <i class="fa fa-angle-right" aria-hidden="true"></i>
            </span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </section>
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
              Sistema ainda em desenvolvimento. Criado para a PPI da turma 34 no ano de 2023
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
        <!--<div class="col-md-3">
          <div class="info_form ">
            <h5>
              Newsletter
            </h5>
            <form action="">
              <input type="email" placeholder="Enter your email">
              <button>
                Subscribe
              </button>
            </form>
            <div class="social_box">
              <a href="">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-youtube" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>-->
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