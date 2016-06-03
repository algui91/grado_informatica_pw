<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="../css/main.css">
</head>
<body>

<?php
require_once('../inc/utils.php');
require_once('../db/Disc.php');
require_once('../db/Comment.php');
require_once('../db/Track.php');

header_login();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $d = new Disc();

    if (!($disc = $d->getDisc($id))) {
        die('<h1>El disco no existe.</h1>');
    }

    $title = $disc['titulo'];
    $gender = $disc['genero'];
    $price = $disc['precio'];
    $discografy = $disc['productora'];
    $rating = $disc['valoracion'];
    $cover = $disc['cover'];

    $tracks = new Track();
    $tracks = $tracks->getTracks($id);
} else {
    die('<h1>El disco no existe.</h1>');
}
?>
<div class="main-container">
    <main role="main" class="wrapper">
        <h2>Secciones | Generos: <a href="../epic.php">EPIC</a> / Pop / Metal | Más vendido | Más comentado</h2>
        <header class="section-title">
            <h2>Sección de EPIC</h2>
        </header>
        <header>
            <h1><?php echo $title; ?></h1>
        </header>
        <div class="flex-container-epic">
            <div class="left-column-disc">
                <article class="disc-contents">
                    <div class="disc-left">
                        <h1><?php echo $discografy; ?></h1>
                        <figure class="tooltip">
                            <img src="<?php echo BASE_URL . $cover;?>" alt="Portada decimus" height="512px"
                                 width="512"/>
                            <span class="tooltiptext">
                                <?php
                                if ($tracks){
                                    $trackno = 1;
                                    foreach ($tracks as $t){
                                        echo $trackno . ". " . $t . "<br/>";
                                        $trackno += 1;
                                    }
                                }
                                ?>
                            </span>
                        </figure>
                        <p>Género: <?php echo $gender; ?></p>
                        <p>Precio: $<?php echo $price; ?></p>
                        <p>Productora: <?php echo $discografy; ?></p>
                        <p>Valoración: <?php echo $rating; ?></p>
                    </div>
                    <div class="disc-right">
                        <audio controls="controls">
                            <source src="song.mp3" type="audio/mp3"/>
                            <source src="song.ogg" type="audio/ogg"/>
                            Your browser does not support the audio tag.
                        </audio>
                        <audio controls="controls">
                            <source src="song.mp3" type="audio/mp3"/>
                            <source src="song.ogg" type="audio/ogg"/>
                            Your browser does not support the audio tag.
                        </audio>
                        <audio controls="controls">
                            <source src="song.mp3" type="audio/mp3"/>
                            <source src="song.ogg" type="audio/ogg"/>
                            Your browser does not support the audio tag.
                        </audio>
                        <audio controls="controls">
                            <source src="song.mp3" type="audio/mp3"/>
                            <source src="song.ogg" type="audio/ogg"/>
                            Your browser does not support the audio tag.
                        </audio>
                        <audio controls="controls">
                            <source src="song.mp3" type="audio/mp3"/>
                            <source src="song.ogg" type="audio/ogg"/>
                            Your browser does not support the audio tag.
                        </audio>
                        <audio controls="controls">
                            <source src="song.mp3" type="audio/mp3"/>
                            <source src="song.ogg" type="audio/ogg"/>
                            Your browser does not support the audio tag.
                        </audio>
                        <audio controls="controls">
                            <source src="song.mp3" type="audio/mp3"/>
                            <source src="song.ogg" type="audio/ogg"/>
                            Your browser does not support the audio tag.
                        </audio>
                        <audio controls="controls">
                            <source src="song.mp3" type="audio/mp3"/>
                            <source src="song.ogg" type="audio/ogg"/>
                            Your browser does not support the audio tag.
                        </audio>
                        <audio controls="controls">
                            <source src="song.mp3" type="audio/mp3"/>
                            <source src="song.ogg" type="audio/ogg"/>
                            Your browser does not support the audio tag.
                        </audio>
                        <audio controls="controls">
                            <source src="song.mp3" type="audio/mp3"/>
                            <source src="song.ogg" type="audio/ogg"/>
                            Your browser does not support the audio tag.
                        </audio>
                        <div class="row-nowrap">
                            <p>Comentarios</p>
                            <p>Comprar</p>
                            <p>Reproducir</p>
                        </div>
                    </div>
                </article>
                <?php
                $allComments = new Comment();
                ?>
                <section id="comment_section">
                    <h1>Comentarios</h1>
                    <?php
                    foreach ($allComments->getAllCommentsForDisc($id) as $item) {
                    ?>
                    <header id="comment_header">
                        <p><?php echo "<strong>" . $item['nombre'] . "</strong>" . " el " . $item['fecha'] . " comentó:"; ?></p>
                    </header>
                    <section>
                        <p><em><?php echo $item['comentario']; ?></em></p>
                    </section>
                </section>
            <?php
            }
            ?>
                <form method="post"
                      action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo $id; ?>">
                    <?php
                    if (isset($_SESSION["logged_user"])) {
                        comment_form($id);
                    } else {
                        echo "<h1>Logeate para comentar</h1>";
                    }
                    ?>
                </form>
            </div>
        </div>
    </main>
</div><!-- #main-container -->
<div class="footer-container">
    <footer class="wrapper">
        <h3>Contacto</h3>
        Encuentranos en
        <address>
            Avda XXXXX, YYYY, Granada, CP: 88888, example@example.com. Webmaster: Alex
        </address>
        <a href="../formulario.php">Suscribete</a>
    </footer>
</div>
</body>
</html>
