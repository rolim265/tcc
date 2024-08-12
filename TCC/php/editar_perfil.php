<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tcc";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$msg = '';
$usuario = null;

// Verifica se o ID do usuário está especificado na URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = mysqli_real_escape_string($conn, $_POST['nome']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $cartao = mysqli_real_escape_string($conn, $_POST['cartao']);
        $conhecimento = mysqli_real_escape_string($conn, $_POST['conhecimento']);
        $renda_mensal = mysqli_real_escape_string($conn, $_POST['renda_mensal']);
        $valor_final = mysqli_real_escape_string($conn, $_POST['valor_final']);

        $query = "UPDATE usuarios SET nome = '$nome', email = '$email', cartao = '$cartao', conhecimento = '$conhecimento', renda_mensal = '$renda_mensal', valor_final = '$valor_final' WHERE id = $id";

        if (mysqli_query($conn, $query)) {
            // Redireciona para aaa.php após a atualização bem-sucedida
            header("Location: aaa.php");
            exit();
        } else {
            $msg = '<div class="alert alert-danger">Erro ao atualizar dados: ' . mysqli_error($conn) . '</div>';
        }
    }

    $query = "SELECT * FROM usuarios WHERE id = $id";
    $resultado = mysqli_query($conn, $query);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $usuario = mysqli_fetch_assoc($resultado);
    } else {
        $msg = '<div class="alert alert-warning">Usuário não encontrado.</div>';
    }
} else {
    $msg = '<div class="alert alert-warning">ID do usuário não especificado.</div>';
}

// Se houver um usuário encontrado para o ID, exibe o formulário de edição
if ($usuario):
?>
<link rel="stylesheet" href="../csss/editar.css">

<form method="post" action="editar_perfil.php?id=<?php echo $id; ?>">
    <label style="color: white;" for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($usuario['nome']); ?>"><br><br>
    <label style="color: white;" for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($usuario['email']); ?>"><br><br>
    <label style="color: white;" for="cartao">Cartão:</label>
    <select id="cartao" name="cartao">
        <option style="color: white;" value="débito" <?php if ($usuario['cartao'] == 'débito') echo 'selected'; ?>>Débito</option>
        <option style="color: white;" value="crédito" <?php if ($usuario['cartao'] == 'crédito') echo 'selected'; ?>>Crédito</option>
    </select><br><br>
    <label style="color: white;" for="conhecimento">Conhecimento:</label>
    <select id="conhecimento" name="conhecimento">
        <option style="color: white;" value="básico" <?php if ($usuario['conhecimento'] == 'básico') echo 'selected'; ?>>Básico</option>
        <option style="color: white;" value="médio" <?php if ($usuario['conhecimento'] == 'médio') echo 'selected'; ?>>Médio</option>
        <option style="color: white;" value="avançado" <?php if ($usuario['conhecimento'] == 'avançado') echo 'selected'; ?>>Avançado</option>
    </select><br><br>
    <label style="color: white;" for="renda_mensal">Renda Mensal:</label>
    <input style="color: black;" type="text" id="renda_mensal" name="renda_mensal" value="<?php echo htmlspecialchars($usuario['renda_mensal']); ?>"><br><br>
    <label style="color: white;" for="valor_final">Valor que sobra no Final do mês:</label>
    <input style="color: black;" type="text" id="valor_final" name="valor_final" value="<?php echo htmlspecialchars($usuario['valor_final']); ?>"><br><br>
    
    <!-- Novo botão integrado -->
    <button>
        <div class="svg-wrapper-1">
            <div class="svg-wrapper">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    width="30"
                    height="30"
                    class="icon"
                >
                    <path
                        d="M22,15.04C22,17.23 20.24,19 18.07,19H5.93C3.76,19 2,17.23 2,15.04C2,13.07 3.43,11.44 5.31,11.14C5.28,11 5.27,10.86 5.27,10.71C5.27,9.33 6.38,8.2 7.76,8.2C8.37,8.2 8.94,8.43 9.37,8.8C10.14,7.05 11.13,5.44 13.91,5.44C17.28,5.44 18.87,8.06 18.87,10.83C18.87,10.94 18.87,11.06 18.86,11.17C20.65,11.54 22,13.13 22,15.04Z"
                    ></path>
                </svg>
            </div>
        </div>
        <span>Save</span>
    </button>

</form>

<?php
else:
    // Se não houver usuário encontrado, exibe apenas a mensagem de erro/sucesso
    echo $msg;
endif;

$conn->close();
?>
