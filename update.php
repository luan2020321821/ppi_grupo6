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
    $cpf = $_POST["cpf"];

    $sql = "UPDATE usuario SET nome='$nome', email='$email', telefone='$telefone', siape='$siape', titulacao='$titulacao', cpf='$cpf' WHERE email='$emaillogado'";
    $query = mysql_query($sql) or die(mysql_error());

    if ($query) {
        $_SESSION['email'] = $email;
        header("Location: meu_usuario.php?updated=true");
    } else {
        echo "Error: " . $sql . "<br>" . mysql_error();
    }
}
?>