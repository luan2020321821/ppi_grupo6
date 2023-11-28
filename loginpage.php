<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <link rel="icon" href="images/IF1.png" type="image/gif" />
  <title>Cadastro/Login da CPPD</title>
  <link href="css/stylelog.css" rel="stylesheet" />

  <script>
        function validarEmail() {
            var email = document.getElementById("email").value;
            //var emailRegex = /^[a-zA-Z0-9._-]+@iffarroupilha\.edu\.br$/;
			var emailRegex = /^[a-zA-Z0-9._-]+@(iffarroupilha\.edu\.br|aluno\.iffar\.edu\.br)$/

            if (!emailRegex.test(email)) {
                alert("Email inválido! O email deve ter a terminação @iffarroupilha.edu.br.");
                return false; // Impede o envio do formulário
            }
            return true; // Permite o envio do formulário
        }
    </script>
</head>
<body>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form onsubmit="return validarEmail();" action="c_cadastro.php" method="post" target="_self" autocomplete="on">
			<h1>Cadastro</h1><br>
				<input type="text" name="nome" placeholder="Nome" required="">
				<input type="text" name="siape" placeholder="SIAPE" required="">
				<input type="text" name="titulacao" placeholder="Titulação" required="">
				<input type="text" name="tel" placeholder="Telefone" required="">
				<input type="email" id="email" name="email" placeholder="Email" required="">
				<input type="password" name="senha" placeholder="Senha" required="">
				<label for="dataingresso" class="text_cadastro"><b>Data de Ingresso na Instituição:</b></label>
				<input type="date" id="dataIngresso" name="dataingresso" placeholder="Data de ingresso" required>	
				<label for="nivel" class="text_cadastro"><b>Selecione o seu nível funcional:</i></label>
				<select name="nivel" class="select-btn" id="">
					<option value="1_01">Classe DI, Nível 01</option>
					<option value="1_02">Classe DI, Nível 02</option>
					<option value="2_01">Classe DII, Nível 01</option>
					<option value="2_02">Classe DII, Nível 02</option>
					<option value="3_01">Classe DIII, Nível 01</option>
					<option value="3_02">Classe DIII, Nível 02</option>
					<option value="3_03">Classe DIII, Nível 03</option>
					<option value="3_04">Classe DIII, Nível 04</option>
					<option value="4_01">Classe DIV, Nível 01</option>
					<option value="4_02">Classe DIV, Nível 02</option>
					<option value="4_03">Classe DIV, Nível 03</option>
					<option value="4_04">Classe DIV, Nível 04</option>
				</select>
				<br><br>
			<button>Cadastrar-se</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="verifica_usuario.php" method="post">
			<h1>Entrar</h1><br><br>
				<input type="email" name="email1" placeholder="Email" required="">
				<input type="password" name="senha1" placeholder="Senha" required="">
			<a href="#">Esqueceu sua senha?</a>
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
				<h1>Ainda não possui uma conta?</h1>
				<p>Cadastre suas informações para utilizar o sistema da CPPD</p>
				<button class="ghost" id="signUp">Cadastrar-se</button>
			</div>
		</div>
	</div>
</div>
</body>
<script>
    window.onload = function() {
        var dataAtual = new Date();
        var dia = String(dataAtual.getDate()).padStart(2, '0');
        var mes = String(dataAtual.getMonth() + 1).padStart(2, '0'); // Janeiro é 0!
        var ano = dataAtual.getFullYear();
        dataAtualFormatada = ano + '-' + mes + '-' + dia;
        document.getElementById('dataIngresso').value = dataAtualFormatada;
    };
</script>
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