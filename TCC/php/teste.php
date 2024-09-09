<?php
include('conexao.php');

// Iniciar sessão no topo da página
session_start();

// Verificar se a variável de sessão está definida e o usuário está logado
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $nome = $_SESSION['nome'];
    $email = $_SESSION['email'];
} else {
    // Se o usuário não estiver logado, redirecione para a página de login
    header("Location: login.php");
    exit;
}

// Fechar conexão com o banco de dados
$conn->close();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jornada de Aprendizagem</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #2e2e2e;
            color: #f5f5f5;
        }

        header {
            background-color: #333;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #f5f5f5;
        }

        .logo img {
            height: 50px;
        }

        .navbar {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        .navbar li {
            margin: 0 15px;
        }

        .navbar a {
            color: #f5f5f5;
            text-decoration: none;
            font-weight: bold;
        }

        .navbar a.active {
            text-decoration: underline;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropbtn {
            background-color: #4CAF50;
            color: white;
            font-size: 1rem;
            font-weight: 500;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            padding: 10px 20px;
            display: flex;
            align-items: center;
        }

        .dropbtn:hover {
            background-color: #3e8e41;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #333;
            min-width: 160px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            border-radius: 5px;
            z-index: 1;
            padding: 10px 0;
        }

        .dropdown-content a {
            color: #f5f5f5;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #555;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            border-radius: 10px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            padding: 20px;
        }

        .sidebar {
            flex: 1 1 30%;
            background-color: #333;
            padding: 20px;
            border-radius: 10px;
            margin-right: 20px;
        }

        .content {
            flex: 2 1 70%;
            background-color: #333;
            padding: 20px;
            border-radius: 10px;
        }

        .header {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .progress {
            background-color: #555;
            height: 8px;
            border-radius: 5px;
            overflow: hidden;
            margin-bottom: 10px;
        }

        .progress-bar {
            background-color: #4CAF50;
            height: 100%;
            transition: width 300ms;
        }

        .section {
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .video-list {
            display: flex;
            flex-direction: column;
        }

        .video-item {
            background-color: #444;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
            display: flex;
            align-items: center;
        }

        .video-item img {
            width: 120px;
            height: 90px;
            border-radius: 5px;
            margin-right: 10px;
        }

        .video-item a {
            color: #f5f5f5;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
        }

        .video-item a:hover {
            text-decoration: underline;
        }

        .button {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .button:hover {
            background-color: #3e8e41;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .sidebar, .content {
                margin-right: 0;
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
    <header>
        <a href="#" class="logo"><img src="../img/logocoffe.png" alt="Logo"></a>
        <ul class="navbar">
            <li><a href="../php/aaa.php" class="active">Início</a></li>
            <li><a href="../html/sobre.html">Sobre</a></li>
            <li><a href="aulas.php">Vídeos Aulas</a></li>
            <li><a href="#">Contato</a></li>
        </ul>
        <div class="dropdown">
            <button onclick="toggleDropdown()" class="dropbtn"><?php echo htmlspecialchars($nome, ENT_QUOTES, 'UTF-8'); ?></button>
            <div id="dropdownContent" class="dropdown-content">
                <a id="editBtn">Editar</a>
                <a href="#">Email: <?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?></a>
                <hr />
                <a href="logout.php" class="user"><i class="ri-user-fill"></i>Log out</a>
            </div>
        </div>
        <!-- O Modal de Edição -->
        <div id="editModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Editar Perfil</h2>
                <div id="modal-body"></div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="sidebar">
            <h2 class="header">Jornada de Aprendizagem</h2>
            <div class="progress">
                <div class="progress-bar" style="width: 33.33%"></div>
            </div>
            <div class="progress-info">
                <div class="info">Capítulo 1/3</div>
                <div class="info right">Faltam 95 palavras</div>
            </div>
            <div class="section">
                <div class="section-title">Iniciante I</div>
            </div>
            <!-- Capítulo 1 -->
            <div class="dropdown">
                <div class="journey-item">
                    <span>Capítulo 1</span>
                </div>
                <div class="dropdown-content">
               <?php
// Inclui o arquivo de conexão com o banco de dados
include('conexao.php');

// Define a consulta SQL para selecionar todos os registros da tabela 'capitulo_um'
$sql = "SELECT * FROM capitulo_um";

// Executa a consulta no banco de dados
$result = $conn->query($sql);

// Verifica se a consulta retornou algum resultado
if ($result->num_rows > 0) {
    // Se há resultados, cria um contêiner para a lista de vídeos
    echo '<div class="video-list">';
    
    // Percorre todos os resultados e exibe cada um
    while ($row = $result->fetch_assoc()) {
        echo '<div class="video-item">';
        
        // Extrai o ID do vídeo do link
        $videoUrl = htmlspecialchars($row["link"], ENT_QUOTES, 'UTF-8');
        $videoId = '';
        
        // Extrai o ID do vídeo do link do YouTube
        if (preg_match('/(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?v=([^\s&]+)/', $videoUrl, $matches)) {
            $videoId = $matches[1];
        } elseif (preg_match('/(?:https?:\/\/)?(?:www\.)?youtu\.be\/([^\s&]+)/', $videoUrl, $matches)) {
            $videoId = $matches[1];
        }
        
        // Constrói a URL da miniatura do YouTube
        if (!empty($videoId)) {
            $thumbnailUrl = 'https://img.youtube.com/vi/' . $videoId . '/hqdefault.jpg';
        } else {
            // Usa uma imagem padrão se o ID do vídeo não puder ser extraído
            $thumbnailUrl = '../img/default-thumbnail.jpg';
        }
        
        // Exibe a imagem e o título do vídeo
        echo '<img src="' . $thumbnailUrl . '" alt="' . htmlspecialchars($row["nome"], ENT_QUOTES, 'UTF-8') . '">';
        echo '<a href="' . $videoUrl . '">' . htmlspecialchars($row["nome"], ENT_QUOTES, 'UTF-8') . '</a>';
        echo '</div>';
    }
    
    echo '</div>';
} else {
    // Se não há resultados, exibe uma mensagem informando isso
    echo 'Nenhum vídeo encontrado.';
}

// Fecha a conexão com o banco de dados
$conn->close();
?>

                </div>
            </div>
            <div class="dropdown">
                <div class="journey-item">
                    <span>Capítulo 2</span>
                </div>
                <div class="dropdown-content">
 <?php
// Inclui o arquivo de conexão com o banco de dados
include('conexao.php');

// Define a consulta SQL para selecionar todos os registros da tabela 'video'
$sql = "SELECT * FROM video";

// Executa a consulta no banco de dados
$result = $conn->query($sql);

// Verifica se a consulta retornou algum resultado
if ($result->num_rows > 0) {
    // Se há resultados, cria um contêiner para a lista de vídeos
    echo '<div class="video-list">';
    
    // Percorre todos os resultados e exibe cada um
    while ($row = $result->fetch_assoc()) {
        echo '<div class="video-item">';
        
        // Extrai o ID do vídeo do link
        $videoUrl = htmlspecialchars($row["link"], ENT_QUOTES, 'UTF-8');
        $videoId = '';
        
        // Extrai o ID do vídeo do link do YouTube
        if (preg_match('/(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?v=([^\s&]+)/', $videoUrl, $matches)) {
            $videoId = $matches[1];
        } elseif (preg_match('/(?:https?:\/\/)?(?:www\.)?youtu\.be\/([^\s&]+)/', $videoUrl, $matches)) {
            $videoId = $matches[1];
        }
        
        // Constrói a URL da miniatura do YouTube
        if (!empty($videoId)) {
            $thumbnailUrl = 'https://img.youtube.com/vi/' . $videoId . '/hqdefault.jpg';
        } else {
            // Usa uma imagem padrão se o ID do vídeo não puder ser extraído
            $thumbnailUrl = 'default-thumbnail.jpg';
        }
        
        // Exibe a imagem e o título do vídeo
        echo '<img src="' . $thumbnailUrl . '" alt="' . htmlspecialchars($row["titulo"], ENT_QUOTES, 'UTF-8') . '">';
        echo '<a href="' . $videoUrl . '">' . htmlspecialchars($row["titulo"], ENT_QUOTES, 'UTF-8') . '</a>';
        echo '</div>';
    }
    
    echo '</div>';
} else {
    // Se não há resultados, exibe uma mensagem informando isso
    echo 'Nenhum vídeo encontrado.';
}

// Fecha a conexão com o banco de dados
$conn->close();
?>

                </div>
            </div>
        </div>
        </div>
       
    </div>
    <script>
        function toggleDropdown() {
            document.getElementById("dropdownContent").classList.toggle("show");
        }

        var modal = document.getElementById("editModal");
        var btn = document.getElementById("editBtn");
        var span = document.getElementsByClassName("close")[0];

        btn.onclick = function() {
            modal.style.display = "block";
        }

        span.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>
