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
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome2.min.css">
	<link rel="stylesheet" type="text/css" href="css/style2.css">
</head>
<body>
	<section class="py-5 my-5">
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
							Senha
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
						<h3 class="mb-4">Password Settings</h3>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Old password</label>
								  	<input type="password" class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>New password</label>
								  	<input type="password" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Confirm new password</label>
								  	<input type="password" class="form-control">
								</div>
							</div>
						</div>
						<div>
							<button class="btn btn-primary">Update</button>
							<button class="btn btn-light">Cancel</button>
						</div>
					</div>
					<div class="tab-pane fade" id="notification" role="tabpanel" aria-labelledby="notification-tab">
						<h3 class="mb-4">Notification Settings</h3>
						<div class="form-group">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="notification1">
								<label class="form-check-label" for="notification1">
									Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum accusantium accusamus, neque cupiditate quis
								</label>
							</div>
						</div>
						<div class="form-group">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="notification2" >
								<label class="form-check-label" for="notification2">
									hic nesciunt repellat perferendis voluptatum totam porro eligendi.
								</label>
							</div>
						</div>
						<div class="form-group">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="notification3" >
								<label class="form-check-label" for="notification3">
									commodi fugiat molestiae tempora corporis. Sed dignissimos suscipit
								</label>
							</div>
						</div>
						<div>
							<button class="btn btn-primary">Update</button>
							<button class="btn btn-light">Cancel</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>