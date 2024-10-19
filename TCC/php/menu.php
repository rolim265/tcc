<?php
include('conexao.php');

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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #2e2e2e; /* Fundo preto */
            color: #e0e0e0; /* Texto claro */
            line-height: 1.6;
            min-height: 100vh;
        }
        .navbar a:hover {
            color: #29fd53;
        }
        header {
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
            flex-wrap: wrap; /* Adicionando flex-wrap para itens que não cabem na linha */
        }

        .navbar li {
            margin: 0 15px;
        }

        .navbar a {
            color: #e0e0e0;
            text-decoration: none;
        }

        .navbar a.active {
            border-bottom: 2px solid #51df2d; /* Verde fresco */
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropbtn {
            background-color: #32CD32; /* Verde fresco */
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
            background-color: #1e8e3e; /* Verde escuro */
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
            background-color: #121212; /* Fundo escuro */
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #333;
            width: 80%;
            max-width: 600px; /* Largura máxima para o modal */
            color: #e0e0e0; /* Texto claro */
        }

        .close {
            color: #e0e0e0; /* Texto claro */
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #ffffff; /* Texto branco */
            text-decoration: none;
            cursor: pointer;
        }

        #menu-icon {
            font-size: 35px;
            color: #e0e0e0; /* Ajuste a cor */
            cursor: pointer;
            z-index: 10001;
            display: none;
        }

        @media (max-width: 1280px) {
            header {
                padding: 14px 2%;
                transition: .2s;
            }
            .navbar a {
                padding: 5px 0;
                margin: 0px 10px; /* Ajustando o espaçamento */
            }
        }

        @media (max-width: 1090px) {
            #menu-icon {
                display: block;
            }
            .navbar {
                position: static;
                top: 100%;
                right: -100%;
                width: 80%; /* Largura ajustada */
                 /*height: auto; Altura automática */
                display: flex;
                flex-direction: column;
                border-radius: 10px;
                transition: all .50s ease;
                background-color: #000; /* Fundo do menu */
                margin-top: auto;
            }
            .navbar a {
                display: block;
                margin: 12px 0;
                padding: 10px; /* Aumentando o espaço ao redor */
                text-align: center; /* Centralizando texto */
            }
            .navbar.open {
                right: 2%;
            }
        }

        @media (max-width: 600px) {
            header {
                padding: 10px 5%; /* Reduzindo o padding para telas pequenas */
            }
            .modal-content {
                width: 90%; /* Largura do modal ajustada */
            }
        }
    </style>
</head>
<body>
    <header>
        <a href="#" class="logo"><span><img src="../img/logocoffe.png" alt="" style="height: 65px;"></span></a>
        <ul class="navbar">
            <li><a href="../php/aaa.php">Início</a></li>
            <li><a href="../html/sobre.php">Sobre</a></li>
            <li><a href="aulas.php">Vídeos Aulas</a></li>
            <li><a href="../php/contato.php">Contato</a></li>
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
                <span style="color:red" class="close">&times;</span>
                <h2 style="color: black;">Editar Perfil</h2>
                <div id="modal-body"></div>
            </div>
        </div>
    </header>
    <script>
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
    </script>
</body>
</html>
