
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
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome2.min.css">
	<link rel="stylesheet" type="text/css" href="css/style2.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Função para exibir uma notificação
            function showNotification(message, type) {
                var notification = $('<div class="alert alert-' + type + ' fade show" role="alert">' +
                    message + '</div>');
                $('.notification-container').append(notification);

                // Remover a notificação após 5 segundos
                setTimeout(function() {
                    notification.alert('close');
                }, 5000);
            }

            // Verificar se a senha foi atualizada e exibir a notificação correspondente
            <?php if (isset($_GET['senha_updated']) && $_GET['senha_updated'] == 'true'): ?>
                showNotification('Sua senha foi atualizada com sucesso!', 'success');
                // Ativar a tab de senha
                $('#password-tab').tab('show');
            <?php endif; ?>

            // Verificar se as informações foram atualizadas e exibir a notificação correspondente
            <?php if (isset($_GET['updated']) && $_GET['updated'] == 'true'): ?>
                showNotification('Suas informações foram atualizadas com sucesso!', 'success');
                // Ativar a tab de informações da conta
            <?php endif; ?>
        });
    </script>

</head>
<body>
<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: loginpage.php");
    exit;
}

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
$foto_perfil = $puxa["foto_perfil"];
$membrocppd = $puxa["membrocppd"];
$nivel = $puxa["Nivel"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Processar upload da foto de perfil
  if (!empty($_FILES['foto_perfil']['name'])) {
    $foto_perfil_temp = $_FILES['foto_perfil']['tmp_name'];
        $foto_perfil_nome = basename($_FILES['foto_perfil']['name']);
        $foto_perfil_destino = "/cppd/imagens/" . $foto_perfil_nome;

    if (move_uploaded_file($foto_perfil_temp, $foto_perfil_destino)){
      
      $sql_atualizar_foto = "UPDATE usuario SET foto_perfil = '$foto_perfil_destino' WHERE email = '$emaillogado'";
      $query_atualizar_foto = mysql_query($sql_atualizar_foto) or die(mysql_error());

    if ($query_atualizar_foto) {
        header("Location: meu_usuario.php?updated=true");
        exit;
    } else {
        $foto_error = "Erro ao atualizar a foto de perfil. Por favor, tente novamente.";
    }
      } else {
      $foto_error = "Erro no upload da foto de perfil. Por favor, tente novamente.";
    }
  }
  

  $dir_fotos_perfil = "/cppd/imagens/";
if (!file_exists($dir_fotos_perfil) && !is_dir($dir_fotos_perfil)) {
    mkdir($dir_fotos_perfil, 0777, true);
}
  //fim troca de foto
    $senha_antiga = $_POST["senha_antiga"];
    $senha_nova = $_POST["senha_nova"];
    $confirmar_senha = $_POST["confirmar_senha"];


    // Verifica se a senha antiga está correta
    $senha_encriptada = md5($senha_antiga);
    $sql_verificar_senha = "SELECT * FROM usuario WHERE email='$emaillogado' AND senha='$senha_encriptada'";
    $query_verificar_senha = mysql_query($sql_verificar_senha) or die(mysql_error());
    $verificar_senha = mysql_num_rows($query_verificar_senha);

    if ($verificar_senha > 0) {
        // Verifica se a nova senha e a confirmação são iguais
        if ($senha_nova === $confirmar_senha) {
            $senha_encriptada_nova = md5($senha_nova);
            $sql_atualizar_senha = "UPDATE usuario SET senha='$senha_encriptada_nova' WHERE email='$emaillogado'";
            $query_atualizar_senha = mysql_query($sql_atualizar_senha) or die(mysql_error());

            if ($query_atualizar_senha) {
                header("Location: meu_usuario.php?senha_updated=true");
                exit;
            } else {
                $senha_error = "Erro ao atualizar a senha. Por favor, tente novamente.";
            }
        } else {
            $senha_error = "A nova senha e a confirmação não são iguais. Por favor, verifique os campos.";
        }
    } else {
        $senha_error = "A senha antiga está incorreta. Por favor, verifique o campo.";
    }
}
?>
<div class="hero_area">
    <header class="header_section">
      <div class="header_top">
        <a class="cppd-link">
          <span><h1>CPPD</h1></span> Comissão Permanente de Pessoal Docente
        </a>
      <div class="container-fluid">
          <div class="top_nav_container">
            <div class="logo_if" align="right">
              <img src="images/IFFar_logo.png" >
            </div>
          </div>
        </div>
      </div>
      
            <?php
            $classe = $puxa["membrocppd"];

            if($classe == 1){
                $classe1 = "membrocppd.php";
                $classe2 = "Membro CPPD";
            } else{
              $classe1 = "restrito.php";
              $classe2 = "Professor";
            }
            ?> 
      <div class="header_bottom">
        <div class="container-fluid">
          <nav class="navbar navbar-expand-lg custom_nav-container ">
            <div class="fonte-logado">
              <span class="fonte-logado"><span>Olá <b><?php echo $nome; ?></b></span>, <br>você está logado como: <?php echo"$classe2" ?></span>
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ">
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo"$classe1" ?>"><h1 class="fa fa-home"></h1> Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="notificacoes.php"><i class="fa fa-bell"></i> Notificações</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="meu_usuario.php"><i class="fa fa-user"></i> Minhas Informações</a>
                </li>
                <li class="nav-item sair">
                  <a type="button" class="btn btn-danger" href="index.php"><i class="fa fa-sign-out"></i> Sair</a>
                </li>  
              </ul>
            </div>

          </nav>
        </div>
      </div>
    </header>
	<section class="py-5 my-5">
		<div class="container">
			<!--<h1 class="mb-5 bg-white shadow" id="config-conta" align="center"><i class="fa fa-cogs"></i> Configurações da Conta</h1>-->
			<div class="bg-white shadow rounded-lg d-block d-sm-flex">
				<div class="profile-tab-nav border-right">
					<div class="p-4">
          <div class="img-circle text-center mb-3">
              <?php
              // Verifica se o caminho da foto de perfil está definido
              if (!empty($foto_perfil) && file_exists($foto_perfil)) {
                  echo '<img src="' . $foto_perfil . '" class="shadow">';
              } else {
                  $imagemPadrao = 'images/user2.png';
                  echo '<img src="' . $imagemPadrao . '" alt="Foto de Perfil Padrão" class="shadow">';
              }
              ?>
          </div>
          <h4 class="text-leftr"><?php echo $nome; ?></h4>
            <?php
            
            list($classe, $nivel) = explode("_0", $nivel);
            echo "<h4 class='text-left nivel_professor'>Classe: $classe</h4>";
            echo "<h4 class='text-left nivel_professor'>Nível: $nivel</h4>";
            ?>
					</div>

					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
							<i class="fa fa-home text-center mr-1"></i> 
							Conta
						</a>
						<a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
							<i class="fa fa-key text-center mr-1"></i> 
							Senha
						</a>
					</div>
				</div>
				<div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                    <?php if (isset($_GET['updated']) && $_GET['updated'] == 'true'): ?>
                        <div class="notification-container" role="alert">
                        </div>
                    <?php endif; ?>
					<div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
						<h3 class="mb-4"><i class="fa fa-user"></i> Meus Dados Pessoais</h3>
						<form method="POST" action="update.php" enctype="multipart/form-data">
							<div class="form-group">
								<label for="nome">Nome</label>
								<input type="text" class="form-control" id="nome" name="nome" value="<?php echo $nome; ?>">
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
							</div>
							<div class="form-group">
								<label for="telefone">Telefone</label>
								<input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $telefone; ?>">
							</div>
							<div class="form-group">
								<label for="siape">Siape</label>
								<input type="text" class="form-control" id="siape" name="siape" value="<?php echo $siape; ?>">
							</div>
							<div class="form-group">
								<label for="titulacao">Titulação</label>
								<input type="text" class="form-control" id="titulacao" name="titulacao" value="<?php echo $titulacao; ?>">
							</div>

              <div class="form-group">
                <label for="foto_perfil">Foto de Perfil</label>
                <input type="file" class="form-control-file" id="foto_perfil" name="foto_perfil">
                <small id="fotoHelp" class="form-text text-muted">Escolha uma imagem para adicionar ou alterar sua foto de perfil.</small>
                <?php if (isset($foto_error)): ?>
                    <p class="text-danger"><?php echo $foto_error; ?></p>
                <?php endif; ?>
                </div>
							
							<button type="submit" class="btn btn-primary">Atualizar Informações</button>
                            <button type="button" class="btn btn-light" onclick="voltar()">Voltar</button>
							<script>
							function voltar() {
								window.history.back();
							}
							</script>
						</form>
					</div>
                    <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                        <h3 class="mb-4"><i class="fa fa-key"></i> Alterar Senha</h3>
                        <form method="POST" action="meu_usuario.php">
                            <div class="form-group">
                                <label>Senha Antiga</label>
                                <input type="password" name="senha_antiga" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Nova Senha</label>
                                <input type="password" name="senha_nova" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Confirmar Nova Senha</label>
                                <input type="password" name="confirmar_senha" class="form-control" required>
                            </div>
                            <?php if (isset($senha_error)): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $senha_error; ?>
                                </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Atualizar Senha</button>
                                <button type="button" class="btn btn-light" onclick="voltar()">Voltar</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="notification" role="tabpanel" aria-labelledby="notification-tab">
                        <h3 class="mb-4"><i class="fa fa-bell"></i> Configurações de Notificação</h3>
                        <div class="form-group">
                            <div class="form-check"><input class="form-check-input" type="checkbox" value="" id="notification1">
                                <label class="form-check-label" for="notification1">
                                    Receber notificação quando a avaliação estiver concluída.
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="notification2">
                                <label class="form-check-label" for="notification2">
                                    Receber notificação quando uma nova progressão estar disponível.
                                </label>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary">Atualizar Configurações</button>
                            <button class="btn btn-light" onclick="voltar()">Voltar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        function voltar() {
            window.history.back();
        }
    </script>
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
                <a href="https://sites.google.com/iffarroupilha.edu.br/cppd-fw/progress%C3%A3o-promo%C3%A7%C3%A3o?authuser=0" target="_blank">Site da CPPD</a>
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
</body>

</html>