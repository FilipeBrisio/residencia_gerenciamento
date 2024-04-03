<?php
// Inclua o arquivo de configuração para obter as informações de conexão
include 'config.php';

// Recupere os dados da solicitação POST
$data = json_decode(file_get_contents('php://input'));

$pagamentoId = $data->pagamentoId;
$valorAtual = $data->valorAtual;

// Crie uma conexão com o banco de dados usando as informações do arquivo de configuração
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Verifique a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Determine o novo valor com base no valor atual (alternar entre 0 e 1)
$novoValor = ($valorAtual === '0') ? '1' : '0';

// Consulta SQL de atualização
$sql = "UPDATE pagamento SET pago = ? WHERE pagamento_id = ?";

// Prepare a consulta
$stmt = $conn->prepare($sql);

// Vincule os parâmetros
$stmt->bind_param("si", $novoValor, $pagamentoId);

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