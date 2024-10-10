<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tcc";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se houve erro na conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Define o ID diretamente
$id = 2;

// Query para buscar o vídeo, a pergunta e as alternativas pelo ID
$sql = "SELECT video_url, pergunta, alternativa1, alternativa2, alternativa3, alternativa4, resposta_correta FROM capitulo WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id); // Liga o parâmetro ID à consulta
$stmt->execute();
$stmt->bind_result($video_url, $pergunta, $alternativa1, $alternativa2, $alternativa3, $alternativa4, $resposta_correta);

// Exibe os resultados
if ($stmt->fetch()) {
    // Exibe o vídeo
    if ($video_url) {
        echo "<h2>Vídeo:</h2>";
        echo "<video width='600' controls>";
        echo "<source src='$video_url' type='video/mp4'>";
        echo "Seu navegador não suporta a tag de vídeo.";
        echo "</video><br>";
    } else {
        echo "Nenhum vídeo disponível.<br>";
    }

    // Exibe a pergunta
    echo "<h2>Pergunta:</h2><p>$pergunta</p>";

    // Exibe as alternativas como um formulário
    echo '<form method="POST" action="">';
    echo '<input type="radio" name="resposta" value="1"> ' . htmlspecialchars($alternativa1) . '<br>';
    echo '<input type="radio" name="resposta" value="2"> ' . htmlspecialchars($alternativa2) . '<br>';
    echo '<input type="radio" name="resposta" value="3"> ' . htmlspecialchars($alternativa3) . '<br>';
    echo '<input type="radio" name="resposta" value="4"> ' . htmlspecialchars($alternativa4) . '<br>';
    echo '<input type="submit" value="Enviar">';
    echo '</form>';

    // Verifica a resposta após o envio do formulário
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $resposta_usuario = $_POST['resposta'];

        // Compara a resposta do usuário com a resposta correta
        if ($resposta_usuario == $resposta_correta) {
            echo "<p>Resposta correta!</p>";
        } else {
            echo "<p>Resposta incorreta. A correta é: " . htmlspecialchars(${"alternativa" . $resposta_correta}) . "</p>";
        }
    }
} else {
    echo "Nenhum conteúdo encontrado com esse ID.";
}

$stmt->close();
$conn->close();
?>
<!-- $sql = "SELECT pergunta, alternativa_errada1, alternativa_errada2, alternativa_errada3, resposta_correta FROM capitulo_um WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id); // Liga o parâmetro ID à consulta
            $stmt->execute();
            $stmt->bind_result($pergunta, $alternativa_errada1, $alternativa_errada2, $alternativa_errada3, $resposta);
            echo "<h2>Pergunta:</h2><p>$pergunta</p>";

            // Exibe as alternativas como um formulário
            echo '<form method="POST" action="">';
            echo '<input type="radio" name="resposta" value="1"> ' . htmlspecialchars($alternativa_errada1) . '<br>';
            echo '<input type="radio" name="resposta" value="2"> ' . htmlspecialchars($alternativa_errada2) . '<br>';
            echo '<input type="radio" name="resposta" value="3"> ' . htmlspecialchars($alternativa_errada3) . '<br>';
            echo '<input type="radio" name="resposta" value="4"> ' . htmlspecialchars($resposta) . '<br>';
            echo '<input type="submit" value="Enviar">';
            echo '</form>';
        
            // Verifica a resposta após o envio do formulário
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $resposta_usuario = $_POST['resposta'];
        
                // Compara a resposta do usuário com a resposta correta
                if ($resposta_usuario == $resposta) {
                    echo "<p>Resposta correta!</p>";
                } else {
                    echo "<p>Resposta incorreta. A correta é: " . htmlspecialchars(${"alternativa" . $resposta}) . "</p>";
                }
            }
         else {
            echo "Nenhum conteúdo encontrado com esse ID.";
        } -->