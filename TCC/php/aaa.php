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
    <title>Home</title>
    <link rel="stylesheet" href="../csss/aaap.css">

    <style>
        /* Reset básico */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Estilos gerais do corpo */
        body {
            font-family: Arial, sans-serif;
            background-color: #2e2e2e;
            /* Fundo preto */
            color: #e0e0e0;
            /* Texto claro */
            line-height: 1.6;
        }

        header {
            /* Fundo do cabeçalho escuro */
            max-height: 98px;
            max-width: 100vw;
            top: 0;
            right: 0;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #000000;
            padding: 28px 12%;
            transition: all .50s ease;
        }

        .logo img {
            height: 65px;
        }

        .navbar {
            list-style: none;
            display: flex;
        }

        .navbar li {
            margin: 0 15px;
        }

        .navbar a {
            color: #e0e0e0;
            text-decoration: none;
        }

        .navbar a.active {
            border-bottom: 2px solid #51df2d;
            /* Verde fresco */
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropbtn {
            background-color: #32CD32;
            /* Verde fresco */
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
            /* Verde escuro */
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #51df2d;
            /* Fundo escuro */
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
        }

        .dropdown-content a:hover {
            background-color: #333;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #1e8e3e;
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
            background-color: #121212;
            /* Fundo escuro */
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #333;
            width: 80%;
            color: #e0e0e0;
            /* Texto claro */
        }

        .close {
            color: #e0e0e0;
            /* Texto claro */
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #ffffff;
            /* Texto branco */
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
            color: #32CD32;
            /* Verde fresco */
            text-decoration: underline;
        }

        .cookie-consent-banner button {
            background-color: #32CD32;
            /* Verde fresco */
            border: none;
            color: #121212;
            /* Fundo preto */
            padding: 10px 20px;
            cursor: pointer;
            margin-top: 10px;
        }

        .ola {
            align-items: center;
            justify-content: space-between;
            max-width: 1600px;
            margin: 50px auto;
            padding-left: 80px;
            border-radius: 8px;
            margin-top: 130px;
            color: #e0e0e0;
            /* Texto claro */
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
            color: #e0e0e0;
            /* Texto claro */
        }

        .services {
            text-align: center;
            padding: 50px 0;
        }

        .services h2 {
            color: #e0e0e0;
            /* Texto claro */
            margin-bottom: 30px;
        }

        .service-card {
            background-color: #1f1f1f;
            /* Fundo escuro */
            padding: 20px;
            margin: 10px;
            border-radius: 8px;
            border: 1px solid #333;
            color: #e0e0e0;
            /* Texto claro */
        }

        .service-card h3 {
            margin-bottom: 10px;
        }

        .service-card p {
            margin-bottom: 15px;
        }

        .service-card .btn {
            background-color: #32CD32;
            /* Verde fresco */
            color: #121212;
            /* Fundo preto */
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        .service-card .btn:hover {
            background-color: #1e8e3e;
            /* Verde escuro */
        }

        h3 {
            color: #32CD32 !important;
        }

        .modal02 {
            display: none;
            /* Oculto por padrão */
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        /* Conteúdo do modal */
        .modal002 {
            background-color: #000000;
            padding: 20px;
            border-radius: 10px;
            width: 400px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        /* Estilo do botão de fechar */
        .close02 {
            position: absolute;
            right: 20px;
            top: 10px;
            font-size: 28px;
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

    <div class="services">
        <h2>O que são Investimentos?</h2>
        <div class="service-card">
            <h3>Ações</h3>
            <p>Investir em ações de empresas com bom histórico e potencial de crescimento pode resultar em grandes retornos. Considere diversificar entre setores e empresas.</p>
            <a href="#" class="btn" id="saibaMaisBtn">Saiba mais</a>
        </div>
        <!-- /.service-card -->
        <div id="modal02" class="modal02">
            <div class="modal002">
                <span class="close02">&times;</span>
                <h3>Mais Informações</h3>
                <p>Tipos de Ações:

                <li>Ordinárias (ON): Direito a voto e participação nos lucros da empresa.</li>
                <li>Preferenciais (PN): Prioridade nos dividendos, mas sem direito a voto.</li>
                <h1>Como Escolher:</h1>

                <li>Analise a empresa: Resultados financeiros, setor, plano de negócios.</li>
                <li>Seu perfil: Conservador, moderado ou agressivo?</li>
                <li>Diversifique: Não coloque todos os ovos em uma cesta.</li>
                <li>Use ferramentas: Gráficos, indicadores, notícias, Nossas video aulas.</p>
                </li>
            </div>
        </div>
        <!-- /.ssssss -->
        <div class="service-card">
            <h3>Fundos Imobiliários (FIIs)</h3>
            <p> Esses fundos permitem investir em imóveis comerciais e residenciais sem precisar comprá-los diretamente, oferecendo renda passiva e potencial valorização.</p>
            <a href="#" class="btn" id="saibaMaisBtn">Saiba mais</a>
        </div>
        <!-- /.service-card -->
        <div id="modal02" class="modal02">
            <div class="modal002">
                <span class="close02">&times;</span>
                <h3>Mais Informações</h3>
                <p>Aqui estão mais detalhes sobre o conteúdo. Você pode adicionar mais informações conforme necessário.</p>
            </div>
        </div>
        <!-- /.ssssss -->
        <div class="service-card">
            <h3>Fundos de Índice (ETFs)</h3>
            <p>ETFs acompanham índices de mercado, oferecendo uma forma diversificada de investir em ações, títulos e outros ativos.</p>
            <a href="#" class="btn" id="saibaMaisBtn">Saiba mais</a>
        </div>
        <!-- /.service-card -->
        <div id="modal02" class="modal02">
            <div class="modal002">
                <span class="close02">&times;</span>
                <h3>Mais Informações</h3>
                <p>Aqui estão mais detalhes sobre o conteúdo. Você pode adicionar mais informações conforme necessário.</p>
            </div>
        </div>
        <!-- /.ssssss -->
        <div class="service-card">
            <h3>Títulos de Renda Fixa</h3>
            <p> Investir em títulos como Tesouro Direto, CDBs e Debêntures pode proporcionar uma renda fixa e previsível com menor risco.</p>
            <a href="#" class="btn" id="saibaMaisBtn">Saiba mais</a>
        </div>
        <!-- /.service-card -->
        <div id="modal02" class="modal02">
            <div class="modal002">
                <span class="close02">&times;</span>
                <h3>Mais Informações</h3>
                <p>Aqui estão mais detalhes sobre o conteúdo. Você pode adicionar mais informações conforme necessário.</p>
            </div>
        </div>
        <!-- /.ssssss -->
        <!-- Adicione mais cards conforme necessário -->
    </div>

    <!-- Banner de Consentimento de Cookies
    <div class="cookie-consent-banner" id="cookieConsentBanner">
        <p>Este site usa cookies para melhorar sua experiência. Ao continuar navegando, você concorda com nossa <a href="#">Política de Privacidade</a>.</p>
        <button onclick="acceptCookies()">Aceitar</button>
    </div> -->

    <script>
        // Obtém os elementos do DOM
        var modal = document.getElementById("modal02");
        var btn = document.getElementById("saibaMaisBtn");
        var closeBtn = document.getElementsByClassName("close02")[0];

        // Quando o usuário clica no botão "Saiba mais", o modal é exibido
        btn.onclick = function() {
            modal.style.display = "flex";
        }

        // Quando o usuário clica no "x", o modal é fechado
        closeBtn.onclick = function() {
            modal.style.display = "none";
        }

        // Quando o usuário clica fora do modal, ele também é fechado
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

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