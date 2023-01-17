<?php
$servername = "localhost";
$database = "Pruebas";
$username = "root";
$password = "Xy5t3m452023+-";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
mysqli_close($conn);