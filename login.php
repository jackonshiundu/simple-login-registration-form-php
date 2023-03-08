<?php

$login=0;
$invalid=0;
  if($_SERVER['REQUEST_METHOD']=='POST'){
    function test_input($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }
    include 'connectDb.php';
    $username=test_input($_POST['username']);
    $password=test_input($_POST['password']);


    $sql="select * from `registration` where username='$username' and password='$password'";
   $result=mysqli_query($con,$sql);
   if($result){
    $num =mysqli_num_rows($result);
    if($num>0){
        $login=1;
        session_start();
        $_SESSION['username']=$username;
        header('location:home.php');
    }else{
        $invalid=1;
   }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <title>login Page</title>
</head>
<body>
<?php
        if($invalid){
            echo '<div class="alert alert-danger aler-dismissible fade show">
            <strong>Sorry!</strong>
            Wrong Username or password
            <button type=\'close\' class=\'close\' data-dismiss=\'alert\' aria-label=\'close\'>
                <span aria-hidden=\'true\'>&times;</span>
            </button>
        </div>';
        }
        if($login){
            echo '<div class="alert alert-success aler-dismissible fade show">
            <strong>Yeah!</strong>
            Logged in succesfully
            <button type=\'close\' class=\'close\' data-dismiss=\'alert\' aria-label=\'close\'>
                <span aria-hidden=\'true\'>&times;</span>
            </button>
        </div>';
        }
        ?>
    <div class='container mt-5'>
        <h1 class='text-center'>Log in Here</h1>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method='post'>
            <div class="form-group">
                <label for="username">Name</label>
                <input name='username' type="text" class='form-control'>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input name='password' type="text" class='form-control'>
            </div>
            <button class="btn btn-primary">Log in</button>
        </form>
    </div>

<script src="./bootsrap/js/bootstrap.min.js"></script>
</body>
</html>