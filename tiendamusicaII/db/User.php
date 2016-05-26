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

require_once('DataObject.php');

/**
 * Created by IntelliJ IDEA.
 * User: hkr
 * Date: 5/25/16
 * Time: 11:27 AM
 */
class User extends DataObject
{
    protected $datos = array(
        ":nombre" => "",
        ":apellidos" => "",
        ":nombreUsuario" => "",
        ":contrasena" => "",
        ":direccion" => "",
        ":provincia" => "",
        ":email" => "",
        ":dni" => "",
        ":visa" => "",
        ":observaciones" => "",
        ":ciudad" => "",
        ":newsletter" => "",
    );

    public function insertUser()
    {
        $r = false;
        $connection = parent::conectar();
        $sql = 'INSERT INTO ' . USER_TABLE . ' 
            (nombre, apellidos, nombreUsuario, contrasena, direccion, provincia, email, dni, visa, observaciones, ciudad, envio)
            VALUES (:nombre, :apellidos, :nombreUsuario, :contrasena, :direccion, :provincia, :email, :dni, :visa, :observaciones, :ciudad, :newsletter)';
        try {
            $st = $connection->prepare($sql);
            $st->execute($this->datos);
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                $r = true;
            } else {
                die("Consulta fallida: " . $e->getMessage());
            }
        }
        parent::desconectar($connection);

        return $r;
    }

    public function getUser()
    {
        $connection = parent::conectar();
        $sql = "SELECT nombreUsuario, contrasena FROM " . USER_TABLE . ' WHERE nombreUsuario = :username';
        $result = false;

        try {
            $st = $connection->prepare($sql);
            $st->bindValue(":username", $this->datos[":nombreUsuario"]);
            $st->execute();
            $st->setFetchMode(PDO::FETCH_ASSOC);
            $result = $st->fetch();
        } catch (PDOException $e) {
            die("Consulta fallida: " . $e->getMessage());
        }

        return $result;
    }
}

?>