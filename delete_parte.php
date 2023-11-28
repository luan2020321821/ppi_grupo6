<?php
session_start();
include "config.php";

if(isset($_GET['id'])) {
    $partes_id = $_GET['id'];

    $sql = "DELETE FROM partes WHERE id = '$partes_id'";

    if(mysql_query($sql)) {
        header('Location: progressao.php');
    } else {
        echo "Voce deve primeiro excluir as categorias! ";
    }
} else {
    echo "ID da parte nao fornecido.";
}

mysql_close();
?>
