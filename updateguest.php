<?php
session_start();
include 'db.php';

$sql = "UPDATE MyGuests SET firstname='{$_POST['firstname']}', lastname='{$_POST['lastname']}', email='{$_POST['email']}' WHERE id='{$_POST['id']}'";


if (mysqli_query($conn, $sql)) {;
    $_SESSION['message'] = 'guestupdated';
    header("Location: index.php");
  
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

?>
