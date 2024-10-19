<?php
include('conexao.php');
include('menu.php');

// Iniciar sessão no topo da página


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
            background-color: #333;
            min-width: 160px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            border-radius: 5px;
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
            background-color: #555;
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


        /* Adicionar responsividade */
        @media (max-width: 1200px) {
            header {
                padding: 20px 10%;
            }

          

            .vad img {
                max-width: 400px;
            }

            .service-card {
                padding: 15px;
                margin: 8px;
            }
        }

        @media (max-width: 768px) {
            header {
                align-items: center;
                padding: 15px 5%;
            }


            .vad {
                flex-direction: column;
                text-align: center;
            }

            .vad img {
                max-width: 100%;
                margin: 20px 0;
            }

            .services {
                padding: 40px 10px;
            }

            .service-card {
                margin: 10px 0;
            }

            .ola {
                padding-left: 20px;
                text-align: center;
            }
        }

        @media (max-width: 480px) {
            .dropbtn {
                padding: 8px 15px;
                font-size: 0.8rem;
            }

            .service-card {
                padding: 10px;
            }

            .vad img {
                max-width: 100%;
                height: auto;
            }

            .ola {
                font-size: 1.2rem;
            }
        }
    </style>

</head>

<body>



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
            <!-- <a href="#" class="btn">Saiba mais</a> -->
        </div>
        <div class="service-card">
            <h3>Fundos Imobiliários (FIIs)</h3>
            <p> Esses fundos permitem investir em imóveis comerciais e residenciais sem precisar comprá-los diretamente, oferecendo renda passiva e potencial valorização.</p>
            <!-- <a href="#" class="btn">Saiba mais</a> -->
        </div>
        <div class="service-card">
            <h3>Fundos de Índice (ETFs)</h3>
            <p>ETFs acompanham índices de mercado, oferecendo uma forma diversificada de investir em ações, títulos e outros ativos.</p>
            <!-- <a href="#" class="btn">Saiba mais</a> -->
        </div>
        <div class="service-card">
            <h3>Títulos de Renda Fixa</h3>
            <p> Investir em títulos como Tesouro Direto, CDBs e Debêntures pode proporcionar uma renda fixa e previsível com menor risco.</p>
            <!-- <a href="#" class="btn">Saiba mais</a> -->
        </div>
        <!-- Adicione mais cards conforme necessário -->
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