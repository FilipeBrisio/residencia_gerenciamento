<?php
        // Coloque o código PHP aqui para exibir os dados das tabelas clientes e veiculos
        include_once('config.php');

        // Consulta SQL para selecionar dados de clientes e veículos
        $sql = "SELECT clientes.ClienteID AS ClienteID, clientes.Nome AS Cliente, clientes.CPF, veiculos.Carro, veiculos.Placa, clientes.Credito FROM clientes
        INNER JOIN veiculos ON clientes.ClienteID = veiculos.ClienteID";

        // Executa a consulta
        $resultado = $conexao->query($sql);

        // Verifica se há resultados
        if ($resultado->num_rows > 0) {
            // Itera sobre os resultados e exibe os dados nas linhas da tabela
            while ($row = $resultado->fetch_assoc()) {
                echo "<tr onclick=\"acao('{$row['ClienteID']}');\">";
                echo "<td class='espa text-white' style='text-align: left; padding: 10px;'>$row[Cliente]</td>";
                echo "<td class='espa text-white' style='text-align: left; padding: 15px;'>$row[CPF]</td>";
                echo "<td class='espa text-white' style='text-align: left; padding: 15px;'>$row[Carro]</td>";
                echo "<td class='espa text-white' style='text-align: left; padding: 15px;'>$row[Placa]</td>";
                echo "<td class='espa text-white' style='text-align: left; padding: 10px;'>$row[Credito]</td>";
                echo "</tr>";
            }
        } else {
            // Se não houver resultados, exibe uma mensagem de aviso
            echo "<tr><td colspan='5'>Nenhum cliente encontrado.</td></tr>";
        }

        // Fecha a conexão
        $conexao->close();
        ?>
    </tbody>
    <div class="modal">
      
      <div class="textos" id="modalContent">>

      </div>
                    
      <div class="fechar" onclick="fecharModal()"></div>
      
    </div>


    <script>
      function acao(id1,id2) {
        document.querySelector('.modal').style.display = 'block';

        fetch(`edit.php?id1=${id1}`)
          .then(response => response.text())
          .then(data => {
            // Coloque o conteúdo do arquivo "edit.php" no modal
            document.getElementById('modalContent').innerHTML = data;
          })
          .catch(error => console.error(error));
      }

      function fecharModal() {
        document.querySelector('.modal').style.display = 'none';
      }
</script>