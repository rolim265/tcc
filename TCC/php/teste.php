<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicativo de Aprendizado de Idiomas</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            background-color: #2e2e2e;
            color: #f5f5f5;
        }

        .container {
            display: flex;
            justify-content: space-around;
            padding: 20px;
        }

        .left-section {
            width: 30%;
            background-color: #333;
            padding: 20px;
            border-radius: 10px;
        }

        .right-section {
            width: 60%;
            background-color: #333;
            padding: 20px;
            border-radius: 10px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
            color: #f5f5f5;
        }

        .stats {
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin-bottom: 20px;
        }

        .stats .stat {
            display: flex;
            align-items: center;
            color: #f5f5f5;
        }

        .stats .stat span {
            margin-left: 5px;
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
        }

        .journey {
            margin-bottom: 20px;
        }

        .journey-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #444;
            padding: 10px;
            margin-bottom: 5px;
            border-radius: 5px;
        }

        .journey-item:hover {
            background-color: #555;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #333;
            min-width: 160px;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.3);
            border-radius: 5px;
            z-index: 1;
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

        .dropdown:hover .dropbtn {
            background-color: #555;
        }

        .right-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .right-header .success-icon {
            width: 50px;
            height: 50px;
            background-color: #444;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .right-header .success-icon svg {
            width: 20px;
            height: 20px;
            fill: #ff9800;
        }

        .right-header .success-text {
            font-size: 18px;
            font-weight: bold;
            margin-left: 10px;
        }

        .extra-mile {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .extra-mile .card {
            width: 30%;
            background-color: #444;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            color: #f5f5f5;
            position: relative;
        }

        .card .title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card .description {
            font-size: 14px;
            line-height: 1.5;
            margin-bottom: 10px;
        }

        .card .action {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
        }

        .card .action:hover {
            background-color: #3e8e41;
        }

        .card .points {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #ff9800;
            color: #fff;
            padding: 5px 10px;
            border-radius: 50%;
            font-size: 12px;
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
    </style>
</head>
<body>
    <div class="container">
        <div class="left-section">
            <div class="header">
                <h2>Jornada de Aprendizado</h2>
            </div>
            <div class="stats">
                <div class="stat">
                    <span>1</span>
                    <span>dia de progresso</span>
                </div>
                <div class="stat">
                    <span>5</span>
                    <span>palavras</span>
                </div>
            </div>
            <div class="progress">
                <div class="progress-bar" style="width: 33.33%;"></div>
            </div>
            <div class="journey">
                <div class="journey-item">
                    <span>Capítulo 1/3</span>
                    <span>95 palavras restantes</span>
                </div>
            </div>
            <div class="journey">
                <div class="dropdown">
                    <div class="journey-item">
                        <span>Iniciante I</span>
                    </div>
                    <div class="dropdown-content">
                        <a href="#">Texto ou opção 1</a>
                        <a href="#">Texto ou opção 2</a>
                        <a href="#">Texto ou opção 3</a>
                    </div>
                </div>
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
                        
                        // Itera sobre cada linha do resultado
                        while ($row = $result->fetch_assoc()) {
                            // Extrai o ID do vídeo do YouTube do link fornecido
                            $video_id = getYoutubeVideoId($row["link"]);
                            
                            // Constrói a URL da miniatura do vídeo
                            $thumbnail_url = "https://img.youtube.com/vi/" . $video_id . "/mqdefault.jpg";
                            
                            // Exibe cada item de vídeo dentro de um contêiner
                            echo '<div class="video-item">';
                            // Cria um link para a página do vídeo com o ID do vídeo como parâmetro
                            echo '<a href="video_page.php?id=' . htmlspecialchars($row["id"], ENT_QUOTES, 'UTF-8') . '">';
                            // Exibe a miniatura do vídeo
                            echo '<img src="' . htmlspecialchars($thumbnail_url, ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($row["titulo"], ENT_QUOTES, 'UTF-8') . '">';
                            // Exibe o título do vídeo
                            echo '<span>' . htmlspecialchars($row["titulo"], ENT_QUOTES, 'UTF-8') . '</span>';
                            echo '</a>';
                            echo '</div>';
                        }
                        
                        // Fecha o contêiner da lista de vídeos
                        echo '</div>';
                    } else {
                        // Se não houver resultados, exibe uma mensagem
                        echo "<p>0 resultados</p>";
                    }

                    // Fecha a conexão com o banco de dados
                    $conn->close();

                    // Função para extrair o ID do vídeo do YouTube do link
                    function getYoutubeVideoId($url) {
                        $video_id = '';
                        
                        // Analisa a URL para obter seus componentes
                        $url_parts = parse_url($url);
                        
                        // Verifica se a URL contém parâmetros de consulta
                        if (isset($url_parts['query'])) {
                            parse_str($url_parts['query'], $query_vars);
                            // Se o parâmetro 'v' estiver presente, ele é o ID do vídeo
                            if (isset($query_vars['v'])) {
                                $video_id = $query_vars['v'];
                            }
                        } 
                        // Caso a URL não tenha parâmetros de consulta, tenta extrair o ID com uma expressão regular
                        else if (preg_match("/^(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/", $url, $matches)) {
                            $video_id = $matches[1];
                        }
                        
                        // Retorna o ID do vídeo
                        return $video_id;
                    }
                    ?>

                    </div>
                </div>
                <div class="dropdown">
                    <div class="journey-item">
                        <span>Capítulo 2</span>
                    </div>
                    <div class="dropdown-content">
                    <?php
                        include('conexao.php');

                        $sql = "SELECT * FROM video";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            echo '<div class="video-list">';
                            while ($row = $result->fetch_assoc()) {
                                $video_id = getYoutubeVideoIdOutraTabela($row["link"]);
                                $thumbnail_url = "https://img.youtube.com/vi/" . $video_id . "/mqdefault.jpg"; // URL da miniatura
                                echo '<div class="video-item">';
                                echo '<a href="video_page.php?id=' . htmlspecialchars($row["id"], ENT_QUOTES, 'UTF-8') . '">';
                                echo '<img src="' . htmlspecialchars($thumbnail_url, ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($row["titulo"], ENT_QUOTES, 'UTF-8') . '">';
                                echo '<span>' . htmlspecialchars($row["titulo"], ENT_QUOTES, 'UTF-8') . '</span>';
                                echo '</a>';
                                echo '</div>';
                            }
                            echo '</div>';
                        } else {
                            echo "<p>0 resultados</p>";
                        }
                        $conn->close();

                        // Função para extrair o ID do vídeo do YouTube do link
                        function getYoutubeVideoIdOutraTabela($url) {
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
                    </div>
                </div>
                <div class="dropdown">
                    <div class="journey-item">
                        <span>Capítulo 3</span>
                    </div>
                    <div class="dropdown-content">
                        <a href="#">201 - 300</a>
                        <a href="#">Texto adicional</a>
                    </div>
                </div>
                <div class="dropdown">
                    <div class="journey-item">
                        <span>Iniciante II</span>
                    </div>
                    <div class="dropdown-content">
                        <a href="#">Texto ou opção 1</a>
                        <a href="#">Texto ou opção 2</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="right-section">
            <div class="right-header">
                <h2>Bom trabalho por hoje!</h2>
                <div class="success-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2v-4h2v4z"/></svg>
                </div>
            </div>
            <div class="right-header">
                <div class="success-text">5/5</div>
                <div class="success-text">+5</div>
            </div>
            <div class="extra-mile">
                <div class="card" style="background-color: #3e3e3e;">
                    <div class="points" style="background-color: #ff9800;">+1</div>
                    <div class="title">Construa seu vocabulário</div>
                    <div class="description">Aprenda novas palavras e frases para expandir seu vocabulário.</div>
                    <div class="action">Aprender Agora</div>
                </div>
                <div class="card" style="background-color: #4e4e4e;">
                    <div class="points" style="background-color: #ff9800;">+5</div>
                    <div class="title">Revisar palavras</div>
                    <div class="description">Teste seu conhecimento com quizzes interativos.</div>
                    <div class="action">Revisar Agora</div>
                </div>
                <div class="card" style="background-color: #5a5a5a;">
                    <div class="points" style="background-color: #ff9800;">+3</div>
                    <div class="title">Situação Real</div>
                    <div class="description">Pratique falar em situações reais.</div>
                    <div class="action">Praticar Agora</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
