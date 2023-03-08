<?php


     $dbname='sign_up_forms';
     $servername='localhost';
     $username='root';
     $password='';
    //class constructor

    $con=mysqli_connect($servername,$username,$password,$dbname,);
    if($con){
    }else{
        die (mysqli_errno($con));
    }


?>