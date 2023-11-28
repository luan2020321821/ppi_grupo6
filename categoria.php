<?php
session_start();
include "config.php";

$descricao_categoria = $_POST['descricao'];
$parte_id = $_POST['parte_id'];
$tipo_categoria = isset($_POST['tipo_categoria']) && $_POST['tipo_categoria'] === 'normal' ? 1 : 0;
$descricao_resposta = $_POST['descricao_resposta'];

$sql = "INSERT INTO categorias (descricao, parte_id, tipo_categoria, descricao_resposta) VALUES ('$descricao_categoria', '$parte_id', '$tipo_categoria', '$descricao_resposta')";

if (mysql_query($sql)) {
    header('Location: progressao.php');
} else {
    echo "Error: " . $sql . "<br>" . mysql_error();
}

mysql_close();

?>