<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tela de Login</title>
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      background-color: #121317;
    }
    .tela-login {
      background-color: #24262d;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      padding: 80px;
      border-radius: 15px;
      color: white;
    }
    input {
      padding: 15px;
      border: none;
      outline: none;
      font-size: 15px;
    }
    .botao_enviar {
      background-color: #121317;
      border: none;
      padding: 15px;
      width: 100%;
      border-radius: 10px;
      color: white;
      font-size: 15px;
    }
    .botao_enviar:hover {
      background-color: #0b0c0e;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <form action="testeLogin.php" method="POST">
    <div class="tela-login">
      <h1>Login</h1>
      <input type="text" name="usuario" placeholder="Usuário">
      <br><br>
      <input type="password" name="senha" placeholder="Senha">
      <br><br>
      <input class="botao_enviar" type="submit" name="submit" value="ENVIAR">
    </div>
  </form>
</body>
</html>