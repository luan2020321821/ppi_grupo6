<?php
session_start();



    include ('config.php');



	 $nom = $_POST["nome"];
	 $ema = $_POST["email"];
	 $datnas = $_POST['dataingresso'];
	 $siape = $_POST["siape"];
	 $cid = $_POST["cidade"];
	 $tel = $_POST["tel"];
	 $sen = $_POST["senha"];
	 $tit = $_POST["titulacao"];
	 $cpf = $_POST['cpf'];


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


if($cpf==""){
	?>
	<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript"> alert ("ERRO!\n\n Voce deve digitar um cpf para o usuario! \n\n \n\n")</SCRIPT>
	<SCRIPT language="JavaScript">window.history.go(-1);</SCRIPT>
	<?php		
}


$senha_encriptada = md5($sen);

$sql = mysql_query("INSERT INTO usuario (nome, email, dataingresso, siape, titulacao, cidade, telefone, senha, cpf) VALUES('{$nom}','{$ema}','{$datnas}','{$siape}','{$tit}','{$cid}','{$tel}','{$senha_encriptada}','{$cpf}')")or die( mysql_error() );

				if (!$sql){

					echo "Ocorreu algum erro ao realizar o cadastro!";

				}
			

	else{
	

		?>
		<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript"> alert ("\n\n Cadastrado realizado com sucesso! \n\n")</SCRIPT>
		<SCRIPT language="JavaScript">window.history.go(-2);</SCRIPT>
		<?php	
	}



?>
