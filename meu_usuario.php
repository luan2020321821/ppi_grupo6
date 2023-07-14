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
$cpf = $puxa["cpf"];
?>

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
    <link href="css/responsive.css" rel="stylesheet" />
	  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	  <link rel="stylesheet" type="text/css" href="css/font-awesome2.min.css">
	  <link rel="stylesheet" type="text/css" href="css/style2.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    
	  <!--rodapé da pagina-->
	  <link href="css/font-awesome.min.css" rel="stylesheet" />
	  <link href="css/style.css" rel="stylesheet" />
    
  </head>
  
<body>

<div class="hero_area">
    <header class="header_section">
      <!--<div class="header_top">
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
      </div>-->
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
                <li class="nav-item active">
                  <a class="nav-link" href="restrito.php">Início<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="anunciar.php">Progressão docente</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="meus_anuncios.php">Meu Histórico</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </header>
	<section class="py-3 my-3">
		<div class="container">
			<h1 class="mb-5">Configurações da conta</h1>
			<div class="bg-white shadow rounded-lg d-block d-sm-flex">
				<div class="profile-tab-nav border-right">
					<div class="p-4">
						<div class="img-circle text-center mb-3">
							<img src="images/user2.png" alt="Image" class="shadow">
						</div>
						<h4 class="text-center"><?php echo $nome; ?>
					</div>
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
							<i class="fa fa-home text-center mr-1"></i> 
							Conta
						</a>
						<a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
							<i class="fa fa-key text-center mr-1"></i> 
							Redefinir Senha
						</a>
						<a class="nav-link" id="notification-tab" data-toggle="pill" href="#notification" role="tab" aria-controls="notification" aria-selected="false">
							<i class="fa fa-bell text-center mr-1"></i> 
							Notificações
						</a>
					</div>
				</div>
				    <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                        <?php if (isset($_GET['updated']) && $_GET['updated'] == 'true'): ?>
                            <div class="alert alert-success" role="alert">
                                Suas informações foram atualizadas com sucesso!
                            </div>
                        <?php endif; ?>
					<div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
					    <h3 class="mb-4">Informações da conta</h3>
					    <div class="row">
                        <form method="POST" action="update.php">
                            <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nome</label>
                                            <input type="text" name="nome" class="form-control" value="<?php echo $nome; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Telefone</label>
                                            <input type="text" name="telefone" class="form-control" value="<?php echo $telefone; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Siape</label>
                                        <input type="text" name="siape" class="form-control" value="<?php echo $siape; ?>">
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Titulação</label>
                                            <input type="text" name="titulacao" class="form-control" value="<?php echo $titulacao; ?>">
                                        </div>
                                    </div>
									<div class="col-md-6">
                                        <div class="form-group">
                                            <label>CPF</label>
                                            <input type="text" name="cpf" class="form-control" value="<?php echo $cpf; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                <button type="submit" class="btn btn-primary">Atualizar</button>
                                <button type="button" class="btn btn-light" onclick="voltar()">Voltar</button>
								<script>
								function voltar() {
    								window.history.back();
								}
								</script>
                                </div>
                            </div>
                        </form>
					    </div>
                        </div>
					<div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
						<h3 class="mb-4">Redefinir senha</h3>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Senha antiga</label>
								  	<input type="password" class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Nova senha</label>
								  	<input type="password" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Confirme a senha</label>
								  	<input type="password" class="form-control">
								</div>
							</div>
						</div>
						<div>
							<button class="btn btn-primary">Atualizar</button>
							<button class="btn btn-light">Cancelar</button>
						</div>
					</div>
					<div class="tab-pane fade" id="notification" role="tabpanel" aria-labelledby="notification-tab">
						<h3 class="mb-4">Configurações de notificação</h3>
						<div class="form-group">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="notification1">
								<label class="form-check-label" for="notification1">
									Receber notifições de novas progressões.
								</label>
							</div>
						</div>
						<div class="form-group">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="notification2" >
								<label class="form-check-label" for="notification2">
									Receber notificações quando a avaliação for concluída.
								</label>
							</div>
						</div>
						<div class="form-group">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="notification3" >
								<label class="form-check-label" for="notification3">
									Receber notificações de avaliações pendentes.
								</label>
							</div>
						</div>
						<div>
							<button class="btn btn-primary">Atualizar</button>
							<button class="btn btn-light">Cancelar</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--rodapé da pagina-->
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
              Sistema em desenvolvimento. Criado para a PPI da turma 34 no ano de 2023.
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
                  Página Inicial
                </a>
              </li>
              <li>
              </li>
              
            </ul>
          </div>
        </div>
        <div class="col-md-3">
         <!-- <div class="info_form ">
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
            </div> -->
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

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>