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

            if (input.name == "password") {
                if (input.validity.patternMismatch) {
                    input.setCustomValidity('Mejora esa contraseña (Más de 8 caracteres, mayúsculas, minúsculas, números y símbolos son obligatorios)');
                }
            }
            else if (input.name == "name" || input.name == "lastname") {
                if (input.validity.patternMismatch) {
                    input.setCustomValidity(input.id + ' debe contener únicamente caracteres y/o espacios');
                }
            } else if (input.name == "username") {
                if (input.validity.patternMismatch) {
                    input.setCustomValidity('El nombre de usuario debe contener solo carácteres y/o números.');
                }
            } else if (input.name == "email") {
                if (input.validity.patternMismatch) {
                    input.setCustomValidity('El email introducido no es correcto');
                }
            } else if (input.name == "dni") {
                if (input.validity.patternMismatch) {
                    input.setCustomValidity('El DNI no es correcto');
                }
            } else if (input.name == "visa") {
                if (input.validity.patternMismatch) {
                    input.setCustomValidity('Solo se permiten números');
                }
            } else if (input.name == "toc") {
                if (input.validity.valueMissing) {
                    input.setCustomValidity('Debes aceptar los términos y condiciones para continuar');
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
$newsletter = $province = $lastname = $username = $password = $direction = $city = $visa = $email = $comment = $dni = $name = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required"; // TODO
    } else {
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
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
        $lastname = test_input($_POST["lastname"]);
    }
    if (!empty($_POST["username"])) {
        $username = test_input($_POST["username"]);
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
        $visa = test_input($_POST["visa"]);
    }
    if (empty($_POST["comment"])) {
        $comment = "";
    } else {
        $comment = test_input($_POST["comment"]);
    }
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = test_input($_POST["gender"]);
    }

    if (!empty($dni)) {
        $u = new User(array(":nombre" => $name,
            ":apellidos" => $lastname,
            ":nombreUsuario" => $username,
            ":contrasena" => password_hash($password, PASSWORD_BCRYPT, array("cost" => 10)),
            ":direccion" => $direction,
            ":email" => $email,
            ":dni" => $dni,
            ":visa" => $visa,
            ":observaciones" => $comment,
            ":ciudad" => $city,
            ":provincia" => $province,
            ":newsletter" => $newsletter));

        $dniIsSet = $u->insertUser();
        $dni = "";
        if (!$dniIsSet) {
            header("Location: " . $_SERVER['REQUEST_URI']);
            exit();
        }
    }
}
?>

<?php header_login(); ?>

