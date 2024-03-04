<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serviços Premium</title>
    <link rel="stylesheet" href="csss/home.css">
</head>
<body>

<section class="services">
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
                echo '<h2>Nossos Serviços Premium</h2>';
                echo '<div class="service-card">';
                echo '<h3>' . $row["nome"] . '</h3>';
                echo '<p>' . $row["descricao"] . '</p>';
                echo '<span class="valor">' . $row["valor"] . '</span>';
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
