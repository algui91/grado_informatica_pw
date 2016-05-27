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
 * Date: 5/25/16
 * Time: 11:34 AM
 */
require_once('config.php');

abstract class DataObject
{
    protected $datos = array();

    public function __construct($datos = null)
    {
        if ($datos != null) {
            foreach ($datos as $clave => $valor)
                if (array_key_exists($clave, $this->datos)) $this->datos[$clave] = $valor;
        }
    }

    protected static function conectar()
    {
        try {
            $conexion = new PDO(DB_DSN, DB_USER, DB_PASS);
            $conexion->setAttribute(PDO::ATTR_PERSISTENT, true);
            $conexion->setAttribute(PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Conexión fallida: " . $e->getMessage());
        }
        return $conexion;
    }

    protected static function desconectar($conexion)
    {
        $conexion = "";
    }

    public function devolverValor($campo)
    {
        if (array_key_exists($campo, $this->datos)) {
            return $this->datos[$campo];
        } else die("Campo no encontrado");
    }
}

?>