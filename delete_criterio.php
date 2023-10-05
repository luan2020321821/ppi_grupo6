<?php
session_start();
include "config.php";

if(isset($_GET['id'])) {
    $criterio_id = $_GET['id'];

    $sql = "DELETE FROM criterios WHERE id = '$criterio_id'";

    if(mysql_query($sql)) {
        header('Location: progressao.php');
    } else {
        echo "Erro ao excluir critério: " . mysql_error();
    }
} else {
    echo "ID do critério não fornecido.";
}

mysql_close();
?>
