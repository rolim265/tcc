<?php
// Estabelecer conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tcc";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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
        .vad {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1600px;
            margin: 200px auto;
            padding: 20px;
            border-radius: 8px;
            margin-top: 130px;
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
                <a href="#">Editar</a>
                <a href="#">Email: <?php echo $email; ?></a>
                <hr />
                <a href="logout.php" class="user"><i class="ri-user-fill"></i>Log out</a>
            </div>
        </div>
    </header>

    <!-- Início dos textos -->
    <div class="vad">
        <img src="../img/familia01.jpg" alt="Descrição da Imagem">
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero.
            Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum.
            Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa.
            Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra,
            per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc. Curabitur tortor.
            Pellentesque nibh.
            Aenean quam. In scelerisque sem at dolor.
        </p>
    </div>
    <div class="vad">
        <p>
            https://g1.globo.com/economia/noticia/2022/03/31/endividamento-bate-recorde-em-marco-puxado-pelo-cartao-de-credito-diz-cnc.ghtml
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero.
            Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum.
            Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa.
            Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra,
            per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc. Curabitur tortor.
            Pellentesque nibh.
            Aenean quam. In scelerisque sem at dolor.
        </p>
        <img src="../img/g1_endividados.png" alt="Descrição da Imagem">
    </div>
    <div class="vad">
        <img src="../img/quanto+.jpg" alt="Descrição da Imagem">
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero.
            Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum.
            Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa.
            Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra,
            per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc. Curabitur tortor.
            Pellentesque nibh.
            Aenean quam. In scelerisque sem at dolor.
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

    <script>
        function toggleDropdown() {
            document.getElementById("dropdownContent").classList.toggle("show");
        }

        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>

</body>

</html>