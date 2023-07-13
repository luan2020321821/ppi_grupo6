<?php
    session_start();
    include "config.php";
    $emaillogado = $_SESSION['email'];

    // Função para criar um novo requerimento
    function criarRequerimento($usuario_id, $titulo, $descricao)
    {
        $query = "INSERT INTO requerimentos (usuario_id, titulo, descricao) VALUES ('$usuario_id', '$titulo', '$descricao')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            return mysqli_insert_id($conn); // Retorna o ID do requerimento criado
        } else {
            return false;
        }
    }

    // Função para criar uma nova parte
    function criarParte($requerimento_id, $descricao)
    {
        $query = "INSERT INTO partes (requerimento_id, descricao) VALUES ('$requerimento_id', '$descricao')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            return mysqli_insert_id($conn); // Retorna o ID da parte criada
        } else {
            return false;
        }
    }

    // Função para criar uma nova categoria
    function criarCategoria($parte_id, $descricao)
    {
        $query = "INSERT INTO categorias (parte_id, descricao) VALUES ('$parte_id', '$descricao')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            return mysqli_insert_id($conn); // Retorna o ID da categoria criada
        } else {
            return false;
        }
    }

    // Função para criar um novo critério
    function criarCriterio($categoria_id, $descricao, $pontos)
    {
        $query = "INSERT INTO criterios (categoria_id, descricao, pontos) VALUES ('$categoria_id', '$descricao', '$pontos')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            return mysqli_insert_id($conn); // Retorna o ID do critério criado
        } else {
            return false;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["criar_requerimento"])) {
            $titulo = $_POST["titulo"];
            $descricao = $_POST["descricao"];
            $requerimento_id = criarRequerimento($usuario_id, $titulo, $descricao);
            if ($requerimento_id) {
                // Requerimento criado com sucesso, redirecionar para a página de partes
                header("Location: progressao.php?requerimento_id=$requerimento_id");
                exit();
            } else {
                // Erro ao criar requerimento, exibir mensagem de erro
                $erro_requerimento = "Erro ao criar o requerimento. Por favor, tente novamente.";
            }
        } elseif (isset($_POST["criar_parte"])) {
            $requerimento_id = $_POST["requerimento_id"];
            $descricao = $_POST["descricao_parte"];
            $parte_id = criarParte($requerimento_id, $descricao);
            if ($parte_id) {
                // Parte criada com sucesso, redirecionar para a página de categorias
                header("Location: progressao.php?requerimento_id=$requerimento_id&parte_id=$parte_id");
                exit();
            } else {
                // Erro ao criar parte, exibir mensagem de erro
                $erro_parte = "Erro ao criar a parte. Por favor, tente novamente.";
            }
        } elseif (isset($_POST["criar_categoria"])) {
            $parte_id = $_POST["parte_id"];
            $descricao = $_POST["descricao_categoria"];
            $categoria_id = criarCategoria($parte_id, $descricao);
            if ($categoria_id) {
                // Categoria criada com sucesso, redirecionar para a página de critérios
                header("Location: progressao.php?requerimento_id=$requerimento_id&parte_id=$parte_id");
                exit();
            } else {
                // Erro ao criar categoria, exibir mensagem de erro
                $erro_categoria = "Erro ao criar a categoria. Por favor, tente novamente.";
            }
        } elseif (isset($_POST["criar_criterio"])) {
            $categoria_id = $_POST["categoria_id"];
            $descricao = $_POST["descricao_criterio"];
            $pontos = $_POST["pontos_criterio"];
            $criterio_id = criarCriterio($categoria_id, $descricao, $pontos);
            if ($criterio_id) {
                // Criterio criado com sucesso, redirecionar para a página de critérios
                header("Location: progressao.php?requerimento_id=$requerimento_id&parte_id=$parte_id");
                exit();
            } else {
                // Erro ao criar criterio, exibir mensagem de erro
                $erro_criterio = "Erro ao criar o critério. Por favor, tente novamente.";
            }
        } elseif (isset($_POST["enviar_arquivo"])) {
            $avaliacao_id = $_POST["avaliacao_id"];
            $caminho = ""; // Inserir código para salvar o arquivo e obter o caminho
            $query = "INSERT INTO arquivos (avaliacao_id, caminho) VALUES ('$avaliacao_id', '$caminho')";
            $result = mysqli_query($conn, $query);
            if ($result) {
                // Arquivo enviado com sucesso, exibir mensagem de sucesso
                $mensagem_sucesso_arquivo = "Arquivo enviado com sucesso.";
            } else {
                // Erro ao enviar arquivo, exibir mensagem de erro
                $erro_arquivo = "Erro ao enviar o arquivo. Por favor, tente novamente.";
            }
        }
    }

	$sqlx = "SELECT * FROM usuario WHERE usuario.email='$emaillogado'";
	$query = mysql_query($sqlx) or die(mysql_error());
	$puxa = mysql_fetch_array($query);
    $usuario_id = $puxa["id_usuario"];
    $nome = $puxa["nome"];
    $email = $puxa["email"];
    $dataingresso = $puxa["dataingresso"];
    $siape = $puxa["siape"];
    $cidade = $puxa["cidade"];
    $telefone = $puxa["telefone"];
    $titulacao = $puxa["titulacao"];
    $cpf = $puxa["cpf"];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Controle de Progressões CPPD</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/responsive.css" rel="stylesheet" />
    <link href="css/style.plh.css" rel="stylesheet" />
