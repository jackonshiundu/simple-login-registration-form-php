<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <title>Home Page</title></head>
<body>
    <h1 class='text-center mt-5'>
        Welcome <?php echo '<span class=\'text-success\'>'.$_SESSION['username'].'</span>'?>
       To the  Home page
    </h1>
    <div class="container">
        <a href="logout.php" class='btn btn-primary mt-5'>Log Out</a>
    </div>
</body>
</html>