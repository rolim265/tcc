<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serviços Premium</title>
    <link rel="stylesheet" href="csss/home.css">

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
    </style>
</head>

<body>


    <header>
        <a href="#" class="logo"><span>Logo</span></a>
        <ul class="navbar">
            <li><a href="home.html" class="Active">Inicio</a></li>
            <li><a href="sobre.html" class="">Sobre</a></li>
            <li><a href="" class="">Projetos</a></li>
            <li><a href="" class="">Contato</a></li>
        </ul>
        <div class="main">
            <a href="logout.php" class="user"><i class="ri-user-fill"></i>Logout</a>
            <div class="bx bx-menu" id="menu-icon"></div>

        </div>
    </header>



    <!-- inicio textos  -->



    <div class="vad">
        <img src="img\familia01.jpg" alt="Descrição da Imagem">
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
        <img src="img\g1_endividados.png" alt="Descrição da Imagem">
    </div>
    <div class="vad">
        <img src="img\quanto+.jpg" alt="Descrição da Imagem">
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



    <!-- inicio Serviços -->



    <section class="services">
        <h2>Nossos Serviços Premium</h2>
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
    <br>
    <br>

</body>

</html>