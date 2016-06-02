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

if (!$_SESSION['is_admin']){
    die('No tienes permisos para entrar en esta página');
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
            if (input.name == "password") {
                if (input.validity.patternMismatch) {
                    input.setCustomValidity('Mejora esa contraseña (Más de 8 caracteres, mayúsculas, minúsculas, números y símbolos son obligatorios)');
                }
                else {
                    input.setCustomValidity('');
                }
            }
            else if (input.name == "name" || input.name == "lastname") {
                if (input.validity.patternMismatch) {
                    input.setCustomValidity(input.id + ' debe contener únicamente caracteres y/o espacios');
                } else {
                    input.setCustomValidity('');
                }
            } else if (input.name == "username") {
                if (input.validity.patternMismatch) {
                    input.setCustomValidity('El nombre de usuario debe contener solo carácteres y/o números.');
                } else {
                    input.setCustomValidity('');
                }
            } else if (input.name == "email") {
                if (input.validity.patternMismatch) {
                    input.setCustomValidity('El email introducido no es correcto');
                } else {
                    input.setCustomValidity('');
                }
            } else if (input.name == "dni") {
                if (input.validity.patternMismatch) {
                    input.setCustomValidity('El DNI no es correcto');
                } else {
                    input.setCustomValidity('');
                }
            } else if (input.name == "visa") {
                if (input.validity.patternMismatch) {
                    input.setCustomValidity('Solo se permiten números');
                } else {
                    input.setCustomValidity('');
                }
            } else if (input.name == "toc") {
                if (input.validity.valueMissing) {
                    input.setCustomValidity('Debes aceptar los términos y condiciones para continuar');
                } else {
                    input.setCustomValidity('');
                }
            }
        }
    </script>
</head>
<body>

<?php

require_once('db/User.php');
require_once('lib/password.php');
require_once('inc/utils.php');

// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$newsletter = $province = $gender = $producer = $password = $direction = $city = $price = $email = $comment = $dni = $titulo = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required"; // TODO
    } else {
        $titulo = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $titulo)) {
            $nameErr = "Only letters and white space allowed";
        }
    }
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }
    if (!empty($_POST["dni"])) {
        $dni = test_input($_POST["dni"]);
    }
    if (!empty($_POST["newsletter"])) {
        $newsletter = test_input($_POST["newsletter"]);
    }
    if (!empty($_POST["province"])) {
        $province = test_input($_POST["province"]);
    }
    if (!empty($_POST["lastname"])) {
        $gender = test_input($_POST["lastname"]);
    }
    if (!empty($_POST["username"])) {
        $producer = test_input($_POST["username"]);
    }
    if (!empty($_POST["password"])) {
        $password = test_input($_POST["password"]);
    }
    if (!empty($_POST["direction"])) {
        $direction = test_input($_POST["direction"]);
    }
    if (!empty($_POST["city"])) {
        $city = test_input($_POST["city"]);
    }
    if (!empty($_POST["visa"])) {
        $price = test_input($_POST["visa"]);
    }
    if (empty($_POST["comment"])) {
        $comment = "";
    } else {
        $comment = test_input($_POST["comment"]);
    }

    if (!empty($dni)) {
        $u = new User(array(":nombre" => $titulo,
            ":apellidos" => $gender,
            ":nombreUsuario" => $producer,
            ":contrasena" => password_hash($password, PASSWORD_BCRYPT, array("cost" => 10)),
            ":direccion" => $direction,
            ":email" => $email,
            ":dni" => $dni,
            ":visa" => $price,
            ":observaciones" => $comment,
            ":ciudad" => $city,
            ":provincia" => $province,
            ":newsletter" => $newsletter));

        $dniIsSet = $u->insertUser();
        $dni = "";
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
                        <input id="Titulo" name="titulo" type="text" placeholder="Titulo" required maxlength="15"
                               size="20" pattern="^[a-zA-Z ]*$" oninput="check(this)"
                               value="<?php echo $titulo; ?>">
                    </div>

                    <label for="Género">Género</label>
                    <div>
                        <input id="Género" name="gender" type="text" placeholder="Género" maxlength="20"
                               size="25" oninput="check(this)" pattern="^[a-zA-Z ]*$"
                               value="<?php echo $gender; ?>">

                    </div>

                    <label for="Precio">Precio</label>
                    <div>
                        <input id="Precio" name="price" type="text" oninput="check(this)" pattern="^\d+(\.\d{1,2})?$"
                               value="<?php echo $price; ?>"
                               placeholder="Precio">

                    </div>

                    <label for="Productora">Productora</label>
                    <div>
                        <input id="Productora" name="producer" type="text" required pattern="^[a-zA-Z0-9]*$"
                               oninput="check(this)"
                               placeholder="Productora" value="<?php echo $producer; ?>">
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
