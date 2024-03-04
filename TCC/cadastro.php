<?php
// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     // Conectar ao banco de dados (substitua essas informações com as suas)
   $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tcc";

    // Criar conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Escapar caracteres especiais para evitar SQL Injection
    $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $senha = $_POST['senha'];
    $senha_confirmar = $_POST['senha_confirmar'];

    // Verificar se as senhas coincidem
    if ($senha !== $senha_confirmar) {
        $error_message = "As senhas não coincidem!";
    } else {
        // Criptografar a senha
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

        // Consulta SQL para inserir os dados do usuário
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$usuario', '$email', '$senha_hash')";

        if ($conn->query($sql) === TRUE) {
            // Cadastro realizado com sucesso!
            // Você pode redirecionar o usuário para outra página aqui
            header("Location: aaa.html");
            exit;
        } else {
            $error_message = "Erro ao cadastrar usuário: " . $conn->error;
        }
    }

    // Fechar conexão
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>

    <link rel="stylesheet" href="csss/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">

    <style>
        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    
    <div class="main-login">
        <div class="left-login">
            <h1>Faça seu cadastro<br>e entre para o nosso time</h1>
            <img src="img/astronauta.svg" class="left-login-img" alt="Animação em 2D de uma astronauta em um traje verde flutuando entre estrelas e luas">
        </div>
        <div class="right-login">
            <div class="card-login">
                <h1>CADASTRO</h1>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="textfield">
                        <label for="usuario">Usuário</label>
                        <input type="text" name="usuario" placeholder="Digite seu usuário" required>
                    </div>
                    <div class="textfield"> 
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Digite seu email" required>
                    </div>
                    <div class="textfield"> 
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" placeholder="Digite a sua senha" required>
                    </div>
                    <div class="textfield"> 
                        <label for="senha_confirmar">Confirmar Senha</label>
                        <input type="password" name="senha_confirmar" placeholder="Confirme sua senha" required>
                    </div>
                    <button type="submit" class="btn-login">CADASTRAR</button>
                    <?php if (isset($error_message)): ?>
                        <p class="error-message"><?php echo $error_message; ?></p>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
