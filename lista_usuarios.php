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
              <a class="nav-link" href="index.php">Você está logado como: Membro da CPPD <span
                  class="sr-only"></span></a>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ">
                <li class="nav-item">
                  <a class="nav-link" href="membrocppd.php">Home</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="progressao.php">Progressão Docente <span class="sr-only">(current)</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="lista_usuarios.php">Lista de Usuários <span class="sr-only">(current)</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="consulta.php">Consultar Progressão</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </header>
    <section class="py-5">
      <div class="container px-4 px-lg-5 mt-5">
        <div class="row  justify-content-center">
          <div class="col mb-4">
            <div class="container text-center">
              <div class="row">
                <div class="col">

                  <!--<style>
              .search-container {
                width: 100%;
            }
            </style>-->

                  <form action="" method="post">
                    <div class="d-flex justify-content-center h-100">
                      <div class="searchbar">
                        <form method="post" action="">
                          <input class="search_input" type="text" name="search_term" placeholder="Pesquisar Usuário...">
                          <button type="submit" name="submit" class="search_icon"><i class="fa fa-search"></i></button>
                        </form>
                      </div>
                    </div>
                </div>
                </form>
    </section>
    <section class="py-5">
      <div class="container px-4 px-lg-5 mt-5">
        <div class="row  justify-content-center">
          <div class="col mb-4">
            <div class="container text-center">
              <div class="row">
                <div class="col">
                  <?php
                  if (isset($_POST['submit'])) {
                    $search_term = $_POST['search_term'];
                    $conn = mysqli_connect('localhost', BD_USER, BD_PASS, BD_NAME);
                    $sqlxi = "SELECT * FROM usuario WHERE nome LIKE '%$search_term%'";
                    $result = mysqli_query($conn, $sqlxi);

                    if (mysqli_num_rows($result) > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="pesquisa_usuario">';
                        echo "<b>ID de usuario: </b>" . $row['id_usuario'] . "<br>";
                        echo "<b>Nome: </b>" . $row['nome'] . "<br>";
                        echo "<b>Email: </b>" . $row['email'] . "<br>";
                        echo "<b>Titulação: </b>" . $row['titulacao'] . "<br>";
                        echo "<b>Membro CPPD: </b>" . ($row['membrocppd'] ? 'Sim' : 'Não') . "<br>";
                        echo '<form method="post"><input type="hidden" name="id_usuario" value="' . $row['id_usuario'] . '">';
                        echo '<input type="hidden" name="membrocppd" value="' . ($row['membrocppd'] ? 0 : 1) . '">';
                        echo '<input type="submit" class="btn btn-primary"name="submit_membrocppd" value="' . ($row['membrocppd'] ? 'Remover' : 'Adicionar') . ' membro CPPD"></form>';
                        echo '</div>';
                      }
                    } else {
                      echo '<p class="p_erro">Nenhum usuário encontrado.</p>';
                    }
                  }

                  if (isset($_POST['submit_membrocppd'])) {
                    $user_id = $_POST['id_usuario'];
                    $new_membrocppd_value = $_POST['membrocppd'];
                    $conn = mysqli_connect('localhost', BD_USER, BD_PASS, BD_NAME);

                    $sqlv = "UPDATE usuario SET membrocppd = '$new_membrocppd_value' WHERE id_usuario = '$user_id'";
                    $result = mysqli_query($conn, $sqlv);
                    if ($result) {
                      echo "Usuário atualizado com sucesso!";
                    } else {
                      echo "Erro atualizando o usuário: " . mysqli_error($conn);
                    }
                    mysqli_close($conn);
                  }

                  ?><!--
</section>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<section class="py-5">
  <div class="container px-4 px-lg-5 mt-5">
    <div class="row  justify-content-center">
      <div class="col mb-4">
        <div class="container text-center">
          <div class="row">
            <div class="col">
<? php /*
$sql = "SELECT * FROM usuario";
$conn = mysql_connect('localhost', BD_USER, BD_PASS); 
$result = mysql_query($sql, $conn);

while ($row = mysql_fetch_assoc($result)) {
echo '<div class="pesquisa_usuario">';
echo "ID de usuario: " . $row['id_usuario'] . "<br>";
echo "Nome: " . $row['nome'] . "<br>";
echo "Email: " . $row['email'] . "<br>";
echo "Titulação: " . $row['titulacao'] . "<br>";
echo "Membro CPPD: " . ($row['membrocppd'] ? 'Sim' : 'Não') . "<br>";
echo "</div>";


echo '<form class="" method="post">';
echo '<input type="hidden" name="id_usuario" value="' . $row['id_usuario'] . '">';  
echo '<input type="hidden" name="membrocppd" value="' . ($row['membrocppd'] ? 0 : 1) . '">';
echo '<input type="submit" class="btn btn-primary" name="submit_membrocppd" value="' . ($row['membrocppd'] ? 'Remover' : 'Adicionar') . ' membro CPPD">';
echo '</form>';

echo "<br><br>";
}

mysql_close($conn);

*/
  ?>
  

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>-->
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
          <a href="https://html.design/">Grupo Davi, Gabriel Brizola e Luan</a>
        </p>
      </div>
    </footer>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/custom.js"></script>


</body>

</html>