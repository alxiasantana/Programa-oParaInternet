<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login MVC</title>
</head>
<body>
    <h1>Acesse sua conta</h1>

    <form action="index.php?action=logar" method="POST">
        <p>
            <label>Email:</label>
            <input type="text" name="email">
        </p>

        <p>
            <label>Senha:</label>
            <input type="password" name="senha">
        </p>

        <button type="submit">Entrar</button>
    </form>
</body>
</html>
