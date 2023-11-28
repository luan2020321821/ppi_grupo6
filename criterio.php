<?php
session_start();
include "config.php";

$descricao_criterios = $_POST['descricao'];
$categorias_id = $_POST['categoria_id'];
$valor = $_POST['pontos'];
$tipo_criterio = isset($_POST['tipo_criterio']) && $_POST['tipo_criterio'] === 'max_pontos' ? 1 : 0;

$sql = "INSERT INTO criterios (categoria_id, descricao, pontos, tipo_criterio) VALUES ('$categorias_id', '$descricao_criterios', '$valor', '$tipo_criterio')";

if (mysql_query($sql)) {
    header('Location: progressao.php');
} else {
    echo "Error: " . $sql . "<br>" . mysql_error();
}

mysql_close();
?>