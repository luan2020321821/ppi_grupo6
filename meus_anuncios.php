<!DOCTYPE html>
<html>

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
    <?php
            session_start();
            include "config.php";
            $emaillogado = $_SESSION['email'];
            $sqlx = "SELECT * FROM usuario WHERE usuario.email='$emaillogado'";
            $query = mysql_query($sqlx) or die (mysql_error());
            $puxa = mysql_fetch_array($query);
            $nome = $puxa["nome"];
            $id_usuario_ref = $puxa["id_usuario"];
    ?>

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
                  <a class="nav-link" href="meus_anuncios.php">Meus Anuncios <span class="sr-only">(current)</span></a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </header>
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Anúncios do Portal</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Aqui você visualiza nossos anuncios!</p>
                </div>
            </div>
        </header>
<?php
        $sql = "SELECT * FROM anuncio WHERE id_usuario_ref = $id_usuario_ref";
        $query = mysql_query($sql) or die(mysql_error());
        while ($row = mysql_fetch_assoc($query)) {
?>   
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div class="col mb-5">
                        <div class="card h-100">
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder"><?php echo '<td>' .$row['marca'].'</td>';   ?></h5>
                                    <h3 class="fw-bolder"><?php echo '<td>' .$row['modelo'].'</td>';   ?></h3>
                                    <h5 class="fw-bolder"><?php echo '<td>' .$row['anofabricacao']. '</td>';  ?></h5>
                                    <h5 class="fw-bolder"><?php echo '<td>' .$row['kilometragem'].'</td>';   ?> km</h5>
                                    <?php  echo '<a href="detalhes_anuncio.php?id_anuncio='.$row['id_anuncio'].'"> <img class="card-img-top" src="img/'.$row['foto'].'"/> </a>'; ?>
                                     <h3 class="fw-bolder"><br> R$ <?php   echo '<td>'.$row['valor'].'</td>';   ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php
}
?>



    </body>
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
</html>