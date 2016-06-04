<?php
require_once('../inc/utils.php');
require_once('../db/Disc.php');

session_start();

if (!empty($_GET)) {
    $_SESSION['get'] = $_GET;
    header('Location: details.php');
//    die;
}

if (isset($_SESSION['get'])) {

    $id = $_SESSION['get']['id'];

    $d = new Disc();

    if (!($disc = $d->getDisc($id))) {
        die('<h1>El disco no existe.</h1>');
    }

    $comments = $d->getComments($id);
    $tracks = $d->getTracks($id);

    $title = $disc['titulo'];
    $gender = $disc['genero'];
    $price = $disc['precio'];
    $discografy = $disc['productora'];
    $rating = $disc['valoracion'];
    $cover = $disc['cover'];

} else {
    die('<h1>El disco no existe.</h1>');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_comment = "";
    $commentError = "";
    if (empty($_POST["comment"])) {
        $commentError = "Debes escribir un comentario";
    } else {
        $user_comment = test_input($_POST["comment"]);
        $commentError = "";
    }

    if (!empty($user_comment)) {
        $comnt = new Comment(array(
            ":id_user" => $_SESSION["logged_user_id"],
            ":id_disc" => $id,
            ":comment" => $user_comment,
        ));
        $comnt->insertComment();
    }
    $user_comment = "";

    // Redirect to this page.
    header("Location: " . $_SERVER['REQUEST_URI']);
    exit();
}
?>
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
<?php header_login(); ?>
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
                            <img src="<?php echo BASE_URL . $cover; ?>" alt="Portada decimus" height="512px"
                                 width="512"/>
                            <?php
                            if ($tracks) {
                                ?>
                                <span class="tooltiptex-details">
                                <?php
                                echo "<h1>Lista de canciones</h1>";
                                $trackno = 1;
                                foreach ($tracks as $t) {
                                    echo $trackno . ". " . $t . "<br/>";
                                    $trackno += 1;
                                }
                                ?>
                            </span>
                                <?php
                            } ?>
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
                <section id="comment_section">
                    <h1>Comentarios</h1>
                    <?php
                    foreach ($comments as $comment) {
                    ?>
                    <header id="comment_header">
                        <p><?php echo "<strong>" . $comment['nombre'] . "</strong>" . " el " . $comment['fecha'] . " comentó:"; ?></p>
                    </header>
                    <section>
                        <?php
                        $multiline_comment = preg_split("/\n/", $comment['comentario']);
                        foreach ($multiline_comment as $line)
                            echo "<p><em>" . $line . "</em></p>";
                        ?>
                    </section>
                </section>
                <?php
                }
                ?>
                <form method="post"
                      action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo $id; ?>">
                    <?php
                    if (isset($_SESSION["logged_user"])) {
                        ?>
                        <h1>Dejanos un comentario</h1>
                        <section id="comment_form">
                            <span><?php if (!empty($commentError)) echo $commentError; ?></span>
                            <div>
            <textarea rows="10" oninput="this.setCustomValidity('')"
                      oninvalid="this.validity.valueMissing ? this.setCustomValidity('Debes introducir un comentario') : this.setCustomValidity('')"
                      name="comment" id="comment" placeholder="Comentario" required></textarea>
                            </div>
                            <div>
                                <input type="submit" name="submit" value="Add Comment">
                            </div>
                        </section>
                        <?php
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
        <h1><a href="<?php echo BASE_URL . "como_se_hizo.pdf"; ?>">¿Cómo se hizo?</a></h1>
    </footer>
</div>
</body>
</html>
