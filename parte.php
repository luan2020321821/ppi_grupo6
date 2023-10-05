<?php
session_start();

include "config.php";

$emaillogado = $_SESSION['email'];
$descricao = $_POST['descricao'];

// Obter o idrequerimentos da tabela requerimentos
$sql_requerimento = "SELECT id FROM requerimentos WHERE usuario_id = (SELECT id_usuario FROM usuario WHERE email='$emaillogado') ORDER BY id DESC LIMIT 1";
$result_requerimento = mysql_query($sql_requerimento) or die(mysql_error());
$row_requerimento = mysql_fetch_assoc($result_requerimento);
$idrequerimentos = $row_requerimento['id'];

$sql = "INSERT INTO partes (descricao, idrequerimentos) VALUES ('$descricao', '$idrequerimentos')";

if (mysql_query($sql)) {
    header('Location: progressao.php');
} else {
    echo "Error: " . $sql . "<br>" . mysql_error();
}

mysql_close();
?>
