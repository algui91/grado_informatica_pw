<?php
define("DB_DSN", "mysql:host=localhost;dbname=db76625397" );
define("DB_USER", "x76625397" );
define("DB_PASS", "x76625397" );
define("TABLE", "Usuario" );

try {
  $conn = new PDO(DB_DSN, DB_USER, DB_PASS);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
}
catch(PDOException $e){
  echo "Connection failed: " . $e->getMessage();
}
?>
