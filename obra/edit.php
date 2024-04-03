
<?php
include_once('config.php');

$id1 = $_GET['id1'];
$id2 = $_GET['id2'];

$sqlSelect1 = "SELECT * FROM funcionario WHERE id = $id1";
$sqlSelect2 = "SELECT * FROM funcao WHERE id = $id2";

$result1 = $conexao->query($sqlSelect1);
$result2 = $conexao->query($sqlSelect2);

$nome = $funcao = $diaria = $chave_pix = $tipo_pix = ''; // Inicialize as variáveis

if ($result1 && $result2) {
    // Verifica se há resultados para a primeira consulta
    if (mysqli_num_rows($result1) > 0) {
        while ($user_data = mysqli_fetch_assoc($result1)) {
            $nome = $user_data['nome'];
            $chave_pix = $user_data['pix'];
            $tipo_pix = $user_data['tipo_pix'];
        }
    } else {
        echo "Nenhum resultado encontrado para o ID fornecido na primeira consulta.";
    }

    // Verifica se há resultados para a segunda consulta
    if (mysqli_num_rows($result2) > 0) {
        while ($funcao_data = mysqli_fetch_assoc($result2)) {
            $funcao = $funcao_data['funcao'];
            $diaria = $funcao_data['diaria'];
        }
    } else {
        echo "Nenhum resultado encontrado para o ID fornecido na segunda consulta.";
    }
} else {
    echo "Erro na execução da consulta.";
}

// Agora você pode usar as variáveis $nome, $funcao, etc., como necessário no restante do seu código HTML/PHP.

// Lembre-se de fechar a conexão ao banco de dados, se necessário.
$conexao->close();
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <style>
            body {
                background-color: #121317;
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
            }

            h1 {
                text-align: center;
                color: #fff;
            }
            label{color: #fff;
            }

            form {
                background-color: #24262d;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
                max-width: 400px;
                margin: 0 auto;
                
            }

            label, input {
                display: block;
                margin-bottom: 10px;
            }

            input[type="text"],
            input[type="number"] {
                width: 100%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
            
            }

            .btn-fut {
                background-color: #121317;
                color: #fff;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

            .btn-fut:hover {
                background-color: #0b0c0e;
            }

            #employee-list {
                background-color: #24262d;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
                max-width: 400px;
                margin: 20px auto;
            }
            
            input[type="number"] {
            width: 150px; /* Defina a largura desejada em pixels */
        }

        input[type="text"] {
            width: 380px; /* Defina a largura desejada em pixels */
        }
        
    </style>
</head>
    <body>
    <form  action="saveEdit.php" id="employee-form" method="post" style="padding: 10px; ">
        <input type="hidden" name="id1" value="<?php echo $id1; ?>">
        <input type="hidden" name="id2" value="<?php echo $id2; ?>">

                
    <label for="nome">Nome Completo:</label>
    <input type="text" style="color: black;" id="nome" value="<?php echo $nome?>" name="nome" required><br><br>

    <label for="funcao">Função:</label>
    <input type="text" style="color: black;" id="funcao" value="<?php echo $funcao?>" name="funcao" required><br><br>

    <label for="diaria">Diária:</label>
    <input type="number" style="color: black;" id="diaria" value="<?php echo $diaria?>" name="diaria" required><br><br>

    <label for="chave_pix">Chave Pix:</label>
    <input type="text" style="color: black;" id="chave_pix" value="<?php echo $chave_pix?>" name="chave_pix" required><br><br>

    <label for="tipo_pix">Tipo pix:</label>
    <input type="text" style="color: black;" id="tipo_pix" value="<?php echo $tipo_pix?>" name="tipo_pix" required><br><br> 

    <button type="submit" name="update" id="uptade" class="btn-fut" > Alterar Funcionário </button>
</form>
</body>
</html>