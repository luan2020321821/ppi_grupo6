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
  <link href="css/style.plh.css" rel="stylesheet" />


</head>
<?php
session_start();

include "config.php";

$emaillogado = $_SESSION['email'];

$sqlx = "SELECT * FROM usuario WHERE usuario.email='$emaillogado'";
$query = mysql_query($sqlx) or die(mysql_error());
$puxa = mysql_fetch_array($query);

$nome = $puxa["nome"];
$classe = $puxa["membrocppd"];

?>

<body>
  <div class="hero_area">
    <header class="header_section">
      <div class="header_top">
        <div class="cppd-link">
          <span>
            <h1>CPPD</h1>
          </span>Comissão Permanente de Pessoal Docente
        </div>
        <div class="container-fluid">
          <div class="top_nav_container">
            <div>
              <img height="208" src="images/if_logo.png" class="goofy_image">
            </div>
            <div class="user_option_box">
              <a href="index.php" class="cart-link">
                <i class="fa fa-sign-out" aria-hidden="true"></i>
                <span>
                  Olá <b>
                    <?php echo $nome; ?>
                  </b>
                </span>
              </a>
              <a href="meu_usuario.php" class="cart-link">
                <i class="fa fa-id-card" aria-hidden="true"></i>
                <span>
                  Minhas Informações
                </span>
              </a>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="header_bottom">
        <div class="container-fluid">
          <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="membrocppd.php">
              <?php
              if ($classe == 1) {
                echo "<a class='nav-link'>Você está logado como: Membro da CPPD <span class='sr-only'></span></a>";
              } else {
                echo "<a class='nav-link' >Você está logado como: Professor <span class='sr-only'></span></a>";
              }
              ?>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""> </span>
            </button>
            <?php
            if ($classe == 1) {
              $classe1 = "membrocppd.php";
            } else {
              $classe1 = "restrito.php";
            }
            ?>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ">
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo $classe1; ?>">Home</a>
                </li>
                <?php
                if ($classe == 1) {
                  echo '<li class="nav-item">';
                  echo '<a class="nav-link" href="progressao.php">Progressão Docente</a>';
                  echo '</li>';
                }
                ?>
                <li class="nav-item  active">
                  <a class="nav-link" href="consulta.php">Consultar Progressão</a>
                </li>
                <?php
                if ($classe == 1) {
                  echo '<li class="nav-item">';
                  echo '<a class="nav-link" href="lista_usuarios.php">Lista de Usuários</a>';
                  echo '</li>';
                }
                ?>
                <li class="nav-item">
                  <a class="nav-link" href="">Histórico</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </header>


    <?php

    if (isset($_POST['submit'])) {
      $search_term = $_POST['search_term'];
      $conn = mysqli_connect('localhost', BD_USER, BD_PASS, BD_NAME);
      $sqlxi = "SELECT * FROM usuario WHERE nome LIKE '%$search_term%'";
      $result = mysqli_query($conn, $sqlxi);


    }

    if (isset($_POST['submit_membrocppd'])) {
      $user_id = $_POST['id_usuario'];
      $new_membrocppd_value = $_POST['membrocppd'];
      $conn = mysqli_connect('localhost', BD_USER, BD_PASS, BD_NAME);

      $sqlv = "SELECT membrocppd FROM usuario WHERE id_usuario = '$user_id'";
      $result = mysqli_query($conn, $sqlv);
      if ($result) {
        if (mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
          $membrocppd_value = $row['membrocppd'];

          echo "Progressão do usuario (ID $user_id): $membrocppd_value";
        } else {
          echo "Não há requerimentos disponiveis para consulta" . mysqli_error($conn);
        }
      } else {
        echo "Erro ao consultar a progressão" . mysqli_close($conn);
      }
    }


    ?>


    <?php


    if (isset($_SESSION['requerimento_existente'])) {
      $requerimento_existente = $_SESSION['requerimento_existente'];
    } else {

      $requerimento_existente = 0;
    }

    if ($requerimento_existente == 0) {
      echo '<div class="container">';
      echo '<div class="heading_container heading_center"> ';
      echo '<h2>';
      echo 'VOCÊ TEM UMA PROGRESSÃO DISPONÍVEL';
      echo '</h2>';
      echo '</div>';
      echo '</div>';

      echo '<div class="text-center mt-5"> ';
      echo '<a href="progressao.php" class="btn btn-primary" data-target="#parteModal">Iniciar Progressão</a>';
      echo '</div>';
    } else if ($requerimento_existente >= 1) {
      echo '<div class="container">';
      echo '<div class="heading_container heading_center"> ';
      echo '<h2>';
      echo 'Nenhuma progressão disponível no momento.';
      echo '</h2>';
      echo '<p>';
      $doisAnosEmSegundos = 60 * 60 * 24 * 365 * 2;
      $doisAnosEmAnos = floor($doisAnosEmSegundos / (60 * 60 * 24 * 365));
      $doisAnosEmMeses = floor(($doisAnosEmSegundos / (60 * 60 * 24 * 365)) / (60 * 60 * 24 * 30));
      $doisAnosEmDias = floor($doisAnosEmSegundos / ((60 * 60 * 24 * 30)) / (60 * 60 * 24));
      echo "Sua próxima progressão é daqui $doisAnosEmAnos anos $doisAnosEmMeses meses e $doisAnosEmDias dias.";
      echo '</p>';
      echo '</div>';
      echo '</div>';
    }







    ?>


    <?php

    $conn = mysqli_connect('localhost', BD_USER, BD_PASS, BD_NAME);
    $sqlProgressoes = "SELECT * FROM requerimentos";
    $resultProgressoes = mysqli_query($conn, $sqlProgressoes);

    ?>


    <?php

    if (isset($_POST['submit_progressao'])) {
      $conn = mysqli_connect('localhost', BD_USER, BD_PASS, BD_NAME);

      $emaillogado = $_SESSION['email'];
      $sqlRequerimento = "SELECT requerimento_existente FROM controle_requerimentos WHERE email='$emaillogado'";
      $resultRequerimento = mysqli_query($conn, $sqlRequerimento);

      if ($resultRequerimento) {
        $row = mysqli_fetch_assoc($resultRequerimento);
        $requerimento_existente = $row['requerimento_existente'];

        if ($requerimento_existente == 3) {
          echo '<div class="alert alert-success">Você tem uma progressão disponível.</div>';
        } else {
          echo '<div class="alert alert-warning">Você ainda não tem uma progressão disponível, espere o tempo limite.</div>';
          $sqlUpdate = "UPDATE controle_requerimentos SET requerimento_existente = 1 WHERE email='$emaillogado'";
          $resultUpdate = mysqli_query($conn, $sqlUpdate);
        }
      } else {
        echo 'Erro ao consultar o requerimento' . mysqli_error($conn);
      }
    }

    ?>



    <section class="info_section mt-5">
      <div class="container">
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
                    Informações
                  </h5>
                  <p>
                    Site ainda em desenvolvimento. Criado para a PPI da turma 34 no ano de 2023
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
                    </li>

                  </ul>
                </div>
              </div>
              <div class="col-md-3">
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
              </div>
            </div>
          </div>
        </section>
        <footer class="footer_section">
          <div class="container">
            <p>
              &copy; <span id="displayYear"></span> Todos os direitos reservados por
              <a href="https://html.design/">Grupo Davi, Gabriel Brizolla e Luan</a>
            </p>
          </div>
        </footer>
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/custom.js"></script>


</body>

</html>