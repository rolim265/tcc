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

    if ($result) {
        if ($result->num_rows == 1) {
            // Usuário encontrado, verificar a senha
            $row = $result->fetch_assoc();
            if (password_verify($senha, $row['senha'])) {
                // Senha correta, login bem-sucedido
                session_start();
                $_SESSION['usuario'] = $usuario; // Iniciar sessão
                header("Location: aaa.php");
                exit;
            } else {
                // Senha incorreta
                $login_failed = true;
                error_log("Senha incorreta para o usuário: $usuario");
            }
        } else {
            // Usuário não encontrado
            $login_failed = true;
            error_log("Usuário não encontrado: $usuario");
        }
    } else {
        $login_failed = true;
        error_log("Erro na consulta SQL: " . $conn->error);
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
<header>
    <a href="#" class="logo"><span>Logo</span></a>
    <ul class="navbar">
        <li><a href="home.html" class="Active">Inicio</a></li>
        <li><a href="sobre.html" class="">Sobre</a></li>
        <li><a href="" class="">Projetos</a></li>
        <li><a href="" class="">Contato</a></li>
    </ul>
</header>

<body>

    <div class="main-login">
        <div class="left-login">
            <h1>Faça seu login<br>E entre para o nosso time</h1>
            <img src="img/astronauta.svg" class="left-login-img" alt="Animação em 2D de uma astronauta em um traje verde flutuando entre estrelas e luas">
        </div>
        <div class="right-login">
            <div class="card-login">
                <h1>LOGIN</h1>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="textfield">
                        <label for="usuario">Usuário</label>
                        <input type="text" name="usuario" placeholder="Digite seu usuário" required>
                    </div>
                    <div class="textfield">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" placeholder="Digite a sua senha" required>
                    </div>
                    <button type="submit" class="btn-login">LOGIN</button>
                    <br><br>
                    <p>Não possui conta, realize o cadastro <a href="cadastro.php">aqui</a></p>
                    <?php if ($login_failed) : ?>
                        <p style="color: red; font-size: 14px; margin-top: 5px;">Usuário ou senha incorretos!</p>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>

</body>

</html>