<?php
session_start();
include "config.php";

$descricao_categoria = $_POST['descricao'];
$parte_id = $_POST['parte_id'];

$sql = "INSERT INTO categorias (descricao, parte_id) VALUES ('$descricao_categoria', '$parte_id')";

if (mysql_query($sql)) {
    header('Location: progressao.php');
} else {
    echo "Error: " . $sql . "<br>" . mysql_error();
}

mysql_close();
?>
