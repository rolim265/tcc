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
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../csss/teste.css">
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
            transition: all 300ms;
        }

        span {
            color: #f5f5f5;
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

        .barra-progresso {
            width: 100%;
            height: 20px;
            background-color: #ccc;
            border-radius: 10px;
        }

        .progresso {
            width: 0%;
            height: 20px;
            background-color: #4CAF50;
            border-radius: 10px;
            transition: all 300ms;
        }


        /* Adicionei estilos para o botão "Terminado" */
        #botao-terminado {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            float: right;
        }

        #botao-terminado:hover {
            background-color: #3e8e41;
        }
        #submit-btn {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        #submit-btn:hover {
            background-color: #3e8e41;
        }

        .quiz {
            margin-top: 20px;
        }

        */ .dropdown {
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
        #perguntas {
            margin: 20px;
        }

        .pergunta {
            margin-bottom: 20px;
        }

        .questionario {
        max-width: 800px;
        margin: 40px auto;
        padding: 20px;
        background-color: #333;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .pergunta {
        margin-bottom: 20px;
        }

        .opcoes {
        list-style: none;
        padding: 0;
        margin: 0;
        }

        .opcoes li {
        margin-bottom: 10px;
        }

        .opcoes li label {
        cursor: pointer;
        }

        .resposta-certa {
        color: green;
        }

        .resposta-errada {
        color: red;
        }
    </style>
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
                <h2 style="color: black;">Editar Perfil</h2>
                <div id="modal-body"></div>
            </div>
        </div>


    </header>

<body>



    <div class="container">
        <div class="left-section">
            <div class="header">
                <h2>Jornada de Aprendizado</h2>
            </div>
            <div class="stats">
                <div class="stat">
                    
                    <span>PROGRESSO</span>
                </div>
                <div class="stat">
                    
                </div>
            </div>
            <div class="progress">
                <div class="progress-bar" style="width:0"></div>
            </div>
            <div class="journey">
                
                <div class="journey-item">
                    <span>Capítulo 1/3</span>
                    <span>95 palavras restantes</span>
                </div>
                <div class="dropdown-content">
                        <a href="#">Texto ou opção 1</a>
                        <a href="#">Texto ou opção 2</a>
                </div>
            </div>
            <div class="journey">
                
                <div class="dropdown">
                    <div class="journey-item">
                        <span>Capítulo 1</span>
                    </div>
                    <div class="dropdown-content">
                        <a href="../php/teste1.php">Atividade</a>
                    </div>
                </div>
                <div class="dropdown">
                    <div class="journey-item">
                        <span>Capítulo 2</span>
                    </div>
                    <div class="dropdown-content">
                        
                    </div>
                </div>
                <div class="dropdown">
                    <div class="journey-item">
                        <span>Capítulo 3</span>
                    </div>
                    <div class="dropdown-content">
                        <a href="../php/teste3">Atividade</a>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="right-section">
            <div class="right-header">
                <button id="botao-terminado" style="text-aling: right;">Terminado</button>
                <!-- <div class="success-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2v-4h2v4z" />
                    </svg>
                </div> -->
            </div>
            
            <section class="sevices">
                
                <?php
                include('conexao.php');

                $sql = "SELECT * FROM video";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="service">';
                        
                        $video_id = getYotubeVideoId($row["link"]);
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
                function getYotubeVideoId($url) {
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
                <div class="right-header">
                    <div class="success-text" id="placar"></div>
                    <div class="success-text">+5</div>
                </div>

            <div id="perguntas">
        <!-- As perguntas serão exibidas aqui -->
            </div>
            <button id="submit-btn">Enviar Respostas</button>
            <br>
            <br>
            
            <!-- <div class="extra-mile">
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

            </div> -->
            
            
        </div>
    </div>

    <script>
        const botaoTerminado = document.getElementById('botao-terminado');
        const progressBar = document.querySelector('.progress-bar');
        let progressoAtual = 0;

        botaoTerminado.addEventListener('click', () => {
            progressoAtual += 10; // aumenta o progresso em 10%
            progressBar.style.width = `${progressoAtual}%`;
        });

        // Defina as perguntas e respostas
        const perguntas = [
          {
            pergunta: "Qual é a capital do Brasil?",
            opcoes: ["São Paulo", "Rio de Janeiro", "Brasília", "Belo Horizonte"],
            resposta: 2
          },
          {
            pergunta: "Qual é o maior planeta do nosso sistema solar?",
            opcoes: ["Terra", "Saturno", "Júpiter", "Urano"],
            resposta: 2
          }
        ];

        // Função para exibir as perguntas e verificar as respostas
        function exibirPerguntas() {
          let pontuacao = 0;
          const perguntasElement = document.getElementById("perguntas");
          for (let i = 0; i < perguntas.length; i++) {
            const pergunta = perguntas[i];
            const perguntaElement = document.createElement("div");
            perguntaElement.className = "pergunta";
            perguntaElement.innerHTML = `<h2>${pergunta.pergunta}</h2>
                                         <ul class="opcoes">
                                           ${pergunta.opcoes.map((opcao, index) => `<li><input type="radio" name="pergunta${i}" value="${index}">${opcao}</li>`).join("")}
                                         </ul>`;
            perguntasElement.appendChild(perguntaElement);
          }
        }

        // Função para verificar as respostas
        function verificarRespostas() {
          let pontuacao = 0;
          for (let i = 0; i < perguntas.length; i++) {
            const radios = document.getElementsByName(`pergunta${i}`);
            let respostaUsuario = null;
            for (let j = 0; j < radios.length; j++) {
              if (radios[j].checked) {
                respostaUsuario = parseInt(radios[j].value);
                break;
              }
            }
            if (respostaUsuario === perguntas[i].resposta) {
              pontuacao++;
            }
          }
          
          const placarElement = document.getElementById("placar");
          placarElement.innerHTML = `${pontuacao}/${perguntas.length}`;
        }

        // Chame a função para exibir as perguntas
        exibirPerguntas();

        // Adicione um evento de clique ao botão de envio
        document.getElementById("submit-btn").addEventListener("click", verificarRespostas);
    </script>
</body>

</html>