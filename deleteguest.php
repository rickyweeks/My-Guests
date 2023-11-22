<?php
session_start();
include 'db.php';


// echo "We are deleting ID:".$_POST['id'];

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

// sql to delete a record
$sql = "DELETE FROM MyGuests WHERE id='{$_POST['id']}'";

if (mysqli_query($conn, $sql)) {
  $_SESSION['message'] = 'guestdeleted';
  header("Location: index.php");
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);

?>

