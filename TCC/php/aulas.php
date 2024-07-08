<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../csss/au.css">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        .question, .alternativas {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        p#resultado {
            margin-top: 20px;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
        }

        .services {
            text-align: center;
            padding: 20px;
            background-color: #f9f9f9;
            margin-bottom: 20px;
        }

        .service-card {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 10px;
        }

        .video-container {
            position: relative;
            width: 100%;
            height: 0;
            padding-bottom: 56.25%; /* Proporção 16:9 */
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            
        }
        .alternativas{
          colo: #00000;
        }
    </style>
</head>
<body>   
<header>
    <a href="#" class="logo"><span>Logo</span></a>
    <ul class="navbar">
        <li><a href="aaa.php" class="Active">Inicio</a></li>
        <li><a href="../html/sobre.html" class="">Sobre</a></li>
        <li><a href="aulas.php" class="">Vídeos Aulas</a></li>
        <li><a href="" class="">Contato</a></li>
    </ul>
    <div class="main">
        <a href="logout.php" class="user"><i class="ri-user-fill"></i>Logout</a>
        <div class="bx bx-menu" id="menu-icon"></div>
    </div>
</header>

<section class="services">
    <h2>Video Aulas</h2>
    <?php
     include('conexao.php');

        $sql = "SELECT * FROM video";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="service-card">';
                echo '<h3>' . $row["titulo"] . '</h3>';
                $video_id = getYoutubeVideoId($row["link"]);
                echo '<div class="video-container">';
                // iframe
                echo '<iframe width="320" height="240" src="https://www.youtube.com/embed/' . $video_id . '" frameborder="0" allowfullscreen></iframe>';
                echo '</div>';
            }
        } else {
            echo "0 results";
        }
        $conn->close();

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
</section>
<br>
<br>

<div class="container">
    <h1>Quiz - Perguntas e Respostas</h1>
    <form id="quizForm">
        <div class="question">
            <p>Qual é a capital do Brasil?</p>
            <div class="alternativas">
                <input type="radio" id="alternativa1" name="resposta" value="a">
                <label for="alternativa1">a) Rio de Janeiro</label>
            </div>
            <div class="alternativas">
                <input type="radio" id="alternativa2" name="resposta" value="b">
                <label for="alternativa2">b) Brasília</label>
            </div>
            <div class="alternativas">
                <input type="radio" id="alternativa3" name="resposta" value="c">
                <label for="alternativa3">c) São Paulo</label>
            </div>
            <div class="alternativas">
                <input type="radio" id="alternativa4" name="resposta" value="d">
                <label for="alternativa4">d) Salvador</label>
            </div>
        </div>
        <button type="button" onclick="submitQuiz()">Enviar Resposta</button>
    </form>
    <p id="resultado"></p>
</div>

<script>
    function submitQuiz() {
        // Obter o valor selecionado
        var resposta = document.querySelector('input[name="resposta"]:checked');

        // Verificar se uma opção foi selecionada
        if (!resposta) {
            alert('Por favor, selecione uma resposta.');
            return;
        }

        // Verificar se a resposta está correta
        if (resposta.value === 'b') {
            document.getElementById('resultado').innerText = 'Resposta correta!';
        } else {
            document.getElementById('resultado').innerText = 'Resposta incorreta. Tente novamente.';
        }
    }
</script>

</body>
</html>
