<?php
session_start();
include "config.php";

$emaillogado = $_SESSION['email'];

// Obtenha o id da parte relacionada ao usuário
$sqlParte = "SELECT id FROM partes WHERE idrequerimentos=(SELECT id FROM requerimentos WHERE usuario_id=(SELECT id_usuario FROM usuario WHERE email='$emaillogado') ORDER BY id DESC LIMIT 1)";
$resultParte = mysql_query($sqlParte) or die(mysql_error());
$rowParte = mysql_fetch_assoc($resultParte);
$parteId = $rowParte['id'];

// Processamento dos dados do formulário
$dadosRequerimento = isset($_POST['dados_requerimento']) ? json_decode($_POST['dados_requerimento'], true) : [];

foreach ($dadosRequerimento as $categoriaId => $descricaoResposta) {
    // Verifique se já existe um registro para esta descrição de resposta
    $sqlCheck = "SELECT * FROM categorias WHERE parte_id = '$parteId' AND id = '$categoriaId'";
    $resultCheck = mysql_query($sqlCheck) or die(mysql_error());

    if (mysql_num_rows($resultCheck) > 0) {
        // Atualize o registro existente
        $sqlUpdate = "UPDATE categorias SET descricao_resposta = '$descricaoResposta' WHERE parte_id = '$parteId' AND id = '$categoriaId'";
        mysql_query($sqlUpdate) or die(mysql_error());
        $_SESSION['formulario_enviado'] = true;

    } else {
        echo "Registro para a categoria $categoriaId não encontrado."; // Remova após a depuração
    }
}

header('Location: formulario.php');
exit;


?>