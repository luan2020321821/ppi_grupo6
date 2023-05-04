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

	<body>
	<?php
				session_start();

				include "config.php";
		
				$emaillogado = $_SESSION['email'];

				
				$sqlx = "SELECT * FROM usuario WHERE usuario.email='$emaillogado'";
				
				$query = mysql_query($sqlx) or die (mysql_error());
				$puxa = mysql_fetch_array($query);
				
				$nome = $puxa["nome"];        
			?>

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
					<a class="nav-link" href="index.php">Home</a>
					</li>
					<li class="nav-item active">
					<a class="nav-link" href="anunciar.php">Progressão Docente <span class="sr-only">(current)</span></a>
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
	<body>
	<div class="formbold-main-wrapper">

	</div>
	</body>
	</html>
	
	</body>
	</html>
