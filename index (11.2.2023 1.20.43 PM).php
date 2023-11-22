<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Guests</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    table {
      display: block;
      overflow-x:auto;
    }
    
  </style>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">My Guests</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Page 1</a></li>
        <li><a href="#">Page 2</a></li>
        <li><a href="#">Page 3</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
</ul>
    </div>
  </div>
</nav>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>My Guests</h1>

                <?php
                if(isset($_SESSION['message'])) {

                    if($_SESSION['message'] =='guestadded') {
                echo '<div class="alert alert-success">
                <strong>Success!</strong> New guest added.
              </div>';
              unset($_SESSION['message']);
                    }}

                    if(isset($_SESSION['message'])) {
                        if($_SESSION['message'] =='guestdeleted') {
                    echo '<div class="alert alert-danger">
                    <strong>Success!</strong> Guest deleted.
                  </div>';}}

                  if(isset($_SESSION['message'])) {
                    if($_SESSION['message'] =='guestupdated') {
                echo '<div class="alert alert-info">
                <strong>Success!</strong> Guest updated.
              </div>';
                  unset($_SESSION['message']);
                        }
                }
                ?>

                <?php
                if(isset($_POST['editguest'])) {
                echo '<form action="updateguest.php" method="POST">';
                }
                echo '<form action="newguest.php" method="POST">';
                ?>



                <div class="form-group">
                <input class="form-control" type="text" name="firstname" value="<?=isset($_POST['firstname']) ? $_POST['firstname'] : ''?>" placeholder="First Name" required>
                </div>
                <div class="form-group">
                <input class="form-control" type="text" name="lastname" value="<?=isset($_POST['lastname']) ? $_POST['lastname'] : ''?>" placeholder="Last Name" required>
                </div>
                <div class="form-group">
                  <input class="form-control" type="email" name="email" value="<?=isset($_POST['email']) ? $_POST['email'] : ''?>" placeholder="Email Address" required>
                </div>
                <!-- First Name: <input type="text" name="firstname" value="Ricky" required><br>
                Last Name: <input type="text" name="lastname" value="Weeks" required><br>
                Email: <input type="email" name="email" value="ricky.d.weeks.jr@gmail.com" required><br> -->

                

            <?php
                if(isset($_POST['editguest'])) {
                  echo '<input type="hidden" name="id" value ="'.$_POST['id'].'">';
                  echo '<button type="submit" name="updateguest" class="btn btn-info">Update Guest</button>';
                }
                  
                 else {
                  echo '<button type="submit" name="addguest" class="btn btn-success">Add Guest</button>';

                }
            ?> 

                </form>

                <br><br>

                <table class="table table-hover table-striped">

                <tr>
                    <th>ID</th>
                    <th>First</th>
                    <th>Last</th>
                    <th>Email</th>
                    <th>Reg Date</th>
                    <th></th>
                    <th></th>
                </tr>





                <?php
// $servername = "localhost";
// $username = "rickyweeksjr";
// $password = "733VIaTHjfyFT7D";
// $dbname = "rickyweeksjr";
include 'db.php';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id, firstname, lastname, email, reg_date FROM MyGuests";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
?>

<tr>
    <!-- long-form -->
    <td><?php echo $row['id']; ?></td>
    <!-- short form -->
    <td><?=$row['firstname']?></td>
    <td><?=$row['lastname']?></td>
    <td><?=$row['email']?></td>
    <td><?=$row['reg_date']?>
    <td><form action="index.php" method="POST">
        <input type="hidden" name="id" value="<?=$row['id']?>">
        <input type="hidden" name="firstname" value="<?=$row['firstname']?>">
        <input type="hidden" name="lastname" value="<?=$row['lastname']?>">
        <input type="hidden" name="email" value="<?=$row['email']?>">
        <button type="submit" name="editguest" class="btn btn-xs btn-success">Edit</button>
 </form></td>

  <td><form action="deleteguest.php" method="POST">
        <input type="hidden" name="id" value="<?=$row['id']?>">
                        <button type="submit" name="deleteguest" class="btn btn-xs btn-danger">X</button>
  </form></td>


</tr>


<?php
     }


} else {
  echo "0 results";
}

mysqli_close($conn);
?>

</table>

            </div>
        </div>
    </div>
    
</body>




<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</html>

<?php 

// $hello='Hello, World!';

// echo $hello;


// echo 5+5

// $x = 1;
// $y = 10;
// $color = 'purple';

// if($x < $y) {
//     echo '<p style="color:'.$color';">Statement is true</p>';
// } else {
//     echo '<p style="color:red;">Statement is false</p>';
// }
?>