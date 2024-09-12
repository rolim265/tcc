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
            width: 850px;
            height: 500px;
            border-radius: 5px;
            margin-right: 10px;
        }

        .video-item2 img {
            width: 150px;
            height: 100px;
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

        .button-50 {
            appearance: button;
            background-color: #313131;
            background-image: none;
            border: 1px solid #000;
            border-radius: 4px;
            box-shadow: #fff 4px 4px 0 0, #000 4px 4px 0 1px;
            box-sizing: border-box;
            color: #fff;
            cursor: pointer;
            display: inline-block;
            font-family: ITCAvantGardeStd-Bk, Arial, sans-serif;
            font-size: 14px;
            font-weight: 400;
            line-height: 20px;
            margin: 0 5px 10px 0;
            overflow: visible;
            padding: 12px 40px;
            text-align: center;
            text-transform: none;
            touch-action: manipulation;
            user-select: none;
            -webkit-user-select: none;
            vertical-align: middle;
            white-space: nowrap;
        }

        .button-50:focus {
            text-decoration: none;
        }

        .button-50:hover {
            text-decoration: none;
        }

        .button-50:active {
            box-shadow: rgba(0, 0, 0, .125) 0 3px 5px inset;
            outline: 0;
        }

        .button-50:not([disabled]):active {
            box-shadow: #fff 2px 2px 0 0, #000 2px 2px 0 1px;
            transform: translate(2px, 2px);
        }

        @media (min-width: 768px) {
            .button-50 {
                padding: 12px 50px;
            }
        }

        .button-85 {
            padding: 0.6em 2em;
            border: none;
            outline: none;
            color: rgb(255, 255, 255);
            background: #111;
            cursor: pointer;
            position: relative;
            z-index: 0;
            border-radius: 10px;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
        }

        .button-85:before {
            content: "";
            background: linear-gradient(45deg,
                    #00FF00,
                    #32CD32,
                    #228B22,
                    #006400,
                    #98FB98,
                    #9ACD32,
                    #2E8B57 ,
                    #7CFC00,
                    #98FB98);
            position: absolute;
            top: -2px;
            left: -2px;
            background-size: 400%;
            z-index: -1;
            filter: blur(5px);
            -webkit-filter: blur(5px);
            width: calc(100% + 4px);
            height: calc(100% + 4px);
            animation: glowing-button-85 20s linear infinite;
            transition: opacity 0.3s ease-in-out;
            border-radius: 10px;
        }

        @keyframes glowing-button-85 {
            0% {
                background-position: 0 0;
            }

            50% {
                background-position: 400% 0;
            }

            100% {
                background-position: 0 0;
            }
        }

        .button-85:after {
            z-index: -1;
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            background: #222;
            left: 0;
            top: 0;
            border-radius: 10px;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .sidebar,
            .content {
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

        <!-- Modal de Edição -->
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

            <!-- Capítulo 1 -->
            <div class="dropdown">
                <div class="journey-item">
                    <button class="button-50" role="button">Capítulo 1</button>
                </div>
                <div class="dropdown-content">
                    <?php
                    $sql = "SELECT * FROM capitulo_um";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo '<div class="video-list">';
                        while ($row = $result->fetch_assoc()) {
                            $videoUrl = htmlspecialchars($row["link"], ENT_QUOTES, 'UTF-8');
                            $videoId = getYoutubeVideoId($videoUrl);

                            $thumbnailUrl = $videoId ? 'https://img.youtube.com/vi/' . $videoId . '/hqdefault.jpg' : '../img/default-thumbnail.jpg';

                            // Não usar <a href> para evitar redirecionamento
                            echo '<div class="video-item2">';
                            echo '<img src="' . $thumbnailUrl . '" alt="' . htmlspecialchars($row["nome"], ENT_QUOTES, 'UTF-8') . '">';
                            echo '<button class="button-85" role="button" onclick="loadVideo(\'' . $videoId . '\')">' . htmlspecialchars($row["nome"], ENT_QUOTES, 'UTF-8') . '</button>';
                            echo '</div>';
                        }
                        echo '</div>';
                    } else {
                        echo 'Nenhum vídeo encontrado.';
                    }
                    ?>
                </div>
            </div>

            <!-- Capítulo 2 -->
            <div class="dropdown">
                <div class="journey-item">
                    <button class="button-50" role="button">Capítulo 2</button>
                </div>
                <div class="dropdown-content">
                    <?php
                    $sql = "SELECT * FROM video";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo '<div class="video-list">';
                        while ($row = $result->fetch_assoc()) {
                            $videoUrl = htmlspecialchars($row["link"], ENT_QUOTES, 'UTF-8');
                            $videoId = getYoutubeVideoId($videoUrl);

                            $thumbnailUrl = $videoId ? 'https://img.youtube.com/vi/' . $videoId . '/hqdefault.jpg' : 'default-thumbnail.jpg';

                            // Usar o botão para carregar o vídeo no iframe
                            echo '<div class="video-item2">';
                            echo '<img src="' . $thumbnailUrl . '" alt="' . htmlspecialchars($row["titulo"], ENT_QUOTES, 'UTF-8') . '">';
                            echo '<button class="button-85" role="button" onclick="loadVideo(\'' . $videoId . '\')">' . htmlspecialchars($row["titulo"], ENT_QUOTES, 'UTF-8') . '</button>';
                            echo '</div>';
                        }
                        echo '</div>';
                    } else {
                        echo 'Nenhum vídeo encontrado.';
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="right-videos">
            <h2>Seu Cinema</h2>
            <div id="cinema">
                <!-- O vídeo será carregado aqui -->
                <iframe id="videoPlayer" width="850" height="500" src="" frameborder="0" allowfullscreen></iframe>
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

        // Função para carregar o vídeo no iframe
        function loadVideo(videoId) {
            var videoPlayer = document.getElementById('videoPlayer');
            videoPlayer.src = "https://www.youtube.com/embed/" + videoId;
        }
    </script>
</body>

</html>

<?php
// Função para extrair o ID do vídeo do YouTube
function getYoutubeVideoId($url)
{
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