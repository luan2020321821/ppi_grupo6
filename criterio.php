
<?php
session_start();

include "config.php";

$emaillogado = $_SESSION['email'];
$descricao_criterios = $_POST['descricao'];
$categorias_id = "";
$valor = $_POST['pontos'];

// Recupera o categoria_id da tabela categorias
$sql_parte = "SELECT id FROM categorias WHERE parte_id=(SELECT id FROM partes WHERE idrequerimentos=(SELECT id FROM requerimentos WHERE usuario_id=(SELECT id_usuario FROM usuario WHERE email='$emaillogado')) ORDER BY parte_id DESC LIMIT 10)";
$result_parte = mysql_query($sql_parte) or die(mysql_error());
$row_parte = mysql_fetch_assoc($result_parte);
$categorias_id = $row_parte['id'];

$sql = "INSERT INTO criterios (categoria_id, descricao, pontos) VALUES ( '$categorias_id', '$descricao_criterios', '$valor')";

if (mysql_query($sql)) {
    header('Location: progressao.php');
} else {
    echo "Error: " . $sql . "<br>" . mysql_error();
}

mysql_close();
?>