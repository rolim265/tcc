<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tcc";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verifica se o ID foi enviado via GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Seleciona a pergunta e alternativas pelo ID
    $sql = "SELECT pergunta, resposta1, resposta2, resposta3, resposta4, respostacorreta FROM perguntas WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verifica se a pergunta foi encontrada
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo json_encode(["error" => "Pergunta não encontrada"]);
    }

    $stmt->close();
}

$conn->close();
?>
