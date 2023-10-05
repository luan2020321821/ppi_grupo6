<?php
session_start();
include "config.php";

if(isset($_GET['id'])) {
    $categorias_id = $_GET['id'];

    $sql = "DELETE FROM categorias WHERE id = '$categorias_id'";

    if(mysql_query($sql)) {
        header('Location: progressao.php');
    } else {
        echo "Voce deve primeiro excluir os criterios! ";
    }
} else {
    echo "ID da categoria nao fornecido.";
}

mysql_close();
?>
