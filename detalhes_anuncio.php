<?php
include "config.php";

$q = @$_GET["id_anuncio"];

if ($q === null) {
        echo "Id do veículo não informado!";
        exit(1);
}

$sqlx = "SELECT * FROM anuncio WHERE id_anuncio=$q";
$query = mysql_query($sqlx) or die(mysqli_error());

$puxa = mysql_fetch_assoc($query);
if (!$puxa) {
    echo "Id inválido!";
    exit(1);
}
?>
        <?php
            session_start();

            $emaillogado = $_SESSION['email'];

             
            $sqlx1 = "SELECT * FROM usuario WHERE usuario.email='$emaillogado'";
            
            $query1 = mysql_query($sqlx1) or die (mysql_error());
            $puxa1 = mysql_fetch_array($query1);
            
            $nome = $puxa1["nome"];        
        ?>
<?php

  $sql = "SELECT * FROM usuario,anuncio WHERE $q = anuncio.id_anuncio AND anuncio.id_usuario_ref = usuario.id_usuario";
  $query2 = mysql_query($sql) or die(mysqli_error());
  $puxa2 = mysql_fetch_assoc($query2);

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="icon" href="images/fevicon.png" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>CarStore</title>


  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet" />
  <link href="css/responsive.css" rel="stylesheet" />

</head>
    <body>
    <header class="header_section">
      <div class="header_top">
        <div class="container-fluid">
          <div class="top_nav_container">
            <div class="contact_nav">
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Telefone: +00 00000-0000
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  Email : aaaaaaaa@gmail.com
                </span>
              </a>
            </div>
            <div class="user_option_box">
              <a href="index.php" class="cart-link">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span>
                  Olá <b><?php echo $nome; ?></b>
                </span>
              </a>
              <a href="" class="cart-link">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                <span>
                  Carrinho
                </span>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="header_bottom">
        <div class="container-fluid">
          <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="restrito.php">
              <span>
                CarStore
              </span>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ">
                <li class="nav-item">
                  <a class="nav-link" href="restrito.php">Home </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="anunciar.php">Anunciar</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="lista_anuncio.php">Lista de Anuncios <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="meus_anuncios.php">Meus Anuncios </a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Anúncio Detalhado</h1>
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
                                           <?php echo "<img class='ratio-16x9 card-img-top' src='img/".$puxa["foto"]."'     ' />"; ?>
                                        </div>
                                        <div class="col">
                                          <b>Marca:</b> <?php echo $puxa["marca"] ?> <br>
                                          <b>Modelo:</b> <?php echo $puxa["modelo"] ?> <br>
                                          <b>Combustivel:</b> <?php echo $puxa["combustivel"] ?> <br>
                                          <b>Cor:</b> <?php echo $puxa["cor"] ?> <br>
                                          <b>Ano de fabricação:</b> <?php echo $puxa["anofabricacao"] ?> <br>
                                          <b>Kilometragem:</b> <?php echo $puxa["kilometragem"] ?> <br>
                                          <b>Câmbio:</b> <?php echo $puxa["cambio"] ?> <br>
                                          <b>Valor:</b> <?php echo $puxa["valor"] ?> <br>
                                          <b>Descrição:</b><br> <?php echo $puxa["observacao"] ?> <br>  
                                          <b>Vendedor:</b><br> <?php echo $puxa2["nome"] ?> <br>
                                          <b>Email:</b><br> <?php echo $puxa2["email"] ?> <br>
                                          <b>Telefone:</b><br> <?php echo $puxa2["telefone"] ?>



                                        </div>
                                    
                                      </div>
                                    </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="https://html.design/">Davi CarStore</a>
      </p>
    </div>
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
              IFFar FW
            </p>
            <p>
              <i class="fa fa-phone" aria-hidden="true"></i>
              +00 00000-0000
            </p>
            <p>
              <i class="fa fa-envelope" aria-hidden="true"></i>
              davi.2021300067@iffar.edu.br
            </p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_info">
            <h5>
              Information
            </h5>
            <p>
              Site para aulas de programação
            </p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_links">
            <h5>
              Useful Link
            </h5>
            <ul>
              <li>
                <a href="restrito.php">
                  Home
                </a>
              </li>
              <li>
                <a href="anunciar.php">
                  Anunciar
                </a>
              </li>
              <li>
                <a href="lista_anuncio.php">
                  Lista de Anuncions
                </a>
              </li>
              <li>
                <a href="meus_anuncios.php">
                  Meus Anuncios
                </a>
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

  </footer>
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="https://html.design/">Davi CarStore</a>
      </p>
    </div>
  </footer>
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/custom.js"></script>
        <footer class="py-5 bg-dark">
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
