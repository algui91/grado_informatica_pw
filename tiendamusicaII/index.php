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
header_login();
?>
<div class="main-container">
    <main role="main" class="wrapper">
        <div class="flex-container">
            <section class="new-container">
                <?php
                $discs = new Disc();
                $discs = $discs->getAllDiscs();

                for ($i = 0; $i < 3; $i++) {
                    $plurals = $discs[$i]['numComments'] == 1 ? " Comentario " : " Comentarios ";
                    ?>
                    <article>
                        <header>
                            <h1><?php echo $discs[$i]['titulo']; ?></h1>
                            <figure>
                                <img src="<?php echo BASE_URL . $discs[$i]['cover']; ?>" alt="Portada decimus"
                                     height="256px"
                                     width="256px"/>
                            </figure>
                        </header>
                        <section>
                            <h2>Comentarios</h2>
                            <p><?php echo $discs[$i]['numComments'];
                                echo " " . $plurals; ?></p>
                        </section>
                    </article>
                    <?php
                }
                ?>

            </section>
            <section id="left-column">
                <h2>Secciones | Generos: <a href="epic.php">EPIC</a> / Pop / Metal | Más vendido | Más comentado</h2>
                <div class="featured-container">
                    <section>
                        <header>
                            <h3>Noticias Musicales</h3>
                        </header>
                        <ul>
                            <li>Noticia 1</li>
                            <li>Noticia 2</li>
                            <li>Noticia 3</li>
                            <li>Noticia 4</li>
                            <li>Noticia 5</li>
                            <li>Noticia 6</li>
                        </ul>
                    </section>
                    <section>
                        <h3>Discos más comentados</h3>
                        <ul>
                            <?php
                            foreach ($discs as $d) {
                                echo "<li>" . $d['titulo'] . "</li>";
                            }
                            ?>
                        </ul>
                    </section>
                    <section>
                        <h3>Disco del día</h3>
                        <h4>Decimus</h4>
                        <p>In the pantheon of Epic Music gods, only a chosen few can harness the absolute power of a
                            live orchestra, massive choir and the legendary Abbey Road Studios. Experience
                            audiomachine's signature sound on DECIMUS.
                        <p>
                    </section>
                    <section>
                        <h3>Otros discos comentados</h3>
                        <ul>
                            <li>Otros discos 1</li>
                            <li>Otros discos 2</li>
                            <li>Otros discos 3</li>
                            <li>Otros discos 4</li>
                            <li>Otros discos 5</li>
                            <li>Otros discos 6</li>
                            <li>Otros discos 7</li>
                        </ul>
                    </section>
                </div> <!-- featured -->
            </section>
            <section class="genrenews-container">
                <!-- <div> -->
                <h2>Novedades por género</h2>
                <h3>epic</h3>
                <article>
                    <div class="flexChild rowParent">
                        <div class="flexChild">
                            <figure>
                                <img src="img/decimus_20161008/disk.jpeg" alt="Portada decimus" height="64px"
                                     width="64px"/>
                            </figure>
                        </div>
                        <div class="flexChild columnParent">
                            <div class="flexChild">Disco</div>
                            <div class="flexChild columnParent">
                                <div class="flexChild rowParent">
                                    <div class="flexChild">Autor</div>
                                    <div class="flexChild">Reproducir</div>
                                </div>
                                <div class="flexChild">Ver</div>
                            </div>
                        </div>
                    </div>
                </article>
                <article>
                    <div class="flexChild rowParent">
                        <div class="flexChild">
                            <figure>
                                <img src="img/decimus_20161008/disk.jpeg" alt="Portada decimus" height="64px"
                                     width="64px"/>
                            </figure>
                        </div>
                        <div class="flexChild columnParent">
                            <div class="flexChild">Disco</div>
                            <div class="flexChild columnParent">
                                <div class="flexChild rowParent">
                                    <div class="flexChild">Autor</div>
                                    <div class="flexChild">Reproducir</div>
                                </div>
                                <div class="flexChild">Ver</div>
                            </div>
                        </div>
                    </div>
                </article>
                <article>
                    <div class="flexChild rowParent">
                        <div class="flexChild">
                            <figure>
                                <img src="img/decimus_20161008/disk.jpeg" alt="Portada decimus" height="64px"
                                     width="64px"/>
                            </figure>
                        </div>
                        <div class="flexChild columnParent">
                            <div class="flexChild">Disco</div>
                            <div class="flexChild columnParent">
                                <div class="flexChild rowParent">
                                    <div class="flexChild">Autor</div>
                                    <div class="flexChild">Reproducir</div>
                                </div>
                                <div class="flexChild">Ver</div>
                            </div>
                        </div>
                    </div>
                </article>
                <article>
                    <div class="flexChild rowParent">
                        <div class="flexChild">
                            <figure>
                                <img src="img/decimus_20161008/disk.jpeg" alt="Portada decimus" height="64px"
                                     width="64px"/>
                            </figure>
                        </div>
                        <div class="flexChild columnParent">
                            <div class="flexChild">Disco</div>
                            <div class="flexChild columnParent">
                                <div class="flexChild rowParent">
                                    <div class="flexChild">Autor</div>
                                    <div class="flexChild">Reproducir</div>
                                </div>
                                <div class="flexChild">Ver</div>
                            </div>
                        </div>
                    </div>
                </article>
                <article>
                    <div class="flexChild rowParent">
                        <div class="flexChild">
                            <figure>
                                <img src="img/decimus_20161008/disk.jpeg" alt="Portada decimus" height="64px"
                                     width="64px"/>
                            </figure>
                        </div>
                        <div class="flexChild columnParent">
                            <div class="flexChild">Disco</div>
                            <div class="flexChild columnParent">
                                <div class="flexChild rowParent">
                                    <div class="flexChild">Autor</div>
                                    <div class="flexChild">Reproducir</div>
                                </div>
                                <div class="flexChild">Ver</div>
                            </div>
                        </div>
                    </div>
                </article>
                <article>
                    <div class="flexChild rowParent">
                        <div class="flexChild">
                            <figure>
                                <img src="img/decimus_20161008/disk.jpeg" alt="Portada decimus" height="64px"
                                     width="64px"/>
                            </figure>
                        </div>
                        <div class="flexChild columnParent">
                            <div class="flexChild">Disco</div>
                            <div class="flexChild columnParent">
                                <div class="flexChild rowParent">
                                    <div class="flexChild">Autor</div>
                                    <div class="flexChild">Reproducir</div>
                                </div>
                                <div class="flexChild">Ver</div>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- </div> -->
            </section>
            <section id="latest-row">
                <h2>Últimos por género</h2>
                <div class="latest-container">
                    <article>
                        <div class="flexChild rowParent">
                            <div class="flexChild">
                                <figure>
                                    <img src="img/decimus_20161008/disk.jpeg" alt="Portada decimus" height="64px"
                                         width="64px"/>
                                </figure>
                            </div>
                            <div class="flexChild columnParent">
                                <div class="flexChild">Disco</div>
                                <div class="flexChild columnParent">
                                    <div class="flexChild rowParent">
                                        <div class="flexChild">Autor</div>
                                        <div class="flexChild">Reproducir</div>
                                    </div>
                                    <div class="flexChild">Ver</div>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article>
                        <div class="flexChild rowParent">
                            <div class="flexChild">
                                <figure>
                                    <img src="img/decimus_20161008/disk.jpeg" alt="Portada decimus" height="64px"
                                         width="64px"/>
                                </figure>
                            </div>
                            <div class="flexChild columnParent">
                                <div class="flexChild">Disco</div>
                                <div class="flexChild columnParent">
                                    <div class="flexChild rowParent">
                                        <div class="flexChild">Autor</div>
                                        <div class="flexChild">Reproducir</div>
                                    </div>
                                    <div class="flexChild">Ver</div>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article>
                        <div class="flexChild rowParent">
                            <div class="flexChild">
                                <figure>
                                    <img src="img/decimus_20161008/disk.jpeg" alt="Portada decimus" height="64px"
                                         width="64px"/>
                                </figure>
                            </div>
                            <div class="flexChild columnParent">
                                <div class="flexChild">Disco</div>
                                <div class="flexChild columnParent">
                                    <div class="flexChild rowParent">
                                        <div class="flexChild">Autor</div>
                                        <div class="flexChild">Reproducir</div>
                                    </div>
                                    <div class="flexChild">Ver</div>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article>
                        <div class="flexChild rowParent">
                            <div class="flexChild">
                                <figure>
                                    <img src="img/decimus_20161008/disk.jpeg" alt="Portada decimus" height="64px"
                                         width="64px"/>
                                </figure>
                            </div>
                            <div class="flexChild columnParent">
                                <div class="flexChild">Disco</div>
                                <div class="flexChild columnParent">
                                    <div class="flexChild rowParent">
                                        <div class="flexChild">Autor</div>
                                        <div class="flexChild">Reproducir</div>
                                    </div>
                                    <div class="flexChild">Ver</div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </section>
    </main>
</div> <!-- New -->
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
