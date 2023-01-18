<?php
/* include("Conexion.php"); */
$resultado = "SELECT * FROM users";
$mysqli = new mysqli("172.16.0.6","root","*4b0g4d0s4s*","userscyc");
if ($mysqli->connect_errno) {
  echo $mysqli->connect_errno;
}
else {
  echo "Exitoso";
}
$result = $mysqli -> query("SELECT * FROM users");
if ($result) {
  $row = get_charset($result);
  echo $row[1];
}
?>