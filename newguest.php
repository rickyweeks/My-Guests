<?php

include 'db.php';
session_start();
// echo $_POST['firstname']."<br>";
// echo $_POST['lastname']."<br>";
// echo $_POST['email']."<br>";

// insert into the database table MyGuests

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

$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('{$_POST['firstname']}', '{$_POST['lastname']}', '{$_POST['email']}')";



if (mysqli_query($conn, $sql)) {
  $_SESSION['message'] = 'guestadded';
  header("Location:index.php");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

//  redirect back to the main page with a GET variable to display success message




?>