<!DOCTYPE html>
<head>
	<title>Cadastro/Login da CPPD</title>
  <meta charset="UTF-8">
  <link rel="icon" href="images/IF1.png" type="image/gif" />
  <link rel="stylesheet" href="./stylelog.css">
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">

<body>
	<div class="main"> 

		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form action="c_cadastro.php" method="post" target="_self" autocomplete="on">
					<label for="chk" aria-hidden="true">Cadastro</label>
					<input type="text" name="nome" placeholder="Nome" required="">
					<input type="text" name="siape" placeholder="Siape" required="">
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="senha" placeholder="Senha" required="">
					<input type="date" name="dataingresso" placeholder="Data de ingresso" required>
					<input type="text" name="tel" placeholder="Telefone" required="">
					<input type="text" name="cpf" placeholder="CPF" required="">
					<input type="text" name="cidade" placeholder="Cidade" required="">
					<button>Cadastrar</button>
				</form>
			</div>

			<div class="login">
				<form action="verifica_usuario.php" method="post">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="email1" placeholder="Email" required="">
					<input type="password" name="senha1" placeholder="Senha" required="">
					<button>Entrar</button>
					<button onclick="cadastro()">Esqueceu a senha?</button>
				</form>
			</div>
	</div>
	<script type="text/javascript">
		function cadastro(){
			alert("Entre em contato com a administrador do sistema. \nadministrador@iffarroupilha.br")
		}
	</script>

	
</body>
</html>

</body>
</html>
