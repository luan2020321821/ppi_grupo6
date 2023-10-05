<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <link rel="icon" href="images/IF1.png" type="image/gif" />
  <title>Cadastro/Login da CPPD</title>
  <link href="css/stylelog.css" rel="stylesheet" />
</head>
<body>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="c_cadastro.php" method="post" target="_self" autocomplete="on">
			<h1>Cria sua Conta</h1><br><br>
				<input type="text" name="nome" placeholder="Nome" required="">
				<input type="text" name="siape" placeholder="Siape" required="">
				<input type="email" name="email" placeholder="Email" required="">
				<input type="password" name="senha" placeholder="Senha" required="">
				<input type="date" name="dataingresso" placeholder="Data de ingresso" required>
				<input type="text" name="tel" placeholder="Telefone" required="">
				<input type="text" name="cpf" placeholder="CPF" required="">
				<input type="text" name="cidade" placeholder="Cidade" required="">
			<button>Cadastrar-se</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="verifica_usuario.php" method="post">
			<h1>Entrar</h1><br><br>
				<input type="email" name="email1" placeholder="Email" required="">
				<input type="password" name="senha1" placeholder="Senha" required="">
			<a href="#" onclick="RecuperaSenha()">Esqueceu sua senha?</a>
			<button >Entrar</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Entrar</h1>
				<p>Caso já possua uma conta, entre com seus dados</p>
				<button class="ghost" id="signIn">Entrar</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Cadastrar-se</h1>
				<p>Cadastre suas informações para utilizar o sistema da CPPD</p>
				<button class="ghost" id="signUp">Cadastrar-se</button>
			</div>
		</div>
	</div>
</div>

<script>
	function RecuperaSenha(){
	alert("Entre em contato com o administrador do sistema\nEmail: suporte@cppd.iffar.com");
}
</script>

</body>

<script>

const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});
</script>	
</html>