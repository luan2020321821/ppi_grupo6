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
  if (isset($_SESSION['formulario_enviado']) && $_SESSION['formulario_enviado']) {
    echo "<script>alert('Formulário enviado com sucesso!');</script>"; // ou código para mostrar um modal mais elaborado
    unset($_SESSION['formulario_enviado']);
  }
  $sqlx = "SELECT * FROM usuario WHERE usuario.email='$emaillogado'";

  $query = mysql_query($sqlx) or die(mysql_error());
  $puxa = mysql_fetch_array($query);

  $nome = $puxa["nome"];
  $email = $puxa["email"];
  $telefone = $puxa["telefone"];
  $siape = $puxa["siape"];
  $titulacao = $puxa["titulacao"];
  //$cpf = $puxa["cpf"];
  $nivel = $puxa["Nivel"];
  $classe = $puxa["membrocppd"];

  $sql_check_requerimento = "SELECT requerimento_existente FROM controle_requerimentos WHERE usuario_id = (SELECT id_usuario FROM usuario WHERE email='$emaillogado')";
  $query_check_requerimento = mysql_query($sql_check_requerimento) or die(mysql_error());
  $result_check_requerimento = mysql_fetch_assoc($query_check_requerimento);



  if (!empty($result_check_requerimento)) {
    $requerimento_existente = $result_check_requerimento['requerimento_existente'];
  } else {

    $requerimento_existente = !0;
  }
  ?>
  <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="successModalLabel">Sucesso</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Formulário enviado com sucesso!
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Script para mostrar o modal
    <?php if (isset($_SESSION['formulario_enviado']) && $_SESSION['formulario_enviado']): ?>
      $(document).ready(function () {
        $('#successModal').modal('show');
      });
      <?php unset($_SESSION['formulario_enviado']); ?>
    <?php endif; ?>
  </script>
  <?php
  $classe = $puxa["membrocppd"];

  if ($classe == 1) {
    $classe1 = "membrocppd.php";
    $classe2 = "Membro CPPD";
  } else {
    $classe1 = "restrito.php";
    $classe2 = "Professor";
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
                  </b></span>, <br>você está logado como:
                <?php echo "$classe2"; ?>
              </span>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ">
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo "$classe1"; ?>">
                    <h1 class="fa fa-home"></h1> Home <span class="sr-only">(current)</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="notificoes.php"><i class="fa fa-bell"></i> Notificações</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="meu_usuario.php"><i class="fa fa-user"></i> Minhas Informações</a>
                </li>
                <li class="nav-item sair">
                  <a type="button" class=" btn btn-danger btn" href="index.php"><i class="fa fa-sign-out"></i> Sair</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </header>
    <br>
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Formulário de Progressão
        </h2>
      </div>
    </div>
    <div class="heading_container heading_center" id="account-form" role="tabpanel" aria-labelledby="account-tab">
      <h3 class="mb-3">Informações Pessoais</h3>
      <div class="row">
        <div class="col-md-3 mb-3">
          <label for="nome" class="texto-form">Nome</label>
          <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $nome; ?>" readonly>
        </div>

        <div class="col-md-3 mb-3">
          <label class="texto-form">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" readonly>
        </div>

        <div class="col-md-3 mb-3">
          <label for="telefone" class="texto-form">Telefone</label>
          <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $telefone; ?>"
            readonly>
        </div>

        <div class="col-md-3 mb-3">
          <label for="siape" class="texto-form">Siape</label>
          <input type="text" class="form-control" id="siape" name="siape" value="<?php echo $siape; ?>" readonly>
        </div>

        <div class="col-md-3 mb-3">
          <label for="titulacao" class="texto-form">Titulação</label>
          <input type="text" class="form-control" id="titulacao" name="titulacao" value="<?php echo $titulacao; ?>"
            readonly>
        </div>

        <div class="col-md-3 mb-3">
          <label for="nivel" class="texto-form">Classe/Nível Atual</label>
          <input type="text" class="form-control" id="nivel" name="Nivel" value="
          <?php list($classe, $nivel) = explode("_0", $nivel);
          echo "Classe: $classe Nível: $nivel" ?>" readonly>
        </div>
      </div>
    </div>


    <div class="formbold-main-wrapper">
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
        $sql = "SELECT * FROM requerimentos WHERE status='base'";
        $result = mysql_query($sql) or die(mysql_error());

        while ($row = mysql_fetch_assoc($result)) {
          echo "<div class='requerimento'>";
          echo "<h2>" . $row['titulo'] . "</h2>";
          echo "<p>" . $row['descricao'] . "</p>";

          $requerimentoId = $row['id'];
          $sqlPartes = "SELECT * FROM partes WHERE idrequerimentos=$requerimentoId";
          $resultPartes = mysql_query($sqlPartes) or die(mysql_error());

          while ($rowParte = mysql_fetch_assoc($resultPartes)) {
            echo "<div class='partes-section'>";
            echo "<h1>" . $rowParte['descricao'] . "</h1>";

            $parteId = $rowParte['id'];
            $sqlCategorias = "SELECT * FROM categorias WHERE parte_id=$parteId";
            $resultCategorias = mysql_query($sqlCategorias) or die(mysql_error());

            while ($rowCategoria = mysql_fetch_assoc($resultCategorias)) {
              echo "<div class='categorias-section'>";
              echo "<h2>" . $rowCategoria['descricao'] . "</h2>";
              // Dentro do loop da categoria
              if ($rowCategoria['tipo_categoria'] == 0) {
                echo "<input type='text' class='form-control descricao-resposta' id='descricao_resposta_" . $rowCategoria['id'] . "' name='descricao_resposta_" . $rowCategoria['id'] . "'>";
              }


              $categoriaId = $rowCategoria['id'];
              $sqlCriterios = "SELECT * FROM criterios WHERE categoria_id=$categoriaId";
              $resultCriterios = mysql_query($sqlCriterios) or die(mysql_error());

              while ($rowCriterio = mysql_fetch_assoc($resultCriterios)) {
                echo "<div class='criterios-section'>";
                echo "<h1>" . $rowCriterio['descricao'] . "</h1>";

                if ($rowCriterio['pontos'] != 0) {
                  $tipoCriterioMsg = $rowCriterio['tipo_criterio'] ? "Quantidade Máxima de Pontos: " : "Quantidade de Pontos por Item: ";
                  $inputLabel = $rowCriterio['tipo_criterio'] ? "Quantidade de Pontos" : "Quantidade de Itens";
                  echo "<h4 class='pontos'>" . $tipoCriterioMsg . $rowCriterio['pontos'] . "</h4>";

                  // Caixa para resposta numérica
                  echo "<div class='quantidade-resposta'>";
                  echo "<label for='quantidade_resposta_" . $rowCriterio['id'] . "'>" . $inputLabel . "</label>";
                  // Dentro do loop do critério
                  $tipoCalculo = $rowCriterio['tipo_criterio'] ? 'soma' : 'multiplicacao';
                  $valorPontos = $rowCriterio['pontos']; // Supondo que este seja o valor de pontos por item        
                  echo "<input type='number' class='form-control quantidade-resposta-input' id='quantidade_resposta_" . $rowCriterio['id'] . "' name='quantidade_resposta_" . $rowCriterio['id'] . "' data-tipo-calculo='" . $tipoCalculo . "' data-valor-pontos='" . $valorPontos . "' oninput='calcularTotalPontos()'>";

                  echo "</div>";

                  // Seção para upload de arquivo
                  echo "<div class='arquivo'>";
                  echo "<input name='arquivo' type='file' class='file-input' id='formFile'></input>";
                  echo "<small id='fotoHelp' class='form-text text-muted'>Selecione o arquivo comprovante (PDF).</small>";
                  echo "</div>";
                }
                echo "</div>";
              }

              echo "</div>"; // Fim de categorias-section
            }

            echo "</div>"; // Fim de partes-section
          }

          echo "</div>"; // Fim de requerimento
        }
        ?>
      </div>
    </div>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      document.getElementById('form-enviar-requerimento').addEventListener('submit', function (e) {
        e.preventDefault();

        var descricaoRespostas = {};
        document.querySelectorAll('.descricao-resposta').forEach(function (input) {
          var id = input.id.replace('descricao_resposta_', '');
          descricaoRespostas[id] = input.value;
        });

        document.getElementById('dados_requerimento').value = JSON.stringify(descricaoRespostas);
        this.submit();
      });
    });

  </script>
  <script>
    function calcularTotalPontos() {
      var totalPontos = 0;
      document.querySelectorAll('.quantidade-resposta-input').forEach(function (input) {
        var valor = parseInt(input.value) || 0;
        var tipoCalculo = input.getAttribute('data-tipo-calculo');
        var valorPontos = parseInt(input.getAttribute('data-valor-pontos')) || 0;

        if (tipoCalculo === 'soma') {
          totalPontos += valor;
        } else if (tipoCalculo === 'multiplicacao') {
          totalPontos += valor * valorPontos;
        }
      });

      document.getElementById('totalPontos').innerText = 'Total de Pontos: ' + totalPontos;
    }
  </script>





  <div class="heading_container heading_center">
    <h2 id="totalPontos">Total Estimado de Pontos: 0</h2>
    <form id="form-enviar-requerimento" action="enviar_requerimento.php" method="post">
      <input type="hidden" id="dados_requerimento" name="dados_requerimento">
      <button type="submit" class="btn btn-primary">
        <i class="fa fa-save"></i> Enviar requerimento
      </button><br><br>
      <h4> NÃO ENVIE O REQUERIMENTO OU ATUALIZE A PÁGINA ANTES DE SALVAR SUAS RESPOSTAS! </h4>
      <div> Enquanto o requerimento não for corrigido, você poderá alterar suas respostas, porém, terá que preencher e enviar os arquivos novamente.
    </form>


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