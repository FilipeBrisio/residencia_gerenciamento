<?php
   
    include_once('config.php');
  
    $sql = "SELECT * FROM pagamentos ORDER BY id_funcionario ASC";

    $result = $conexao->query($sql); 



  while ($user_data = mysqli_fetch_assoc($result)) {
   $id_funcionario = $user_data['id_nome_funcionario'];
   $sql_funcionario = "SELECT nome FROM funcionario WHERE id = $id_funcionario";
   $result_funcionario = $conexao->query($sql_funcionario);
                    
   $funcionario_nome = "Nome não encontrado"; // Valor padrão se não houver correspondência.
                    
   if ($result_funcionario && $result_funcionario->num_rows > 0) {
       $funcionario_data = $result_funcionario->fetch_assoc();
       $funcionario_nome = $funcionario_data['nome'];
   }
                    
   $id_diaria = $user_data['id_funcionario'];
   $sql_diaria = "SELECT diaria FROM funcao WHERE id = $id_diaria";
   $result_diaria = $conexao->query($sql_diaria);
                    
   $funcionario_diaria = "Diária não encontrada"; // Valor padrão se não houver correspondência.
                    
   if ($result_diaria && $result_diaria->num_rows > 0) {
       $diaria_data = $result_diaria->fetch_assoc();
       $funcionario_diaria = $diaria_data['diaria'];
   }
   // Faça algo com $funcionario_nome e $funcionario_diaria, por exemplo, imprimir ou armazenar em um array.
                    
       ?>
       
       <tr>
           <td class='espa text-white' style='text-align: left; padding: 10px'><?=$funcionario_nome?></td>
           <td class='espa text-white' style='text-align: left; padding: 10px'><?= $funcionario_diaria?></td>
           <td class='espa text-white' style='text-align: left; padding: 23px ' >
               <?php
               if ($user_data['pago'] == '1') {
                 echo '<span style="color: white;" class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark-text-green-100">Pago</span>';
               } else {
                 echo '<span style="color: white; background-color: red;" class="px-2 py-1 font-semibold leading-tight text-green-700 rounded-full dark:bg-green-700 dark-text-green-100">Pago</span>';
               }
               ?>
           </td>
           <td class='espa text-white' style='text-align: left; padding: 10px'><?=$user_data['data']?></td>
               
           <td class='espa text-white' style='text-align: left; padding: 10px'>
             <span style='margin-left: 30px;'>
             <a href="google.com">
             <img src='lapis.png' alt='Descrição da imagem' style='width: 35; height:30px;'>
             </a>
           </span>
           </td>
       </tr>
   <?php
 } // Fim do loop while
   ?>
