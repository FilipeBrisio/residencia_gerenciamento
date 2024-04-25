<?php
// Inclua o arquivo de configuração para obter as informações de conexão
include_once('config.php');

// Recupere os dados da solicitação POST
$data = json_decode(file_get_contents('php://input'));

$clienteId = $data->clienteId;
$novoNome = $data->novoNome;
$novoCPF = $data->novoCPF;
$novaPlaca = $data->novaPlaca;
$novoCarro = $data->novoCarro;

// Crie uma conexão com o banco de dados usando as informações do arquivo de configuração
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Verifique a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Consulta SQL de atualização
$sql = "UPDATE clientes SET Nome = ?, CPF = ?, Placa = ?, Carro = ? WHERE ClienteID = ?";

// Prepare a consulta
$stmt = $conn->prepare($sql);

// Vincule os parâmetros
$stmt->bind_param("ssssi", $novoNome, $novoCPF, $novaPlaca, $novoCarro, $clienteId);

// Execute a consulta
if ($stmt->execute()) {
    $response = ["success" => true];
} else {
    $response = ["success" => false, "error" => $conn->error];
}

// Feche a consulta e a conexão
$stmt->close();
$conn->close();

// Responda ao cliente
header('Content-Type: application/json');
echo json_encode($response);
?>
