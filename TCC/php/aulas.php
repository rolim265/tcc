<?php
include('conexao.php');

// Iniciar sessão no topo da página
session_start();

// Verificar se a variável de sessão está definida e o usuário está logado
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $nome = $_SESSION['nome'];
    $email = $_SESSION['email'];

    // Aqui você pode usar $id_usuario para realizar consultas ou exibições específicas do usuário
} else {
    // Se o usuário não estiver logado, redirecione para a página de login
    header("Location: login.php");
    exit;
}

// Fechar conexão com o banco de dados
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../csss/aulas.css">
    <title>Document</title>
    <style>
         Estilos gerais
        /* body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            max-width: 800px;
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

        .services
         {
            text-align: center;
            padding: 20px;
            background-color: #f9f9f9;
            margin-bottom: 20px;
        }

        .service-card {
            background: transparent;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .video-container {
            position: relative;
            width: 100%;
            height: 0;
            padding-bottom: 56.25%; /* Proporção 16:9 */
        } */

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }

        .quiz {
            margin-top: 20px;
        }  */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropbtn {
            background-color: #29fd53;
            color: white;
            font-size: 0.9rem;
            font-weight: 500;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            padding: 10px 20px;
            display: flex;
            align-items: center;
        }

        .dropbtn:hover {
            background-color: #1e8e3e;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #29fd53;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            min-width: 160px;
            z-index: 1;
            padding: 10px 0;
        }

        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            font-size: 0.9rem;
            transition: background-color 0.2s, padding-left 0.2s;
        }

        .dropdown-content a:hover {
            background-color: #1e8e3e;
            padding-left: 20px;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #1e8e3e;
        }




        /* Estilos para o modal */
        .modal {
            display: none;
            /* Oculto por padrão */
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            /* Fallback */
            background-color: rgba(0, 0, 0, 0.4);
            /* Fundo preto com opacidade */
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            /* 15% do topo e centralizado horizontalmente */
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            /* Pode ser ajustado */
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




        /* Estilos para o Modal */
        .modal {
            display: none;
            /* Oculto por padrão */
            position: fixed;
            /* Fica fixo na tela */
            z-index: 1;
            /* Fica na frente de outros elementos */
            left: 0;
            top: 0;
            width: 100%;
            /* Largura total */
            height: 100%;
            /* Altura total */
            overflow: auto;
            /* Habilita rolagem se necessário */
            background-color: rgb(0, 0, 0);
            /* Cor de fundo */
            background-color: rgba(0, 0, 0, 0.4);
            /* Fundo com transparência */
    
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            /* 15% do topo e centralizado horizontalmente */
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            /* Largura do modal */
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
    </style>
</head>
<body>
<header>
        <a href="#" class="logo"><span><img src="../img/logocoffe.png" alt="" style="height: 65px;"></span></a>
        <ul class="navbar">
            <li><a href="../php/aaa.php" class="active">Inicio</a></li>
            <li><a href="../html/sobre.html">Sobre</a></li>
            <li><a href="aulas.php">Vídeos Aulas</a></li>
            <li><a href="#">Contato</a></li>
        </ul>

        <div class="dropdown">
            <button onclick="toggleDropdown()" class="dropbtn"><?php echo $nome; ?></button>
            <div id="dropdownContent" class="dropdown-content">
                <a id="editBtn">Editar</a>
                <a href="#">Email: <?php echo $email; ?></a>
                <hr />
                <a href="logout.php" class="user"><i class="ri-user-fill"></i>Log out</a>
            </div>
        </div>

        <!-- O Modal de Edição -->
        <div id="editModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2 style="color: black;" >Editar Perfil</h2>
                <div id="modal-body"></div>
            </div>
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
                echo '<iframe width="100%" height="315" src="https://www.youtube.com/embed/' . $video_id . '" frameborder="0" allowfullscreen></iframe>';
                echo '</div>';
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

    <div class="container">
        <h3>Quiz - Perguntas e Respostas</h3>
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
 