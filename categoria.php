<?php
session_start();

include "config.php";

$emaillogado = $_SESSION['email'];
$descricao_categoria = $_POST['descricao'];
$parte_id = "";

// Recupera o parte_id da tabela partes
$sql_parte = "SELECT id FROM partes WHERE idrequerimentos=(SELECT id FROM requerimentos WHERE usuario_id=(SELECT id_usuario FROM usuario WHERE email='$emaillogado') ORDER BY idrequerimentos DESC LIMIT 1)";
$result_parte = mysql_query($sql_parte) or die(mysql_error());
$row_parte = mysql_fetch_assoc($result_parte);
$parte_id = $row_parte['id'];

$sql = "INSERT INTO categorias (descricao, parte_id) VALUES ('$descricao_categoria', '$parte_id')";

if (mysql_query($sql)) {
    header('Location: progressao.php');
} else {
    echo "Error: " . $sql . "<br>" . mysql_error();
}

mysql_close();
?>
