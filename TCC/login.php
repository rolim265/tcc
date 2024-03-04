<?php
// Defina uma variável para verificar se o login falhou
$login_failed = false;

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
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);

    // Consulta SQL para verificar se o usuário existe
    $sql = "SELECT * FROM usuarios WHERE nome = '$usuario'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Usuário encontrado, verificar a senha
        $row = $result->fetch_assoc();
        if (password_verify($senha, $row['senha'])) {
            // Senha correta, login bem-sucedido
            echo "Login bem-sucedido!";
            // Você pode redirecionar o usuário para outra página aqui
            header("Location: aaa.html");
            exit;
        } else {
            // Senha incorreta
            $login_failed = true;
        }
    } else {
        // Usuário não encontrado
        $login_failed = true;
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
    <title>Login</title>

    <link rel="stylesheet" href="csss/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">

</head>

<body>

    <div class="main-login">
        <div class="left-login">
            <h1>Faça seu login<br>E entre para o nosso time</h1>
            <img src="img/astronauta.svg" class="left-login-img"
                alt="Animação em 2D de uma astronauta em um traje verde flutuando entre estrelas e luas">
        </div>
        <div class="right-login">
            <div class="card-login">
                <h1>LOGIN</h1>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="textfield">
                        <label for="usuario">Usuário</label>
                        <input type="text" name="usuario" placeholder="Digite seu usuário">
                    </div>
                    <div class="textfield">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" placeholder="Digite a sua senha">
                    </div>
                    <button type="submit" class="btn-login">LOGIN</button>
                    <?php if ($login_failed): ?>
                        <p style="color: red; font-size: 14px; margin-top: 5px;">Usuário ou senha incorretos!</p>
                    <?php endif; ?>
                </form>
            </div>
        </div>

    </div>



</body>

</html>