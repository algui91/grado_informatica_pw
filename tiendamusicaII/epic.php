<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="css/main.css">
</head>
<body>

<?php
require_once('inc/utils.php');
require_once('db/Disc.php');
login_form();
?>

<div class="main-container">
    <main role="main" class="wrapper">
        <header class="section-title">
            <h2>Sección de EPIC</h2>
        </header>
        <div class="flex-container-epic">
            <div class="left-column">
                <?php
                $discs = new Disc();
                $data = $discs->getAllDiscs(); // TODO, get only title, add photo, check not empty
                $_SESSION['data'] = $data;
                ?>
                <article class="best-seller">
                    <figure>
                        <img src="img/decimus_20161008/disk.jpeg" alt="Portada decimus" height="256px" width="256px"/>
                    </figure>
                    <header>
                        <h1><?php echo $data[0]['titulo']; ?></h1>
                    </header>
                    <p><a href="epic/details.php?id=<?php echo $data[0]['id'] ?>" title="Ver Decimus">Ver</a></p>
                    <p>15 Comentarios</p>
                </article>
                <div class="featured-epic">
                    <?php
                    unset($data[0]);
                    foreach ($data as $item) {
                        ?>
                        <article class="other-discs">
                            <figure>
                                <img src="img/decimus_20161008/disk.jpeg" alt="Portada decimus" height="128px"
                                     width="128px"/>
                            </figure>
                            <header>
                                <h3><?php echo $item['titulo']; ?></h3>
                            </header>
                            <p> Comentarios
                            <p>
                            <p><a href="epic/details.php?id=<?php echo $item['id'] ?>" title="Ver Decimus"> Ver</a>
                            <p>
                        </article>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <section class="newer">
                <?php
                foreach ($data as $item) {
                    ?>
                    <article>
                        <div class="flexChild rowParent">
                            <div class="flexChild">
                                <figure>
                                    <img src="img/decimus_20161008/disk.jpeg" alt="Portada decimus" height="64px"
                                         width="64px"/>
                                </figure>
                            </div>
                            <div class="flexChild columnParent">
                                <div class="flexChild"><?php echo $item['titulo']; ?></div>
                                <div class="flexChild columnParent">
                                    <div class="flexChild rowParent">
                                        <div class="flexChild"><?php echo $item['productora']; ?></div>
                                    </div>
                                    <div class="flexChild">Ver</div>
                                </div>
                            </div>
                        </div>
                    </article>
                    <?php
                }
                ?>
            </section>
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
        <a href="./formulario.php">Suscribete</a>
        <h1><a href="./como_se_hizo.pdf">¿Cómo se hizo?</a></h1>
    </footer>
</div>
</body>
</html>

