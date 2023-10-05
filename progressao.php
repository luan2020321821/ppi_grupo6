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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
  $email = $puxa["email"];
  $telefone = $puxa["telefone"];
  $siape = $puxa["siape"];
  $titulacao = $puxa["titulacao"];
  $cpf = $puxa["cpf"];


  $sql_check_requerimento = "SELECT requerimento_existente FROM controle_requerimentos WHERE usuario_id = (SELECT id_usuario FROM usuario WHERE email='$emaillogado')";
  $query_check_requerimento = mysql_query($sql_check_requerimento) or die(mysql_error());
  $result_check_requerimento = mysql_fetch_assoc($query_check_requerimento);



  if (!empty($result_check_requerimento)) {
    $requerimento_existente = $result_check_requerimento['requerimento_existente'];
  } else {

    $requerimento_existente = !0;
  }
  ?>


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
                  <a class="nav-link" href="membrocppd.php">Home</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="progressao.php">Progressão Docente <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="lista_usuarios.php">Lista de Usuários</a>
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
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Formulário de Progressão
        </h2>
      </div>
    </div>
    <div class="heading_container heading_center" id="account" role="tabpanel" aria-labelledby="account-tab">
      <h3 class="mb-4">Informações Pessoais</h3>
      <div class="form-group">
        <label for="nome" class="texto-form">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $nome; ?>" readonly>
      </div>
      <div class="form-group">
        <label for="email" class="texto-form">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" readonly>
      </div>
      <div class="form-group">
        <label for="telefone" class="texto-form">Telefone</label>
        <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $telefone; ?>" readonly>
      </div>
      <div class="form-group">
        <label for="siape" class="texto-form">Siape</label>
        <input type="text" class="form-control" id="siape" name="siape" value="<?php echo $siape; ?>" readonly>
      </div>
      <div class="form-group">
        <label for="titulacao" class="texto-form">Titulação</label>
        <input type="text" class="form-control" id="titulacao" name="titulacao" value="<?php echo $titulacao; ?>"
          readonly>
      </div>
      <div class="form-group">
        <label for="cpf" class="texto-form">CPF</label>
        <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $cpf; ?>" readonly>
      </div>
    </div>


    <div class="formbold-main-wrapper">
      <?php
      $sql = "SELECT COUNT(*) AS total_requerimentos FROM requerimentos WHERE usuario_id = (SELECT id_usuario FROM usuario WHERE email='$emaillogado')";
      $query = mysql_query($sql) or die(mysql_error());
      $result = mysql_fetch_assoc($query);


      if ($result['total_requerimentos'] == 0) {

        ?>
        <button class='btn btn-primary' data-toggle='modal' data-target='#requerimentoModal'>Criar Requerimento</button>

        <?php
      }
      ?>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

      <div class="modal fade" id="requerimentoModal" tabindex="-1" role="dialog"
        aria-labelledby="requerimentoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="requerimentoModalLabel">Novo Requerimento</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="requerimento.php" method="post">
              <div class="modal-body">
                <div class="form-group">
                  <label for="titulo">Nome</label>
                  <input type="text" class="form-control" id="titulo" name="titulo">
                </div>
                <div class="form-group">
                  <label for="descricao" class="criterios-section">Descrição</label>
                  <textarea class="form-control" id="descricao" name="descricao"></textarea>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="heading_container heading_center">
      <div class="requerimentos-section">
        <?php
        $emaillogado = $_SESSION['email'];
        $sql = "SELECT * FROM requerimentos WHERE usuario_id=(SELECT id_usuario FROM usuario WHERE email='$emaillogado')";
        $result = mysql_query($sql) or die(mysql_error());

        while ($row = mysql_fetch_assoc($result)) {
          echo "<div class='requerimento'>";
          echo "<h2>" . $row['titulo'] . "</h2>";
          echo "<p>" . $row['descricao'] . "</p>";
          echo "<button class='btn btn-primary' data-toggle='modal' data-target='#parteModal' data-id='" . $row['id'] . "'>Criar Parte</button>";
          echo "</div>";
        }

        ?>
        <?php
        $emaillogado = $_SESSION['email'];


        $sqlPartes = "SELECT * FROM partes WHERE idrequerimentos=(SELECT id FROM requerimentos WHERE usuario_id=(SELECT id_usuario FROM usuario WHERE email='$emaillogado') ORDER BY idrequerimentos DESC LIMIT 1)";
        $resultPartes = mysql_query($sqlPartes) or die(mysql_error());

        while ($rowParte = mysql_fetch_assoc($resultPartes)) {
          echo "<div class='partes-section'>";
          echo "<div class='parte'>";
          echo "<h2>" . $rowParte['descricao'] . "</h2>";
          echo "<a href='delete_parte.php?id=" . $rowParte['id'] . "' class='btn btn-danger'>Excluir</a>"; // Botão de exclusão
          echo "<button class='btn btn-primary' data-toggle='modal' data-target='#categoriaModal' data-id='" . $rowParte['id'] . "'>Criar Categoria</button>";


          $parteId = $rowParte['id'];
          $sqlCategorias = "SELECT * FROM categorias WHERE parte_id=$parteId";
          $resultCategorias = mysql_query($sqlCategorias) or die(mysql_error());

          while ($rowCategoria = mysql_fetch_assoc($resultCategorias)) {
            echo "<div class='categorias-section'>";
            echo "<h2>" . $rowCategoria['descricao'] . "</h2>";
            echo "<a href='delete_categoria.php?id=" . $rowCategoria['id'] . "' class='btn btn-danger'>Excluir</a>"; // Botão de exclusão
            echo "<button class='btn btn-primary' data-toggle='modal' data-target='#criterioModal' data-id='" . $rowCategoria['id'] . "'>Criar Critério</button>";



            $categoriaId = $rowCategoria['id'];
            $sqlCriterios = "SELECT * FROM criterios WHERE categoria_id=$categoriaId";
            $resultCriterios = mysql_query($sqlCriterios) or die(mysql_error());

            while ($rowCriterio = mysql_fetch_assoc($resultCriterios)) {
              echo "<div class='criterios-section'>";
              echo "<h2>" . $rowCriterio['descricao'] . "</h2>";
              echo "<p>" . $rowCriterio['pontos'] . "</p>";
              echo "<a href='delete_criterio.php?id=" . $rowCriterio['id'] . "' class='btn btn-danger'>Excluir</a>"; // Botão de exclusão
              echo "</div>";
            }

            echo "</div>";
          }

          echo "</div>";
          echo "</div>";
        }


        ?>
        <script>
          $(document).ready(function () {

            $('#parteModal').on('show.bs.modal', function (e) {
              var requerimentoId = $(e.relatedTarget).data('id');
              $(this).find('[name="requerimento_id"]').val(requerimentoId);
            });

            $('#categoriaModal').on('show.bs.modal', function (e) {
              var parteId = $(e.relatedTarget).data('id');
              $(this).find('[name="parte_id"]').val(parteId);
            });

            $('#criterioModal').on('show.bs.modal', function (e) {
              var categoriaId = $(e.relatedTarget).data('id');
              $(this).find('[name="categoria_id"]').val(categoriaId);
            });
          });
        </script>
        <div class="modal fade" id="parteModal" tabindex="-1" role="dialog" aria-labelledby="parteModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="parteModalLabel">Nova Parte</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="parte.php" method="post">
                <div class="modal-body">
                  <input type="hidden" name="requerimento_id" value="">
                  <div class="form-group">
                    <label for="descricao">Nome</label>
                    <input type="text" class="form-control" id="descricao" name="descricao">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                  <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
              </form>
            </div>
          </div>
        </div>



        <div class="modal fade" id="categoriaModal" tabindex="-1" role="dialog" aria-labelledby="categoriaModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="categoriaModalLabel">Nova Categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="categoria.php" method="post">
                <div class="modal-body">
                  <input type="hidden" name="parte_id" value=""> 
                  <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea class="form-control" id="descricao" name="descricao"></textarea>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                  <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
              </form>
            </div>
          </div>
        </div>




        <div class="modal fade" id="criterioModal" tabindex="-1" role="dialog" aria-labelledby="criterioModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="criterioModalLabel">Novo Critério</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="criterio.php" method="post">
                <div class="modal-body">
                  <input type="hidden" name="categoria_id" value="">
                  <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea class="form-control" id="descricao" name="descricao"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="pontos">Valor</label>
                    <input type="number" class="form-control" id="pontos" name="pontos">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                  <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
              </form>
            </div>
          </div>
        </div>



      </div>
      <a href='enviar_requerimento.php?id=" . $rowParte[' id'] class='btn btn-primary'>Enviar Requerimento</a>
    </div>
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