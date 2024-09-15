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
    <script>
        function handleButtonClick(perValue) {
            // Envia o valor para o servidor via AJAX
            fetch('update_per.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: new URLSearchParams({
                    'set_per': perValue
                })
            })
            .then(response => response.text())
            .then(data => {
                // Opcional: manipular a resposta do servidor
                console.log(data);
                // Atualiza o conteúdo da página ou realiza outras ações
                document.getElementById('perguntas').innerHTML = data;
            })
            .catch(error => {
                console.error('Erro:', error);
            });
        }
    </script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #2e2e2e;
            color: #f5f5f5;
            width: 100%;
            max-width: 100vw;
        }
        .navbar{
            display: flex;

        }
        .navbar a{
            color: var(--text-color);
            font-size: 1.1rem;
            font-weight: 500;
            padding: 5px 0;
            margin: 0px 30px;
            transition: all .50s ease;

        }
        .navbar a:hover{
            color: var(--main-color);

        }
        @media (max-width: 1280px){
            header{
                padding: 14px 2%;
                transition: .2s;

            }
            .navbar a{
                padding: 5px 0;
                margin: 0px 20px;
            }
        }
        @media (max-width: 1090px){
            #menu-icon{
                display: block;
            }
            .navbar{
                


            }
            .navbar a{
                display: block;
                margin: 12px 0;
                padding: 0px 25px;
                transition: all .50s ease;
                
                
            }
            .navbar a:houver{
                color: var(--text-color);
                transform: translateY(5px);

            }
            .navbar a.active{
                color: var(--text-color);

            }
            .navbar.open{
                right: 2%;
            }

        }


        header {
            
            max-height: 100px;
            max-width: 100vw;
            top: 0;
            right: 0;
            z-index: 1000 ;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #000000;
            padding: 28px 12%;
            transition: all .50s ease;
        
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

        .dropdownvideo {
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

        .dropdownvideo:hover .dropdown-content {
            display: block;
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

        .dropdownvideo:hover .dropdown-content {
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
        .perguntas-container {
            display: none; /* Inicialmente escondido */
            background-color: #444;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }
        $green: #1ECD97;
        $gray: #bbbbbb;
        * {
        font-family: 'Roboto', sans-serif;
        }
        .troso {
        position: absolute;
        top:50%;
        left:50%;
        margin-left: -65px;
        margin-top: -20px;
        width: 130px;
        height: 40px;
        text-align: center;
        }
        .barrasebarras {
        outline:none;
        height: 40px;
        text-align: center;
        width: 130px;
        border-radius:40px;
        background: #fff;
        border: 2px solid $green;
        color:$green;
        letter-spacing:1px;
        text-shadow:0;
        font:{
            size:12px;
            weight:bold;
        }
        cursor: pointer;
        transition: all 0.25s ease;
        &:hover {
            color:white;
            background: $green;
        }
        &:active {
            //letter-spacing: 2px;
            letter-spacing: 2px ;
        }
        &:after {
            content:"SUBMIT";
        }
        }
        .onclic {
        width: 40px;
        border-color:$gray;
        border-width:3px;
        font-size:0;
        border-left-color:$green;
        animation: rotating 2s 0.25s linear infinite;

        &:after {
            content:"";
        }
        &:hover {
            color:$green;
            background: white;
        }
        }
        .validate {
        font-size:13px;
        color: white;
        background: $green;
        &:after {
            font-family:'FontAwesome';
            content:"\f00c";
        }
        }

        @keyframes rotating {
        from {
            transform: rotate(0deg);
        }
        to {
            transform: rotate(360deg);
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
            <div class="dropdownvideo">
                <form method="post" action="">
                    <div class="journey-item">
                        <button class="button-50" role="button" type="submit" name="set_per" value="1">Capítulo 1</button>
                    </div>
                </form>
                <div class="dropdown-content">
                    <?php
                    if (isset($_POST['set_per'])) {
                        // A variável $per recebe o valor enviado pelo botão clicado
                        $capitulo_id = intval($_POST['set_per']);
                        
                    } else {
                        
                    }
                    $sql = "SELECT * FROM capitulo_um WHERE id = 1";
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
                            echo '<button class="button-85" role="button" type="submit" name="set_per" value="1" onclick="loadVideo(\'' . $videoId . '\')">' . htmlspecialchars($row["nome"], ENT_QUOTES, 'UTF-8') . '</button>';
                            echo '</div>';
                        }
                        echo '</div>';
                    } else {
                        echo 'Nenhum vídeo encontrado.';
                    }
                    ?>
                </div>
                <div id="perguntas" class="perguntas-container">
                <?php 
                // Puxar a pergunta e alternativas do banco de dados
                $sql = "SELECT pergunta, resposta, alternativa_errada1, alternativa_errada2, alternativa_errada3 FROM capitulo_um WHERE id = ?";
                $stmt = $conn->prepare($sql);
                 // Definir o ID correto do capítulo
                $stmt->bind_param("i", $capitulo_id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<h2 style="font-size: 28px; margin-bottom: 20px; color: #e0e0e0; text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);">' . htmlspecialchars($row['pergunta'], ENT_QUOTES, 'UTF-8') . '</h2>';

                        $options = [
                            ['value' => '1', 'text' => htmlspecialchars($row['resposta'], ENT_QUOTES, 'UTF-8')],
                            ['value' => '2', 'text' => htmlspecialchars($row['alternativa_errada1'], ENT_QUOTES, 'UTF-8')],
                            ['value' => '3', 'text' => htmlspecialchars($row['alternativa_errada2'], ENT_QUOTES, 'UTF-8')],
                            ['value' => '4', 'text' => htmlspecialchars($row['alternativa_errada3'], ENT_QUOTES, 'UTF-8')]
                        ];

                        foreach ($options as $option) {
                            echo '<div style="margin-bottom: 15px; display: flex; align-items: center; background: linear-gradient(145deg, #333, #444); border-radius: 12px; box-shadow: 4px 4px 8px rgba(0, 0, 0, 0.3); padding: 10px; transition: background 0.3s, box-shadow 0.3s;">';
                            echo '<input type="radio" name="answer" value="' . $option['value'] . '" id="option' . $option['value'] . '" style="margin-right: 10px; accent-color: #4CAF50; transform: scale(1.2);">';
                            echo '<label for="option' . $option['value'] . '" style="font-size: 18px; color: #e0e0e0; transition: color 0.3s;">' . $option['text'] . '</label>';
                            echo '</div>';
                        }

                        echo '<button onclick="checkAnswer()" style="padding: 12px 24px; border-radius: 8px; background: linear-gradient(145deg, #4CAF50, #388E3C); color: white; border: none; cursor: pointer; font-size: 18px; font-weight: bold; box-shadow: 4px 4px 8px rgba(0, 0, 0, 0.3); transition: background 0.3s, box-shadow 0.3s;">Enviar Resposta</button>';
                    }
                } else {
                    echo 'Nenhuma pergunta disponível para este vídeo.';
                }
                ?>
            </div>
            </div>
            <div class="dropdownvideo">
                <form method="post" action="">
                    <div class="journey-item">
                        <button class="button-50" role="button" type="submit" name="set_per" value="2">Capítulo 2</button>
                    </div>
                </form>
                <div class="dropdown-content">
                    <?php
                    if (isset($_POST['set_per'])) {
                        // A variável $per recebe o valor enviado pelo botão clicado
                        $capitulo_id = intval($_POST['set_per']);
                        
                    } else {
                        
                    }
                    $sql = "SELECT * FROM capitulo_um WHERE id = 2";
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
                <div id="perguntas" class="perguntas-container">
                <?php 
                
                // Puxar a pergunta e alternativas do banco de dados
                $sql = "SELECT pergunta, resposta, alternativa_errada1, alternativa_errada2, alternativa_errada3 FROM capitulo_um WHERE id = ?";
                $stmt = $conn->prepare($sql);
                 // Definir o ID correto do capítulo
                $stmt->bind_param("i", $capitulo_id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<h2 style="font-size: 28px; margin-bottom: 20px; color: #e0e0e0; text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);">' . htmlspecialchars($row['pergunta'], ENT_QUOTES, 'UTF-8') . '</h2>';

                        $options = [
                            ['value' => '1', 'text' => htmlspecialchars($row['resposta'], ENT_QUOTES, 'UTF-8')],
                            ['value' => '2', 'text' => htmlspecialchars($row['alternativa_errada1'], ENT_QUOTES, 'UTF-8')],
                            ['value' => '3', 'text' => htmlspecialchars($row['alternativa_errada2'], ENT_QUOTES, 'UTF-8')],
                            ['value' => '4', 'text' => htmlspecialchars($row['alternativa_errada3'], ENT_QUOTES, 'UTF-8')]
                        ];

                        foreach ($options as $option) {
                            echo '<div style="margin-bottom: 15px; display: flex; align-items: center; background: linear-gradient(145deg, #333, #444); border-radius: 12px; box-shadow: 4px 4px 8px rgba(0, 0, 0, 0.3); padding: 10px; transition: background 0.3s, box-shadow 0.3s;">';
                            echo '<input type="radio" name="answer" value="' . $option['value'] . '" id="option' . $option['value'] . '" style="margin-right: 10px; accent-color: #4CAF50; transform: scale(1.2);">';
                            echo '<label for="option' . $option['value'] . '" style="font-size: 18px; color: #e0e0e0; transition: color 0.3s;">' . $option['text'] . '</label>';
                            echo '</div>';
                        }
                        echo '<div class="troso">';
                        echo '<button class="barrasebarras" id="rest" onclick="checkAnswer()" style="padding: 12px 24px; border-radius: 8px; background: linear-gradient(145deg, #4CAF50, #388E3C); color: white; border: none; cursor: pointer; font-size: 18px; font-weight: bold; box-shadow: 4px 4px 8px rgba(0, 0, 0, 0.3); transition: background 0.3s, box-shadow 0.3s;">Enviar Resposta</button>';
                        echo '</div>';
                    }
                } else {
                    echo 'Nenhuma pergunta disponível para este vídeo.';
                }
                ?>
            </div>
            </div>
        </div>

        <div class="right-videos">

            <div id="cinema">
                <!-- O vídeo será carregado aqui -->
                <iframe id="videoPlayer" width="850" height="500" src="" frameborder="0" allowfullscreen></iframe>
            </div>

            <div id="questionsContainer" style="display: none;">
                <?php 
                // Puxar a pergunta e alternativas do banco de dados
                $sql = "SELECT pergunta, resposta, alternativa_errada1, alternativa_errada2, alternativa_errada3 FROM capitulo_um WHERE id = ?";
                $stmt = $conn->prepare($sql);
                // Definir o ID correto do capítulo
                $stmt->bind_param("i", $capitulo_id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<h2 style="font-size: 28px; margin-bottom: 20px; color: #e0e0e0; text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);">' . htmlspecialchars($row['pergunta'], ENT_QUOTES, 'UTF-8') . '</h2>';
                
                        // Opções de resposta
                        $options = [
                            ['value' => '1', 'text' => htmlspecialchars($row['resposta'], ENT_QUOTES, 'UTF-8')],
                            ['value' => '2', 'text' => htmlspecialchars($row['alternativa_errada1'], ENT_QUOTES, 'UTF-8')],
                            ['value' => '3', 'text' => htmlspecialchars($row['alternativa_errada2'], ENT_QUOTES, 'UTF-8')],
                            ['value' => '4', 'text' => htmlspecialchars($row['alternativa_errada3'], ENT_QUOTES, 'UTF-8')]
                        ];
                
                        foreach ($options as $option) {
                            echo '<div style="margin-bottom: 15px; display: flex; align-items: center; background: linear-gradient(145deg, #333, #444); border-radius: 12px; box-shadow: 4px 4px 8px rgba(0, 0, 0, 0.3); padding: 10px; transition: background 0.3s, box-shadow 0.3s;">';
                            echo '<input type="radio" name="answer" value="' . $option['value'] . '" id="option' . $option['value'] . '" style="margin-right: 10px; accent-color: #4CAF50; transform: scale(1.2);">';
                            echo '<label for="option' . $option['value'] . '" style="font-size: 18px; color: #e0e0e0; transition: color 0.3s;">' . $option['text'] . '</label>';
                            echo '</div>';
                        }
                
                        echo '<button onclick="checkAnswer()" style="padding: 12px 24px; border-radius: 8px; background: linear-gradient(145deg, #4CAF50, #388E3C); color: white; border: none; cursor: pointer; font-size: 18px; font-weight: bold; box-shadow: 4px 4px 8px rgba(0, 0, 0, 0.3); transition: background 0.3s, box-shadow 0.3s;">Enviar Resposta</button>';
                    }
                } else {
                    echo 'Nenhuma pergunta disponível para este vídeo.';
                }
                ?>
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

        function loadVideo(videoId) {
            var videoPlayer = document.getElementById('videoPlayer');
            videoPlayer.src = "https://www.youtube.com/embed/" + videoId;
            
            // Atualizar a URL com o video_id
            window.history.pushState({}, '', '?video_id=' + videoId);

            // Mostrar o contêiner de perguntas
            document.getElementById('questionsContainer').style.display = 'block';
        }


        function checkAnswer() {
            var options = document.getElementsByName('answer');
            var selectedOption = null;

            for (var i = 0; i < options.length; i++) {
                if (options[i].checked) {
                    selectedOption = options[i].value;
                    break;
                }
            }

            if (selectedOption === "1") {
                alert('Resposta correta!');
            } else {
                alert('Resposta incorreta, tente novamente.');
            }
        }
        $(function() {
        $( "#rest" ).click(function() {
            $( "#rest" ).addClass( "onclic", 250, validate);
        });

        function validate() {
            setTimeout(function() {
            $( "#rest" ).removeClass( "onclic" );
            $( "#rest" ).addClass( "validate", 450, callback );
            }, 2250 );
        }
            function callback() {
            setTimeout(function() {
                $( "#rest" ).removeClass( "validate" );
            }, 1250 );
            }
        });
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
    parse_str(parse_url($url, PHP_URL_QUERY), $params);
                        return $params['v'] ?? false;
}

?>