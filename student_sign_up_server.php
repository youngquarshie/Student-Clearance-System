
<?php
session_start();
    include('shared/connection.php');
    $first_name = $_POST['first_name'];
    $last_name= $_POST['last_name'];
    $index_raw= $_POST['index_no'];
    $index_no = strtoupper($index_raw);
    $email=$_POST['email'];
    $password =  $_POST['password'];
    $cpassword=$_POST['password'];

    if($password==$cpassword){
    
    $query=mysqli_query($con, "INSERT INTO student(first_name, last_name, email, index_no, password)VALUES('$first_name', '$last_name', '$email', '$index_no','$password')");

    }
    if($query){
    echo "<script type='text/javascript'>alert('Registered!');</script>";
    header("location:studentlogin.php?remarks=success");
    exit();
    }
    else{
         echo "<script type='text/javascript'>alert('User Name Or Password Invalid!');</script>";
        header("location:signup.php?remarks=success");
        exit();
    }
    ?>