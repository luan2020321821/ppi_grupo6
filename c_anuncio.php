<?php

$tip = $_POST["tipo"];
$mar = $_POST["marca"];
$mod = $_POST['modelo'];
$com = $_POST["combustivel"];
$cor = $_POST["cor"];
$anofab = $_POST["anofabricacao"];
$kil = $_POST["kilometragem"];
$cam = $_POST["cambio"];
$obs = $_POST["observacao"];
$foto = $_FILES['foto'];
$val = $_POST["valor"];


session_start();
include "config.php";
$emaillogado = $_SESSION['email'];
$sqlx = "SELECT * FROM usuario WHERE usuario.email='$emaillogado'";
$query = mysql_query($sqlx) or die(mysql_error());
$puxa = mysql_fetch_array($query);
$id_usuario = $puxa["id_usuario"];

if($tip==""){
		?>
		<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript"> alert ("ERRO!\n\n Voce deve selecionar um tipo de veiculo! \n\n \n\n")</SCRIPT>
		<SCRIPT language="JavaScript">window.history.go(-1);</SCRIPT>
		<?php		
}


if($mar==""){
		?>
		<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript"> alert ("ERRO!\n\n Voce deve digitar a marca do veiculo! \n\n \n\n")</SCRIPT>
		<SCRIPT language="JavaScript">window.history.go(-1);</SCRIPT>
		<?php		
}


if($com==""){
		?>
		<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript"> alert ("ERRO!\n\n Voce deve selecionar o combustivel do veículo! \n\n \n\n")</SCRIPT>
		<SCRIPT language="JavaScript">window.history.go(-1);</SCRIPT>
		<?php		
}


if($anofab==""){
		?>
		<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript"> alert ("ERRO!\n\n Voce deve digitar o ano de fabricacao do veiculo! \n\n \n\n")</SCRIPT>
		<SCRIPT language="JavaScript">window.history.go(-1);</SCRIPT>
		<?php		
}


if($kil==""){
		?>
		<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript"> alert ("ERRO!\n\n Voce deve digitar a kilometragem rodada pelo veiculo! \n\n \n\n")</SCRIPT>
		<SCRIPT language="JavaScript">window.history.go(-1);</SCRIPT>
		<?php		
}


if($com==""){
		?>
		<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript"> alert ("ERRO!\n\n Voce deve selecionar o tipo de cambio do veículo! \n\n \n\n")</SCRIPT>
		<SCRIPT language="JavaScript">window.history.go(-1);</SCRIPT>
		<?php		
}


if($val==""){
		?>
		<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript"> alert ("ERRO!\n\n Voce deve inserir um valor para o veiculo a ser anunciado! \n\n \n\n")</SCRIPT>
		<SCRIPT language="JavaScript">window.history.go(-1);</SCRIPT>
		<?php		
}


if (!empty($foto["name"])) {
	$largura = 15000;
	$altura = 18000;
	$tamanho = 10000000;

	$error = array();
	
	if(!preg_match("/^image\/(webp|pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
		$error[] = "Isso não é uma imagem.";
	}
	
	$dimensoes = getimagesize($foto["tmp_name"]);
	
	if($dimensoes[0] > $largura) {
		$error[] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
	}

	if($dimensoes[1] > $altura) {
		$error[] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
	}

	if($foto["size"] > $tamanho) {
		$error[] = "A imagem deve ter no máximo ".$tamanho." bytes";
	}

	if (count($error) == 0) {
		preg_match("/\.(webp|gif|bmp|png|jpg|jpeg|jfif){1}$/i", $foto["name"], $ext);
		$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
		$caminho_imagem = "img/" . $nome_imagem;
		move_uploaded_file($foto["tmp_name"], $caminho_imagem);
		$sql = mysql_query("INSERT INTO anuncio (tipo,marca,modelo,combustivel,cor,anofabricacao,kilometragem,cambio,observacao,foto,valor,id_usuario_ref) VALUES('{$tip}','{$mar}','{$mod}','{$com}','{$cor}','{$anofab}','{$kil}','{$cam}','{$obs}','{$nome_imagem}','{$val}','{$id_usuario}')")or die(mysqli_error());
		if (!$sql){
			echo "Ocorreu algum erro ao cadastrar o anuncio!";
		} else {
			echo "<script>";
			echo "alert('\\n\\n Anuncio adastrado  com sucesso! \\n\\n Seu anuncio esta visivel no portal!\\n\\n\\n Boa sorte! ');";
			echo "window.history.go(-2);";
			echo "</script>";
		}
	} else {
		for ($i = 0; $i < count($error); $i++) {
			echo $error[$i] . "<br>";
		}
	}
}
?>
