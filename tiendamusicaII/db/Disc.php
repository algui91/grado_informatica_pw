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
 * Date: 5/27/16
 * Time: 1:16 PM
 */
class Disc extends DataObject
{
    protected $datos = array(
        ":id" => "",
        ":titulo" => "",
        ":genero" => "",
        ":precio" => "",
        ":productora" => "",
        ":valoracion" => "",
    );

    public function insertDisc()
    {
        $connection = parent::conectar();
        $sql = 'INSERT INTO ' . DISC_TABLE . ' 
            (id, titulo, genero, precio, productora, valoracion)
            VALUES (:id, :titulo, :genero, :precio, :productora, :valoracion)';
        try {
            $st = $connection->prepare($sql);
            $result = $st->execute($this->datos);
        } catch (PDOException $e) {
            die("Consulta fallida: " . $e->getMessage());
        }
        parent::desconectar($connection);

        return $result;
    }

    public function getAllDiscs()
    {
        $connection = parent::conectar();
        $sql = "SELECT * FROM " . DISC_TABLE . " ORDER BY valoracion DESC";

        try {
            $stmt = $connection->prepare($sql);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}