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

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

function login_form()
{
    session_start();
    if (isset($_SESSION['logged_user'])) {
        ?>
        <div class="header-container">
            <header class="wrapper">
                <h1 class="title"><a href="/~x76625397/tiendamusicaII/"> La tienda de música
                        de <?php echo $_SESSION['logged_user']; ?></a></h1>
                <section id="login-container">
                    <form action="login.php" method="post">
                        <button name="logout">Log out</button>
                        <input type="hidden" name="logout" value="logout">
                    </form>
                </section>
            </header>
        </div>
        <?php

    } else {
        ?>
        <div class="header-container">
            <header class="wrapper">
                <h1 class="title"><a href="index.php"> Mi Tienda de Música </a></h1>
                <section id="login-container">
                    <form action="login.php" method="post">
                        <input type="text" name="username" value="" placeholder="Username">
                        <input type="password" name="password" placeholder="Password">
                        <button name="singlebutton"> Login</button>
                    </form>
                    <?php if (isset($_SESSION['incorrect_password'])) echo $_SESSION['incorrect_password']; ?>
                </section>
            </header>
        </div>
        <?php
    }
    ?>
    <?php
}
