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