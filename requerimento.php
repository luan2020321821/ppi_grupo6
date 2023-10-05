<?php

session_start();

include "config.php";

$emaillogado = $_SESSION['email'];
$nome_requerimento = $_POST['titulo'];
$descricao_requerimento = $_POST['descricao'];

$sql = "INSERT INTO requerimentos (titulo, descricao, usuario_id) VALUES ('$nome_requerimento', '$descricao_requerimento', (SELECT id_usuario FROM usuario WHERE email='$emaillogado'))";

if (mysql_query($sql)) {
    header('Location: progressao.php');
} else {
    echo "Error: " . $sql . "<br>" . mysql_error();
}

mysql_close();
?>
