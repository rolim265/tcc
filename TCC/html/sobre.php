<?php include('../php/menu.php');?>

<!DOCTYPE html>


<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Corretora Internacional</title>
    <link rel="stylesheet" href="">
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
        background-color: #000; /* Fundo preto */
        color: #fff; /* Texto branco */
    }

    .container {
        width: 80%;
        margin: 0 auto;
        padding: 20px 0;
    }

    img {
        max-width: 100%;
        height: auto;
    }

    /* Seção de boas-vindas */
    .hero {
        background-color: #1f1f1f; /* Tom de preto mais claro */
        padding: 50px 0;
        text-align: center;
    }

    .hero h1 {
        font-size: 2.5em;
        color: #39ff14; /* Verde neon */
    }

    .hero p {
        font-size: 1.2em;
        color: #39ff14; /* Verde neon */
    }

    /* Seção de características */
    .features {
        background-color: #000;
        padding: 40px 0;
        display: flex;
        justify-content: space-around;
        text-align: center;
        align-items: center;
    }

    .feature-item {
        width: 30%; /* Ajuste a largura para que todos os itens caibam lado a lado */
    }

    .feature-item img {
        width: 60px; /* Tamanho dos ícones */
        height: auto;
        margin-bottom: 10px;
    }

    .feature-content h3 {
        font-size: 1.5em;
        color: #39ff14; /* Verde neon */
        margin-bottom: 10px;
    }

    .feature-content p {
        font-size: 1em;
        color: #fff;
    }

    /* Seção sobre a empresa */
    .about-us {
        background-color: #1f1f1f;
        padding: 50px 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .about-us .about-text {
        width: 50%; /* Metade da largura para o texto */
        padding-right: 20px; /* Espaçamento entre texto e imagem */
    }

    .about-us .about-text h2 {
        font-size: 2em;
        color: #39ff14; /* Verde neon */
        margin-bottom: 20px;
    }

    .about-us .about-text p {
        font-size: 1.1em;
        color: #fff;
        margin-bottom: 20px;
    }

    .about-us .about-text .cta-button {
        background-color: #39ff14; /* Verde neon */
        color: #000; /* Texto preto */
        padding: 15px 25px;
        border: none;
        cursor: pointer;
        font-size: 1.1em;
        border-radius: 5px;
    }

    .about-us .about-image {
        width: 40%; /* Metade da largura para a imagem */
    }

    .about-us .about-image img {
        width: 100%; /* A imagem ocupará toda a largura disponível */
        height: auto;
    }

    /* Seção de valores */
    .values {
        background-color: #000;
        padding: 40px 0;
        text-align: center;
    }

    .value-item h3 {
        font-size: 1.5em;
        color: #39ff14; /* Verde neon */
        margin-bottom: 10px;
    }

    .value-item p {
        font-size: 1em;
        color: #fff;
    }

    /* Seção de oferta */
    .offer {
        background-color: #1f1f1f;
        padding: 40px 0;
        text-align: center;
    }

    .offer h2 {
        font-size: 2em;
        color: #39ff14; /* Verde neon */
        margin-bottom: 20px;
    }

    .offer-button {
        background-color: #39ff14; /* Verde neon */
        color: #000; /* Texto preto */
        padding: 15px 25px;
        border: none;
        cursor: pointer;
        font-size: 1.1em;
        border-radius: 5px;
    }

    /* Seção de plataforma */
    .platform {
        background-color: #000;
        padding: 50px 0;
        text-align: center;
    }

    .platform h2 {
        font-size: 2em;
        color: #39ff14; /* Verde neon */
        margin-bottom: 20px;
    }

    .platform ul {
        list-style-type: none;
        margin-bottom: 20px;
    }

    .platform ul li {
        font-size: 1.1em;
        color: #39ff14; /* Verde neon */
        margin: 10px 0;
    }
</style>
<body>

    <!-- Seção de boas-vindas -->
    <section class="hero">
        <div class="container">
            <h1>Bem-vindo à Corretora Internacional</h1>
            <p>Somos uma das maiores corretoras internacionais, oferecendo acesso imediato a centenas de mercados globais.</p>
        </div>
    </section>

    <!-- Seção de características -->
    <section class="features">
        <div class="feature-item">
            <img src="../img/sobre_1.png" alt="Ícone de negociação">
            <div class="feature-content">
                <h3>Plataforma de Negociação</h3>
                <p>Constantemente aprimorada, garantindo o melhor do mercado.</p>
            </div>
        </div>
        <div class="feature-item">
            <img src="../img/sobre_2.png" alt="Ícone de regulação">
            <div class="feature-content">
                <h3>Regulamentação Internacional</h3>
                <p>Somos regulamentados por algumas das maiores autoridades financeiras do mundo.</p>
            </div>
        </div>
        <div class="feature-item">
            <img src="../img/sobre_3.png" alt="Ícone de sucesso">
            <div class="feature-content">
                <h3>Foco no Sucesso</h3>
                <p>Nosso sucesso está no desenvolvimento contínuo de serviços para nossos clientes.</p>
            </div>
        </div>
    </section>

    <!-- Seção sobre a empresa -->
    <section class="about-us">
        <div class="about-text">
            <h2>Sobre a Empresa</h2>
            <p>Com mais de 20 anos de experiência, a XYZ é uma das maiores corretoras internacionais, atendendo milhares de investidores em mais de 150 países.</p>
            <button class="cta-button">Registre-se Gratuitamente</button>
        </div>
        <div class="about-image">
            <img src="../img/sobre_4.png" alt="Sobre a empresa">
        </div>
    </section>

    <!-- Seção de valores -->
    <section class="values">
        <div class="container">
            <h2>Nossos Valores</h2>
            <div class="value-item">
                <h3>Tecnologia</h3>
                <p>Acompanhamos as tendências mais importantes do mercado financeiro com segurança.</p>
            </div>
            <div class="value-item">
                <h3>Confiança</h3>
                <p>Com mais de 20 anos de atuação no mercado, somos regulamentados em vários países.</p>
            </div>
            <div class="value-item">
                <h3>Apoio</h3>
                <p>Sistema de apoio que garante suporte internacional 24 horas.</p>
            </div>
        </div>
    </section>

    <!-- Seção de oferta -->
    <section class="offer">
        <div class="container">
            <h2>Oferta</h2>
            <a href="#" class="offer-button">Invista em ações internacionais</a>
        </div>
    </section>

    <!-- Seção de plataforma -->
    <section class="platform">
        <div class="container">
            <h2>O sucesso começa com a plataforma certa</h2>
            <img src="../img/sobre_4.png" alt="Imagem da plataforma de investimentos">
            <ul>
                <li>Gráficos interativos</li>
                <li>Execução rápida de ordens</li>
                <li>Plataforma para desktop e mobile</li>
            </ul>
            <button class="cta-button">Saiba Mais</button>
        </div>
    </section>

</body>
</html>
