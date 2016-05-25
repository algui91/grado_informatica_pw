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

<div class="header-container">
    <header class="wrapper">
        <h1 class="title"><a href="index.html">Mi Tienda de Música</a></h1>
        <section id="login-container">
            <form action="index.html" method="post">
                <input type"text" name="username" value="" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <button name="singlebutton">Login</button>
            </form>
        </section>
    </header>

</div>

<div class="main-container">

    <?php

    require_once('config.php');

    // define variables and set to empty values
    $nameErr = $emailErr = $genderErr = $websiteErr = "";
    $name = $email = $gender = $comment = $website = "HOLA";

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

        if (empty($_POST["website"])) {
            $website = "";
        } else {
            $website = test_input($_POST["website"]);
            // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
                $websiteErr = "Invalid URL";
            }
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

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    ?>

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
                                   class="form-control input-md">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Apellidos">Apellidos</label>
                        <div class="col-md-4">
                            <input id="Apellidos" name="Apellidos" type="text" placeholder="Apellidos"
                                   class="form-control input-md">

                        </div>
                    </div>

                    <!-- Password input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Nombre Usuario">Nombre Usuario</label>
                        <div class="col-md-4">
                            <input id="Nombre Usuario" name="Nombre Usuario" type="password"
                                   placeholder="Nombre Usuario" class="form-control input-md">

                        </div>
                    </div>

                    <!-- Password input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Clave">Clave</label>
                        <div class="col-md-4">
                            <input id="Clave" name="Clave" type="password" placeholder="Clave"
                                   class="form-control input-md">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Dirección Postal">Dirección Postal</label>
                        <div class="col-md-4">
                            <input id="Dirección Postal" name="Dirección Postal" type="text"
                                   placeholder="Dirección Postal" class="form-control input-md">

                        </div>
                    </div>

                    <!-- Select Basic -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Provicia">Provicia</label>
                        <div class="col-md-4">
                            <select id="Provicia" name="Provicia" class="form-control">
                                <option value="1">Granada</option>
                                <option value="2">Almeria</option>
                                <option value="3">Huelva</option>
                                <option value="4">Sevilla</option>
                                <option value="5">Cádiz</option>
                                <option value="6">Malaga</option>
                            </select>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="email">email</label>
                        <div class="col-md-4">
                            <input id="email" name="email" type="text" placeholder="email"
                                   class="form-control input-md">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="DNI">DNI</label>
                        <div class="col-md-4">
                            <input id="DNI" name="DNI" type="text" placeholder="DNI" class="form-control input-md">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="VISA">VISA</label>
                        <div class="col-md-4">
                            <input id="VISA" name="VISA" type="text" placeholder="VISA" class="form-control input-md">

                        </div>
                    </div>

                    <!-- Textarea -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Observaciones">Observaciones</label>
                        <div class="col-md-4">
                            <textarea class="form-control" id="Observaciones"
                                      name="Observaciones">Observaciones</textarea>
                        </div>
                    </div>

                    <!-- Multiple Radios (inline) -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Envío">Envio</label>
                        <div class="col-md-4">
                            <label class="radio-inline" for="Envío-0">
                                <input type="radio" name="Envío" id="Envío-0" value="1" checked="checked">
                                Mensual
                            </label>
                            <label class="radio-inline" for="Envío-1">
                                <input type="radio" name="Envío" id="Envío-1" value="2">
                                Semanal
                            </label>
                            <label class="radio-inline" for="Envío-2">
                                <input type="radio" name="Envío" id="Envío-2" value="3">
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
