<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serviços Premium</title>
    <link rel="stylesheet" href="csss/home.css">
</head>
<body>
        

        <header>
            <a href="#" class="logo"><span>Logo</span></a>
            <ul class="navbar">
                <li><a href="" class="Active">Inicio</a></li>
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

  <p style="padding-top: 130px; padding-left: 47px; padding-right: 47px;">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero.
    Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum.
    Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa.
    Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra,
    per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc. Curabitur tortor. Pellentesque nibh.
    Aenean quam. In scelerisque sem at dolor.
</p>


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
                while($row = $result->fetch_assoc()) {
                    
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

</body>
</html>
