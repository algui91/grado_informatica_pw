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

require_once("inc/utils.php");
require_once('db/User.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = new User(array(":nombreUsuario" => test_input($_POST["username"])));
    var_dump($user->getUser());

//    if (password_verify(test_input($_POST["password"]), $hash)) {
//        /* Valid */
//    } else {
//        /* Invalid */
//    }
}
?>
