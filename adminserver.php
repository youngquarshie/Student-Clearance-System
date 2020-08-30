<?php
session_start();
include('shared/connection.php');

    $username=$_GET['form-username'];
    $password=$_GET['form-password'];


if($username&&$password) {

    $query = mysqli_query($con, "SELECT * FROM admin WHERE 
    admin_username='$username' 
    and admin_password='$password'");
    $row = mysqli_fetch_assoc($query);
    if ($row) {
        $_SESSION['admin_username'] = $row['admin_username'];
        //header('Location:admindashboard.php');
        echo "1";
        exit();
    } else {
        echo "0";
        exit();
    }
}

?>