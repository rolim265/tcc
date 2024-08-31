<?php
// Conectar ao banco de dados
include('conexao.php');

// Verificar se o ID do vídeo foi passado pela URL
if (isset($_GET['id'])) {
    $video_id = intval($_GET['id']); // Certificar que o ID é um número inteiro

    // Consultar o banco de dados para obter as informações do vídeo
    $sql = "SELECT * FROM video WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $video_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $video = $result->fetch_assoc();
    } else {
        echo "<p>Vídeo não encontrado.</p>";
        exit;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<p>ID do vídeo não fornecido.</p>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($video['titulo'], ENT_QUOTES, 'UTF-8'); ?></title>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            background-color: #2e2e2e;
            color: #f5f5f5;
            text-align: center;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #333;
            border-radius: 10px;
        }
        .video-container {
            position: relative;
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
            max-width: 100%;
            background: #000;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        h1 {
            color: #f5f5f5;
        }
        .description {
            font-size: 16px;
            line-height: 1.5;
            color: #f5f5f5;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="video-container">
            <iframe src="https://www.youtube.com/embed/<?php echo htmlspecialchars(getYoutubeVideoId($video['link']), ENT_QUOTES, 'UTF-8'); ?>" frameborder="0" allowfullscreen></iframe>
        </div>
        <h1><?php echo htmlspecialchars($video['titulo'], ENT_QUOTES, 'UTF-8'); ?></h1>
    </div>
</body>
</html>

<?php
// Função para extrair o ID do vídeo do YouTube do link
function getYoutubeVideoId($url) {
    $video_id = '';
    $url_parts = parse_url($url);
    if (isset($url_parts['query'])) {
        parse_str($url_parts['query'], $query_vars);
        if (isset($query_vars['v'])) {
            $video_id = $query_vars['v'];
        }
    } else if (preg_match("/^(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/", $url, $matches)) {
        $video_id = $matches[1];
    }
    return $video_id;
}
?>
