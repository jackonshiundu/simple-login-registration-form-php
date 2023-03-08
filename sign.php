<?php

$seccess=0;
$user=0;
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


    $sql="select * from `registration` where username='$username'";
   $result=mysqli_query($con,$sql);
   if($result){
    $num =mysqli_num_rows($result);
    if($num>0){
       //echo 'User Already Exists';
       $user=1;
    }else{
        $sql="insert into registration (username,password) values('$username','$password')";
        $result=mysqli_query($con,$sql);

        if($result){
            //echo 'Signup Successfully';
            $seccess=1;
            header('location:login.php');
        }else{
            die(mysqli_errno($con));
        }
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
    <title>Document</title>
</head>
<body>
        <?php
        if($user){
            echo '<div class="alert alert-danger aler-dismissible fade show">
            <strong>Sorry!</strong>
            User already exists
            <button type=\'close\' class=\'close\' data-dismiss=\'alert\' aria-label=\'close\'>
                <span aria-hidden=\'true\'>&times;</span>
            </button>
        </div>';
        }
        if($seccess){
            echo '<div class="alert alert-success aler-dismissible fade show">
            <strong>Yeah!</strong>
            Signed in succesfully
            <button type=\'close\' class=\'close\' data-dismiss=\'alert\' aria-label=\'close\'>
                <span aria-hidden=\'true\'>&times;</span>
            </button>
        </div>';
        }
        ?>
    <div class='container mt-5'>
        <h1 class='text-center'>Sign Up Here</h1>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method='post'>
            <div class="form-group">
                <label for="username">Name</label>
                <input name='username' type="text" class='form-control'>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input name='password' type="text" class='form-control'>
            </div>
            <button class="btn btn-primary">Sign Up</button>
        </form>
    </div>









<script src="./bootsrap/js/bootstrap.min.js"></script>
</body>
</html>