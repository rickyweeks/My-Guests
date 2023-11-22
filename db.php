<?php

$servername = "localhost";
$username = "rickyweeksjr";
$password = "733VIaTHjfyFT7D";
$dbname = "rickyweeksjr";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}




?>