<?php
include_once('config.php');

if (isset($_POST['update'])) {
    $id1 = $_POST['id1'];
    $id2 = $_POST['id2'];

    // Restante do código para obter os dados do formulário
    $nome = $_POST['nome'];
    $funcao = $_POST['funcao'];
    $diaria = $_POST['diaria'];
    $chave_pix = $_POST['chave_pix'];
    $tipo_pix = $_POST['tipo_pix'];

    // Consultas SQL para atualizar os dados nas tabelas correspondentes
    $sqlUpdate1 = "UPDATE funcionario SET nome = '$nome', pix = '$chave_pix', tipo_pix = '$tipo_pix' WHERE id = '$id1'";
    $sqlUpdate2 = "UPDATE funcao SET funcao = '$funcao', diaria = '$diaria' WHERE id = '$id2'";

    // Executar as consultas de atualização
    $result1 = $conexao->query($sqlUpdate1);
    $result2 = $conexao->query($sqlUpdate2);

    // Verificar se as atualizações foram bem-sucedidas
    if ($result1 && $result2) {
        // Redirecionar para a página desejada após a atualização
        header('Location: lista_de_funcionario.php');
        exit();
    } else {
        echo "Erro ao atualizar no banco de dados.";
    }
} else {
    echo "Ação de atualização não reconhecida.";
}

// Lembre-se de fechar a conexão ao banco de dados, se necessário.
$conexao->close();
?>