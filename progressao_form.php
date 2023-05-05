<?php

define('BD_USER', 'root');
define('BD_PASS', 'usbw');
define('BD_NAME', 'progweb');

$mysqli = new mysqli('localhost', BD_USER, BD_PASS, BD_NAME);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

$stmt = $mysqli->prepare("INSERT INTO progressoes (nome, siape, nivel_capacitacao, data_progressao, escolaridade, aperfeicoamento, especializacao, mestrado, doutorado, lotacao, diretoria, coordenacao_setor, cargo_funcao, chefia_imediata, periodo_avaliado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param('sssssssssssssss', $_POST['name'], $_POST['siape'], $_POST['nivel_capacitacao'], $_POST['data_progressao'], $_POST['escolaridade'], $_POST['aperfeicoamento'], $_POST['especializacao'], $_POST['mestrado'], $_POST['doutorado'], $_POST['lotacao'], $_POST['diretoria'], $_POST['coordenacao_setor'], $_POST['cargo_funcao'], $_POST['chefia_imediata'], $_POST['periodo_avaliado']);

if ($stmt->execute()) {
    // Redirecionar para a página de sucesso
    header("Location: success.php");
    exit();
} else {
    echo "Erro: " . $stmt->error;
}

$stmt->close();
$mysqli->close();

?>