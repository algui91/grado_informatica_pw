<?php
/**
 * Copyright 2016 Alejandro Alcalde
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * Created by IntelliJ IDEA.
 * User: hkr
 * Date: 6/2/16
 * Time: 11:26 AM
 */

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    die('<h1>No tienes permisos para entrar en esta página</h1>');
}
?>
<!doctype html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="css/main.css">

    <script type="text/javascript">
        function check(input) {
            if (input.validity.valueMissing) {
                input.setCustomValidity(input.id + ' es obligatorio');
            } else {
                input.setCustomValidity('');
            }
            if (input.name == "title" || input.name == "producer") {
                if (input.validity.patternMismatch) {
                    input.setCustomValidity(input.id + ' debe contener únicamente caracteres y/o espacios');
                }
            } else if (input.name == "price") {
                if (input.validity.patternMismatch) {
                    input.setCustomValidity('Solo se permiten números');
                }
            }
        }
    </script>
</head>
<body>

<?php

require_once('db/User.php');
require_once('db/Disc.php');
require_once('lib/password.php');
require_once('inc/utils.php');

// define variables and set to empty values
$titleError = $producerErr = $priceErr = "";
$producer = $price = $title = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["title"])) {
        $titleError = "El título es obligatorio"; // TODO
    } else {
        $title = test_input($_POST["title"]);
        if (!preg_match("/\\w+/", $title)) {
            $titleError = "Solo ser permiten letras, número o espacios";
        }
    }
    if (empty($_POST["producer"])) {
        $producerErr = "La productora es obligatorio"; // TODO
    } else {
        $producer = test_input($_POST["producer"]);
        if (!preg_match("/\\w+/", $producer)) {
            $producerErr = "Solo ser permiten letras, número o espacios";
        }
    }
    if (empty($_POST["price"])) {
        $priceErr = "El precio es obligatorio"; // TODO
    } else {
        $price = test_input($_POST["price"]);
        if (!preg_match("/\\d+(\\.\\d{1,2})?/", $price)) {
            $priceErr = "El precio debe ser un número";
        }
    }

    $disc = new Disc(array(":titulo" => $title,
        ":productora" => $producer,
        ":precio" => $price

    ));

    if ($disc->insertDisc()) {
        $producer = $price = $title = "";
    }
}
?>

<?php header_login(); ?>

<div class="main-container">
    <main role="main" class="wrapper">
        <header class="section-title">
            <h2>Añadir Discos a EPIC</h2>
        </header>
        <section class="flex-container-form">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <fieldset>

                    <h1>Datos del disco</h1>

                    <label for="Titulo">Titulo</label>
                    <div>
                        <input id="Titulo" name="title" type="text" placeholder="Titulo" required maxlength="15"
                               size="20" pattern="^[\w\d ]*$" oninput="check(this)" oninvalid="check(this)"
                               value="<?php echo $title; ?>">
                    </div>

                    <label for="Productora">Productora</label>
                    <div>
                        <input id="Productora" name="producer" type="text" required pattern="^[\w\d ]*$"
                               oninput="check(this)" oninvalid="check(this)"
                               placeholder="Productora" value="<?php echo $producer; ?>">
                    </div>

                    <label for="Precio">Precio</label>
                    <div>
                        <input id="Precio" name="price" type="text" required oninput="check(this)"
                               oninvalid="check(this)"
                               pattern="\d+(\.\d{1,2})?"
                               value="<?php echo $price; ?>"
                               placeholder="Precio">

                    </div>

                    <!-- Button -->
                    <label for="singlebutton"></label>
                    <div>
                        <button id="singlebutton" name="singlebutton" class="btn btn-primary">Crear Disco</button>
                    </div>

                </fieldset>
            </form>
        </section>
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