<div class="main-container">
    <main role="main" class="wrapper">
        <header class="section-title">
            <h2>Formulario de suscripción</h2>
        </header>
        <section class="flex-container-form">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <fieldset>

                    <!-- Form Name -->
                    <h1>Suscripción</h1>

                    <label for="Nombre">Nombre</label>
                    <div>
                        <input id="Nombre" name="name" type="text" placeholder="Nombre" required maxlength="15"
                               size="20" pattern="^[a-zA-Z ]*$" oninput="check(this)" oninvalid="check(this)"
                               value="<?php echo $name; ?>">
                    </div>

                    <!-- Text input-->
                    <label for="Apellidos">Apellidos</label>
                    <div>
                        <input id="Apellidos" name="lastname" type="text" placeholder="Apellido" maxlength="20"
                               size="25" oninput="check(this)" pattern="^[a-zA-Z ]*$"
                               value="<?php echo $lastname; ?>">

                    </div>

                    <!-- Password input-->
                    <label for="Nombre Usuario">Nombre Usuario</label>
                    <div>
                        <input id="Nombre Usuario" name="username" type="text" required pattern="[a-zA-Z0-9_]*"
                               oninput="check(this)" oninvalid="check(this)"
                               placeholder="Nombre Usuario" value="<?php echo $username; ?>">
                    </div>

                    <!-- Password input-->
                    <label for="Clave">Clave</label>
                    <div>
                        <input id="Clave" name="password" type="password" placeholder="Contraseña" required
                               oninput="check(this)" oninvalid="check(this)"
                               pattern="^(?=.*[A-Z].*[A-Z])(?=.*[!@#$&*])(?=.*[0-9].*[0-9])(?=.*[a-z].*[a-z].*[a-z]).{8,}$"
                               value="<?php echo $password; ?>">

                    </div>

                    <!-- Text input-->
                    <label for="Dirección Postal">Dirección Postal</label>
                    <div>
                        <input id="Dirección Postal" name="direction" type="text" maxlength="40" size="50"
                               placeholder="Dirección postal" value="<?php echo $direction; ?>">

                    </div>

                    <label for="Ciudad">Ciudad</label>
                    <div>
                        <input id="Ciudad" name="city" type="text" maxlength="10" size="15"
                               placeholder="Ciudad" value="<?php echo $city; ?>">

                    </div>

                    <!-- Select Basic -->
                    <label for="Provicia">Provicia</label>
                    <div>
                        <select id="Provicia" name="province">
                            <option <?php if (isset($province) && $province == 1) echo "selected"; ?> value="1">
                                Granada
                            </option>
                            <option <?php if (isset($province) && $province == 2) echo "selected"; ?> value="2">
                                Almeria
                            </option>
                            <option <?php if (isset($province) && $province == 3) echo "selected"; ?> value="3">
                                Huelva
                            </option>
                            <option <?php if (isset($province) && $province == 4) echo "selected"; ?> value="4">
                                Sevilla
                            </option>
                            <option <?php if (isset($province) && $province == 5) echo "selected"; ?> value="5">
                                Cádiz
                            </option>
                            <option <?php if (isset($province) && $province == 6) echo "selected"; ?> value="6">
                                Malaga
                            </option>
                        </select>
                    </div>
                    <!-- Text input-->
                    <label for="email">Email</label>
                    <div>
                        <input id="email" name="email" type="text" value="<?php echo $email; ?>" required
                               oninput="check(this)" oninvalid="check(this)"
                               placeholder="Email" maxlength="30" size="25"
                               pattern="^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$">

                    </div>

                    <!-- Text input-->
                    <label for="DNI">DNI</label>
                    <div>
                        <input id="DNI" name="dni" type="text" value="<?php echo $dni; ?>"
                               placeholder="DNI" required oninput="check(this)" oninvalid="check(this)" size="9"
                               maxlength="9"
                               pattern="^\d{8}[a-zA-Z]$">
                        <?php if (isset($dniIsSet) && $dniIsSet == true) echo "* Este DNI ya está dado de alta" ?>
                    </div>

                    <!-- Text input-->
                    <label for="VISA">VISA</label>
                    <div>
                        <input id="VISA" name="visa" type="text" oninput="check(this)" pattern="[0-9]*"
                               value="<?php echo $visa; ?>"
                               placeholder="VISA">

                    </div>

                    <!-- Textarea -->
                    <label for="Observaciones">Observaciones</label>
                    <div>
                            <textarea id="Observaciones" maxlength="500"
                                      name="comment"><?php echo $comment; ?></textarea>
                    </div>

                    <!-- Multiple Radios (inline) -->
                    <label for="newsletter">Envio</label>
                    <div>
                        <label for="Envío-0">
                            <input type="radio" name="newsletter"
                                   id="Envío-0" <?php if (isset($newsletter) && $newsletter == "1") echo "checked"; ?>
                                   value="1">
                            Mensual
                        </label>
                        <label for="Envío-1">
                            <input type="radio" name="newsletter"
                                   id="Envío-1" <?php if (isset($newsletter) && $newsletter == "2") echo "checked"; ?>
                                   value="2">
                            Semanal
                        </label>
                        <label for="Envío-2">
                            <input type="radio" name="newsletter"
                                   id="Envío-2" <?php if (isset($newsletter) && $newsletter == "3") echo "checked"; ?>
                                   value="3">
                            Diario
                        </label>
                    </div>

                    <!-- Multiple Checkboxes -->
                    <label for="toc">TOS</label>
                    <div>
                        <div>
                            <label for="toc-0">
                                <input type="checkbox" oninvalid="check(this)" onclick="this.setCustomValidity('')"
                                       name="toc" id="toc-0" required>
                                He leido y acepto las condiciones
                            </label>
                        </div>
                    </div>

                    <!-- Button -->
                    <label for="singlebutton"></label>
                    <div>
                        <button id="singlebutton" name="singlebutton" class="btn btn-primary">Enviar</button>
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
