<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: loginpage.php");
    exit;
}

include "config.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emaillogado = $_SESSION['email'];

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $siape = $_POST["siape"];
    $titulacao = $_POST["titulacao"];
    $foto_perfil_temp = $_FILES["foto_perfil"]["tmp_name"];
    $foto_perfil_nome = $_FILES["foto_perfil"]["name"];
    $foto_perfil_destino = $_SERVER['DOCUMENT_ROOT'] . "/cppd/imagens/" . $foto_perfil_nome;


    $sql = "UPDATE usuario SET nome='$nome', email='$email', telefone='$telefone', siape='$siape', titulacao='$titulacao', foto_perfil='$foto_perfil_destino' WHERE email='$emaillogado'";
    $query = mysql_query($sql) or die(mysql_error());

    if ($query) {
        $_SESSION['email'] = $email;
        header("Location: meu_usuario.php?updated=true");
    } else {
        echo "Error: " . $sql . "<br>" . mysql_error();
    }
}
?>