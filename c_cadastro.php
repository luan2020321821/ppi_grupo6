<?php


session_start();



    include ('config.php');



	 $nom = $_POST["nome"];
	 $ema = $_POST["email"];
	 $datnas = $_POST['dataingresso'];
	 $siape = $_POST["siape"];
	 //$cid = $_POST["cidade"];
	 $tel = $_POST["tel"];
	 $sen = $_POST["senha"];
	 $tit = $_POST["titulacao"];
	 //$cpf = $_POST['cpf'];
	 $nivel = $_POST["nivel"];


?>	

<?php
if($nom==""){
		?>
		<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript"> alert ("ERRO!\n\n Voce deve digitar um nome de usuario! \n\n \n\n")</SCRIPT>
		<SCRIPT language="JavaScript">window.history.go(-1);</SCRIPT>
		<?php		
}


if($ema==""){
		?>
		<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript"> alert ("ERRO!\n\n Voce deve digitar um e-mail de usuario! \n\n \n\n")</SCRIPT>
		<SCRIPT language="JavaScript">window.history.go(-1);</SCRIPT>
		<?php		
}


if($siape==""){
		?>
		<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript"> alert ("ERRO!\n\n Voce deve digitar uma Siape! \n\n \n\n")</SCRIPT>
		<SCRIPT language="JavaScript">window.history.go(-1);</SCRIPT>
		<?php		
}


if($sen==""){
		?>
		<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript"> alert ("ERRO!\n\n Voce deve digitar uma senha segura para o usuario! \n\n \n\n")</SCRIPT>
		<SCRIPT language="JavaScript">window.history.go(-1);</SCRIPT>
		<?php		
}


/*if($cpf==""){
	?>
	<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript"> alert ("ERRO!\n\n Voce deve digitar um cpf para o usuario! \n\n \n\n")</SCRIPT>
	<SCRIPT language="JavaScript">window.history.go(-1);</SCRIPT>
	<?php		
}*/


$senha_encriptada = md5($sen);

$sql = mysql_query("INSERT INTO usuario (nome, email, dataingresso, siape, titulacao, telefone, senha, nivel) VALUES('{$nom}','{$ema}','{$datnas}','{$siape}','{$tit}','{$tel}','{$senha_encriptada}','{$nivel}')")or die( mysql_error() );

				if (!$sql){

					echo "Ocorreu algum erro ao realizar o cadastro!";

				}
			

				else {
					// Obter o ID do usuário recém-criado
					$usuario_id = mysql_insert_id();
			
					// Inserir um registro na tabela notificações com o usuário_id
					$sqlNotificacao = mysql_query("INSERT INTO notificacoes (usuario_id) VALUES ('{$usuario_id}')") or die(mysql_error());
			
					if (!$sqlNotificacao) {
						echo "Erro ao registrar na tabela de notificações.";
					} else {
						?>
						<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript"> alert ("\n\n Cadastrado realizado com sucesso! \n\n")</SCRIPT>
						<SCRIPT language="JavaScript">window.history.go(-2);</SCRIPT>
						<?php 
					}
				}			
?>
