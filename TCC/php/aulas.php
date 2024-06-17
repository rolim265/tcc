<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../csss/au.css">
    <title>Document</title>
</head>
<body>   
<header>
        <a href="#" class="logo"><span>Logo</span></a>
        <ul class="navbar">
            <li><a href="aaa.php" class="Active">Inicio</a></li>
            <li><a href="../html/sobre.html" class="">Sobre</a></li>
            <li><a href="aulas.php" class="">Vídeos Aulas</a></li>
            <li><a href="" class="">Contato</a></li>
        </ul>
        <div class="main">
            <a href="logout.php" class="user"><i class="ri-user-fill"></i>Logout</a>
            <div class="bx bx-menu" id="menu-icon"></div>

        </div>
    </header>
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Competências Socioemocionais:Autogestão
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              As minhas principais competências de Autogestão é:<strong>Determinação, Foco, Responsabilidadee Persistência.</strong>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Competências Socioemocionais:Amabilidade
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                As minhas principais competências de Amabilidade é:<strong>Empatia, Respeito e Confiança.</strong>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
             Competências Socioemocionais:Interação com os outros e abertura ao novo
            </button>
          </h2>
          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                As minhas principais competências delas é:<strong>Entusiasmo e Curiosidade para aprender.</strong>
            </div>
          </div>
        </div>
      </div>

<section class="services">
        <h2>Video Aulas</h2>
        <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tcc";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM video";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="service-card">';
        echo '<h3>' . $row["titulo"] . '</h3>';
        $video_id = getYoutubeVideoId($row["link"]);
        echo '<div class="video-container">';
        // iframe
        echo '<iframe width="320" height="240" src="https://www.youtube.com/embed/' . $video_id . '" frameborder="0" allowfullscreen></iframe>';
        echo '</div>';
    }
} else {
    echo "0 results";
}
$conn->close();

// Função para extrair o ID do vídeo do YouTube do link
function getYoutubeVideoId($url) {
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


</body>
</html>