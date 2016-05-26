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

require_once('db/User.php');
require_once('lib/password.php');
require_once('inc/utils.php');

// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$newsletter = $province = $lastname = $username = $password = $direction = $city = $visa = $email = $comment = $dni = $name = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
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
}

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
?>

<?php login_form(); ?>

<div class="main-container">
    <main role="main" class="wrapper">
        <header class="section-title">
            <h2>Formulario de suscripción</h2>
        </header>
        <section class="flex-container-form">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form-horizontal">
                <fieldset>

                    <!-- Form Name -->
                    <h1>Suscripción</h1>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Nombre">Nombre</label>
                        <div class="col-md-4">
                            <input id="Nombre" name="name" type="text" placeholder="Nombre"
                                   value="<?php echo $name; ?>"
                                   class="form-control input-md">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Apellidos">Apellidos</label>
                        <div class="col-md-4">
                            <input id="Apellidos" name="lastname" type="text" placeholder="Apellido"
                                   value="<?php echo $lastname; ?>"
                                   class="form-control input-md">

                        </div>
                    </div>

                    <!-- Password input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Nombre Usuario">Nombre Usuario</label>
                        <div class="col-md-4">
                            <input id="Nombre Usuario" name="username" type="text"
                                   placeholder="Nombre Usuario" value="<?php echo $username; ?>"
                                   class="form-control input-md">

                        </div>
                    </div>

                    <!-- Password input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Clave">Clave</label>
                        <div class="col-md-4">
                            <input id="Clave" name="password" type="password" placeholder="Contraseña"
                                   value="<?php echo $password; ?>"
                                   class="form-control input-md">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Dirección Postal">Dirección Postal</label>
                        <div class="col-md-4">
                            <input id="Dirección Postal" name="direction" type="text"
                                   placeholder="Dirección postal" value="<?php echo $direction; ?>"
                                   class="form-control input-md">

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Ciudad">Ciudad</label>
                        <div class="col-md-4">
                            <input id="Ciudad" name="city" type="text"
                                   placeholder="Ciudad" value="<?php echo $city; ?>"
                                   class="form-control input-md">

                        </div>
                    </div>

                    <!-- Select Basic -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Provicia">Provicia</label>
                        <div class="col-md-4">
                            <select id="Provicia" name="province" class="form-control">
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
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="email">email</label>
                        <div class="col-md-4">
                            <input id="email" name="email" type="text" value="<?php echo $email; ?>"
                                   placeholder="Email"
                                   class="form-control input-md">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="DNI">DNI</label>
                        <div class="col-md-4">
                            <input id="DNI" name="dni" type="text" value="<?php echo $dni; ?>"
                                   placeholder="DNI"
                                   class="form-control input-md">
                            <?php if ($dniIsSet == true) echo "* Este DNI ya está dado de alta" ?>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="VISA">VISA</label>
                        <div class="col-md-4">
                            <input id="VISA" name="visa" type="text" value="<?php echo $visa; ?>"
                                   placeholder="VISA"
                                   class="form-control input-md">

                        </div>
                    </div>

                    <!-- Textarea -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Observaciones">Observaciones</label>
                        <div class="col-md-4">
                            <textarea class="form-control" id="Observaciones"
                                      name="comment"><?php echo $comment; ?></textarea>
                        </div>
                    </div>

                    <!-- Multiple Radios (inline) -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="newsletter">Envio</label>
                        <div class="col-md-4">
                            <?php var_dump($newsletter); var_dump($province);?>
                            <label class="radio-inline" for="Envío-0">
                                <input type="radio" name="newsletter" id="Envío-0" <?php if (isset($newsletter) && $newsletter == "1") echo "checked"; ?> value="1" >
                                Mensual
                            </label>
                            <label class="radio-inline" for="Envío-1">
                                <input type="radio" name="newsletter" id="Envío-1" <?php if (isset($newsletter) && $newsletter == "2") echo "checked"; ?> value="2">
                                Semanal
                            </label>
                            <label class="radio-inline" for="Envío-2">
                                <input type="radio" name="newsletter" id="Envío-2" <?php if (isset($newsletter) && $newsletter == "3") echo "checked"; ?> value="3">
                                Diario
                            </label>
                        </div>
                    </div>

                    <!-- Multiple Checkboxes -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="toc">TOS</label>
                        <div class="col-md-4">
                            <div class="checkbox">
                                <label for="toc-0">
                                    <input type="checkbox" name="toc" id="toc-0" value="1">
                                    He leido y acepto las condiciones
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="singlebutton"></label>
                        <div class="col-md-4">
                            <button id="singlebutton" name="singlebutton" class="btn btn-primary">Enviar</button>
                        </div>
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
