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
    <input style="color: white;" type="submit" value="Salvar">
</form>

<?php
else:
    // Se não houver usuário encontrado, exibe apenas a mensagem de erro/sucesso
    echo $msg;
endif;

$conn->close();
?>
