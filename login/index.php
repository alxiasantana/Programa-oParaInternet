<<<<<<< HEAD
<?php
require_once __DIR__ . '/controllers/AuthController.php';

if (!isset($_SESSION)) {
    session_start();
}

$controller = new AuthController();

$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'logar':
        $controller->logar();
        break;

    case 'painel':
        $controller->painel();
        break;

    default:
        $controller->index();
        break;
}
=======
<?php 
include('conexao.php');

if(isset($_POST['email']) || isset($_POST['senha'])){
  if(strlen($_POST['email'])  == 0){
     echo "Preencha seu email";
  }
  else if (strlen($_POST['senha']) == 0) {
    echo "Preencha sua senha";
  }

  else{
    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = $mysqli->real_escape_string($_POST['senha']);

    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";

    $lista_usuarios = $mysqli->query($sql);
    $quantidade = $lista_usuarios->num_rows;

    if($quantidade == 1){
      $usuario = $lista_usuarios->fetch_assoc();

      if(!isset($_SESSION)){
        session_start();
    }
      $_SESSION['id'] = $usuario['id'];
      $_SESSION['nome'] = $usuario['nome'];

      header("Location: painel.php");
    }
   else{
    echo "Falha ao login";
 }
  }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Acesse sua conta</h1>
    <form action="" method="POST">
        <p>
            <label>E-mail</label>
            <input type="text" name="email">
        </p>
        <p>
            <label>Senha</label>
            <input type="password" name="senha">
        </p>
        <p>
            <button type="submit">Entrar</button>
        </p>
    </form>
</body>
</html>

>>>>>>> 292b827e52ebbb99303279abebb0cfbb2f16be45