</head>
<body>

  <div class="hero_area">
    <header class="header_section">
      <div class="header_top">
        <a class="cppd-link">
          <span>CPPD</span> Comissão Permanente de Pessoal Docente
        </a>
      <div class="container-fluid">
          <div class="top_nav_container">
            <div>
              <img height="208" src="images/if_logo.png" class="goofy_image">
            </div>            
            <div class="user_option_box">
              <a href="index.php" class="cart-link">
                <i class="fa fa-sign-out" aria-hidden="true"></i>
                <span>
                  Olá <b><?php echo $nome; ?></b>
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
              <a class="nav-link" href="index.php">Você está logado como: Membro da CPPD <span class="sr-only"></span></a>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                  <a class="nav-link" href="meus_anuncios.php">Meus Anuncios</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </header>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h2 class="mb-3">Informações Pessoais</h2>
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" value="<?php echo $nome; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" value="<?php echo $email; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="data_ingresso">Data de Ingresso:</label>
                <input type="text" class="form-control" id="data_ingresso" value="<?php echo $dataingresso; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="siape">SIAPE:</label>
                <input type="text" class="form-control" id="siape" value="<?php echo $siape; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="cidade">Cidade:</label>
                <input type="text" class="form-control" id="cidade" value="<?php echo $cidade; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" class="form-control" id="telefone" value="<?php echo $telefone; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="titulacao">Titulação:</label>
                <input type="text" class="form-control" id="titulacao" value="<?php echo $titulacao; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" class="form-control" id="cpf" value="<?php echo $cpf; ?>" readonly>
            </div>
        </div>
    </div>

    <?php if (isset($_GET["id"])) : ?>
        <!-- Mostrar partes, categorias, critérios e envio de arquivo -->
        <!-- Código omitido por brevidade -->
    <?php else : ?>
        <!-- Botão para criar requerimento -->
        <div class="row">
            <div class="col-md-6">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <h2 class="mb-3">Criar Requerimento</h2>
                    <div class="form-group">
                        <label for="titulo">Título:</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" required>
                    </div>
                    <div class="form-group">
                        <label for="descricao">Descrição:</label>
                        <textarea class="form-control" id="descricao" name="descricao" required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="criar_requerimento">Criar Requerimento</button>
                    </div>
                    <?php if (isset($erro_requerimento)) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $erro_requerimento; ?>
                        </div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    <?php endif; ?>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
