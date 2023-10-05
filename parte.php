<?php
session_start();
include "config.php";

$descricao = $_POST['descricao'];
$idrequerimentos = $_POST['requerimento_id'];

$sql = "INSERT INTO partes (descricao, idrequerimentos) VALUES ('$descricao', '$idrequerimentos')";

if (mysql_query($sql)) {
    header('Location: progressao.php');
} else {
    echo "Error: " . $sql . "<br>" . mysql_error();
}

mysql_close();
?>
