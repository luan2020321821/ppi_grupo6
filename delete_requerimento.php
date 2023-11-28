<?php
session_start();
include "config.php";

if(isset($_GET['id'])) {
    $requerimento_id = $_GET['id'];

    $sql = "DELETE FROM requerimentos WHERE id = '$requerimento_id'";

    if(mysql_query($sql)) {
        header('Location: progressao.php');
    } else {
        echo "Voce precisa excluir as partes primeiro! ";
    }
} else {
    echo "ID do requerimento nao fornecido.";
}

mysql_close();
?>
