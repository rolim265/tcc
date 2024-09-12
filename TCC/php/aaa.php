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
    <title>home</title>
    <link rel="stylesheet" href="../csss/aaap.css">

    <style>
        .ola {
            align-items: center;
            justify-content: space-between;
            max-width: 1600px;
            margin: 50px auto;
            padding-left: 80px;
            border-radius: 8px;
            margin-top: 130px;
        }
        .vad {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1600px;
            margin: 100px auto;
            padding: 20px;
            border-radius: 8px;
            margin-top: 30px;
        }

        .vad img {
            max-width: 500px;
            height: auto;
            border-radius: 8px;
            margin-right: 50px;
            margin-left: 50px;
        }

        .vad p {
            flex: 1;
            margin-right: 6px;
            margin: 0;
            font-family: Arial, sans-serif;
            line-height: 1.5;
            color: white;
        }

        /* @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500&display=swap");

        .profile-dropdown {
            position: relative;
            width: fit-content;
        }

        .profile-dropdown-list {
            padding: 2rem;
            position: absolute;
            top: 64px;
            width: 220px;
            right: 0;
            background-color: #29fd53;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }

        .profile-img {
            width: 3rem;
            height: 3rem;
            border-radius: 50%;
            background-size: cover;
        }

        .profile-dropdown-bnt {
            display: flex;
            width: 150px;
            align-items: center;
            justify-content: space-between;
            padding-right: 1rem;
            font-size: 0.9rem;
            font-weight: 500;
            border: 1px solid rgb(2, 2, 2);
            border-radius: 50px;
            cursor: pointer;
        }

        .profile-dropdown-bnt:hover {
            background-color: #29fd53;
        }

        .profile-img i {
            position: absolute;
            right: 0;
            bottom: 0.3rem;
            font-size: 0.5rem;
            color: green;
        }

        .profile-dropdown-bnt span {
            margin: 0 0.5rem;
            margin-right: 0;
        }

        .profile-dropdown-list-item {
            padding: 0.5rem 0 0.5rem 1rem;
            transition: background-color 0.2s, padding-left 0.2s;
        }

        .profile-dropdown-list-item:hover {
            padding-left: 1.5rem;
            background-color: #1e8e3e;
        }

        .profile-dropdown-list-item a {
            padding-right: 0.8rem;
            display: flex;
            align-items: center;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            color: #fff;
        }

        .profile-dropdown-list-item a i {
            margin-right: 1rem;
            font-size: 1.1rem;
            width: 2.3rem;
            height: 2.3rem;
            background-color: #29fd53;
            color: white;
            line-height: 2.3;
            text-align: center;
            padding-left: 0.5rem;
            padding-right: 1rem;
            border-radius: 10%;
        }

        .profile-dropdown-list.active {
            max-height: 500px;
        }

        .profile-dropdown-list hr {
            margin: 0 0.5rem;
            margin-right: 0;
        } */
        /* Reset básico */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Import da fonte Poppins (descomente se necessário) */
        /*@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500&display=swap");*/

        /* Estilos do dropdown */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropbtn {
            background-color: #32CD32;
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
            background-color: #32CD32;
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
            background-color: black;
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
            background-color: black;
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

        .cookie-consent-banner {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 15px;
            z-index: 1000;
        }

        .cookie-consent-banner p {
            margin: 0;
        }

        .cookie-consent-banner a {
            color: #ffdd57;
            text-decoration: underline;
        }

        .cookie-consent-banner button {
            background-color: #ffdd57;
            border: none;
            color: #333;
            padding: 10px 20px;
            cursor: pointer;
            margin-top: 10px;
        }




        .profile-warning {
            display: none;
            /* Inicialmente escondido */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #f44336;
            color: #fff;
            text-align: center;
            padding: 15px;
            z-index: 1000;
        }

        .profile-warning p {
            margin: 0;
        }

        .profile-warning a {
            color: #ffdd57;
            text-decoration: underline;
        }
    </style>

</head>

<body>



    <header>
        <a href="#" class="logo"><span><img src="../img/logocoffe.png" alt="" style="height: 65px;"></span></a>
        <ul class="navbar">
            <li><a href="../php/aaa.php" class="active">Inicio</a></li>
            <li><a href="../html/sobre.html">Sobre</a></li>
            <li><a href="../php/teste.php">Vídeos Aulas</a></li>
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
                <span style="color:red" class="close">&times;</span>
                <h2 style="color: black;">Editar Perfil</h2>
                <div id="modal-body"></div>
            </div>
        </div>


    </header>



    
    </header>

    <!-- Início dos textos -->
     
    <div class="ola">
        <h1 id="typing-text">Olá caro(a) <?php echo $nome; ?>! É com muito prazer te recebermos aqui!</h1>

    </div>


    <div class="vad">
        
        <img src="../img/familia01.jpg" alt="Descrição da Imagem">
        <p>

            Antes de começar essa jornada, vamos retomar um pouco sobre nosso objetivo principal, sendo necessário que você entenda o que é de fato a Educação Financeira.
            A Educação Financeira te auxilia a organizar planos para o futuro, também ajuda a administrar contas, finanças e investimentos... Onde você entende como o dinheiro funciona e como realizar ações de maneira inteligente.
            Nesse site você terá acesso a aulas, juntamente com quiz e um conteúdo fácil de aprender!

        </p>
    </div>
    <h2> O que são Investimentos?</h2>
    <div class="vad">

        <p>
        
        Investimentos são ações, fundos, ou outros instrumentos financeiros que são utilizados para gerar retorno para o investidor.
        Estes podem ser diversificados, como ações, fundos, ou ativos diretos.
        Investir significa aplicar seu recurso financeiro com o intuito de receber uma quantia maior futuramente, como uma meta.
        Para investir, é necessário compreender como funciona os tipos de investimentos, para assim escolher qual se encaixa na sua realidade

        </p>
        <img src="../img/g1_endividados.png" alt="Descrição da Imagem">
        <!-- https://g1.globo.com/economia/noticia/2022/03/31/endividamento-bate-recorde-em-marco-puxado-pelo-cartao-de-credito-diz-cnc.ghtml -->
    </div>
    <div class="vad">
        <img src="../img/quanto+.jpg" alt="Descrição da Imagem">
        <p>
            Como fazer um orçamento pessoal
            O que é um orçamento pessoal?
            Um orçamento pessoal é uma espécie de mapa do tesouro financeiro que te ajuda a prever o que você vai gastar e a manter as suas finanças em ordem. A ideia é fazer as suas despesas baterem com o que você ganha, para não acabar gastando mais do que pode.

            Fazer esse planejamento todo mês é tipo a sua bússola financeira. Ele te mostra quais são os gastos que mais afetam a sua carteira, te ajuda a entender como você gasta o seu dinheiro no dia a dia, e até te prepara para quando as coisas não saem como o planejado.

            Além disso, é uma forma de você ficar mais esperto com o dinheiro, aprendendo a tomar decisões melhores.

            O lado legal de ter um orçamento é que ele te ajuda a manter tudo organizado. Você sabe onde tá o seu dinheiro e pode decidir o melhor momento para gastar, evitando despesas que não são tão importantes e problemas que poderiam surgir.

            E o melhor? Você começa a ver os seus sonhos se tornando realidade. Quer fazer uma viagem, comprar um carro ou ter a sua própria casa? Com as finanças organizadas, você está mais perto de conseguir essas coisas.
            Como fazer um orçamento mensal eficiente em passos simples
            1. Entenda o que entra e sai
            Pode parecer básico, mas muita gente não sabe direito quanto ganha por mês. Então, o primeiro passo é somar e anotar todas as suas entradas de dinheiro e despesas. Assim, você já consegue ver o quanto ganha e onde gasta mais.

            2. Separe as despesas
            Depois de ver o panorama geral, é hora de detalhar as coisas. Liste todas as suas despesas fixas e variáveis:
            Despesas fixas: Coisas que custam mais ou menos a mesma coisa todo mês, como aluguel, academia, prestação do carro, salários de funcionários, etc.
            Despesas variáveis: Coisas que podem mudar de valor, como comida, conta de luz, presentes, viagens, etc.
            Não esqueça das despesas "invisíveis", que são aquelas pequenas que somam sem você perceber, como assinaturas, pedidos de comida e serviços de streaming.

            3. Organize por categorias
            Agora que você separou as despesas, é hora de colocá-las em categorias e decidir quanto pode gastar por semana e mês em cada uma. Algumas categorias podem ser:
            Supermercado;
            Educação;
            Moradia;
            Lazer, etc.
            Lembre-se de que não tem uma regra fixa para o quanto gastar em cada categoria, use o bom senso para decidir de acordo com a sua situação.

            4. Poupe dinheiro
            Definir um orçamento para cada categoria ajuda a pensar em como economizar e ter mais dinheiro no fim do mês. Veja onde você pode cortar gastos ou gastar menos.

            5. Use o cartão com cuidado
            Um erro comum é achar que o cartão de crédito é dinheiro extra, mas na verdade é só um adiantamento. Então, certifique-se de que os gastos no cartão não passam do limite que você definiu no orçamento. Usado direito, o cartão pode ajudar nas finanças.

            6. Defina metas claras
            Organizar as finanças sem um objetivo em mente não faz muito sentido. Pergunte a si mesmo: "Por que estou economizando? Quais despesas são essenciais na minha vida?" Essas perguntas lembram você do motivo de estar fazendo tudo isso. Defina metas de economia para se comprometer ainda mais com o orçamento.

            7. Acabe com as dívidas
            Dívidas atrapalham o planejamento financeiro. Se você tem dívidas, organize-se para pagá-las e aproveitar todos os benefícios do orçamento pessoal.
        </p>
    </div>

    <!-- Início dos Serviços -->
    <section class="services">
        <h2>Faça parte de nossa comunidade</h2>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "tcc";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM produtos";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                echo '<div class="service-card">';
                echo '<h3>' . $row["nome"] . '</h3>';
                echo '<p>' . $row["descricao"] . '</p>';
                echo '<a href="' . $row["link"] . '" class="btn">Comprar por R$ ' . $row["valor"] . '</a>';
                echo '</div>';
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </section>

    <br><br>
    <!-- Profile Completion Warning -->
    <!-- <div id="profile-warning" class="profile-warning">
        <p>Seu perfil não está completo. <a href="editar_perfil.php">Complete seu perfil agora</a>.</p>
    </div> -->


    <!-- Cookie Consent Banner -->
    <div id="cookie-consent-banner" class="cookie-consent-banner">
        <p>Este site usa cookies para garantir que você obtenha a melhor experiência. <a href="https://support.google.com/chrome/answer/95647?hl=pt-BR&co=GENIE.Platform%3DAndroid&sjid=13859596838440895859-SA">Saiba mais</a>.</p>
        <button id="cookie-consent-button">Entendi</button>
    </div>

    <script>
        // Função para abrir/fechar o dropdown
        function toggleDropdown() {
            var dropdownContent = document.getElementById("dropdownContent");
            dropdownContent.classList.toggle("show");
        }

        // Quando o usuário clicar no botão de edição, carrega o modal com os dados do usuário
        document.getElementById('editBtn').onclick = function() {
            const userId = <?php echo $id; ?>; // Assumindo que o ID do usuário está disponível no PHP

            // Faz uma requisição AJAX para carregar os dados do usuário
            fetch('editar_perfil.php?id=' + userId)
                .then(response => response.text())
                .then(data => {
                    document.getElementById('modal-body').innerHTML = data;
                    document.getElementById('editModal').style.display = "block";
                });
        }

        // Quando o usuário clicar em <span> (x), fecha o modal de edição
        document.getElementsByClassName('close')[0].onclick = function() {
            document.getElementById('editModal').style.display = "none";
        }

        // Quando o usuário clicar em qualquer lugar fora do modal de edição, fecha o modal de edição
        window.onclick = function(event) {
            if (event.target == document.getElementById('editModal')) {
                document.getElementById('editModal').style.display = "none";
            }
        }

        // Quando o usuário clica no botão de entendi do banner de cookies, fecha o banner
        document.getElementById('cookie-consent-button').addEventListener('click', function() {
            document.getElementById('cookie-consent-banner').style.display = 'none';
            // Você pode adicionar código para definir um cookie aqui, se desejar
        });


        // Verifique se o perfil está completo
     
        // Execute a função quando a página carregar
        window.onload = checkProfileCompletion;
        
        const textElement = document.getElementById('typing-text');
        const text = "";
        let index = 0;

        function typeText() {
            if (index < text.length) {
                textElement.textContent += text.charAt(index);
                index++;
                setTimeout(typeText, 100); // Ajuste o tempo para mais rápido ou mais lento
            }
        }

        typeText();
    
    </script>


</body>

</html>