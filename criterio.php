<?php
session_start();
include "config.php";

$descricao_criterios = $_POST['descricao'];
$categorias_id = $_POST['categoria_id'];
$valor = $_POST['pontos'];

$sql = "INSERT INTO criterios (categoria_id, descricao, pontos) VALUES ( '$categorias_id', '$descricao_criterios', '$valor')";

if (mysql_query($sql)) {
    header('Location: progressao.php');
} else {
    echo "Error: " . $sql . "<br>" . mysql_error();
}

mysql_close();
?>
