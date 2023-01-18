<?php
$servername = "172.16.0.6";
$database = "userscyc";
$username = "mis";
$password = "cAvLGxcKB5LXnZPy";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

mysqli_close($conn);