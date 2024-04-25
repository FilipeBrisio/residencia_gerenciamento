<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexão com o banco de dados e inclusão do arquivo de configuração
    include_once('config.php');

    // Coleta dos dados do formulário
    $nome = $_POST['nome'];
    $CPF = $_POST['rg/cpf'];
    $placa = $_POST['placa'];
    $carro = $_POST['carro'];

    // Inicia uma transação
    $conexao->begin_transaction();

    try {
        // Prepara a consulta SQL para inserir um novo cliente
        $sql_cliente = "INSERT INTO clientes (nome, CPF) VALUES ('$nome','$CPF')";

        // Executa a consulta para inserir o cliente
        $conexao->query($sql_cliente);

        // Obtém o ID do cliente inserido
        $cliente_id = $conexao->insert_id;

        // Prepara a consulta SQL para inserir um novo veículo
        $sql_veiculo = "INSERT INTO veiculos (ClienteID, Placa, Carro) VALUES ('$cliente_id', '$placa', '$carro')";

        // Executa a consulta para inserir o veículo
        $conexao->query($sql_veiculo);

        // Confirma a transação se todas as consultas forem bem-sucedidas
        $conexao->commit();

        echo "Novo cliente e veículo inseridos com sucesso!";
    } catch (mysqli_sql_exception $e) {
        // Em caso de falha, reverte a transação
        $conexao->rollback();
        echo "Erro ao inserir cliente ou veículo: " . $e->getMessage();
    }
   
    header("Location: ../lista_de_cliente.php");
    exit;
        
    }
?>