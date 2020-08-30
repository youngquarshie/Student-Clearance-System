<?php
session_start();
include('shared/connection.php');

$username=$_GET['form-username'];
$password=$_GET['form-password'];


if($username&&$password) {

    $query = mysqli_query($con, "SELECT * FROM tbl_hod WHERE 
    username='$username' 
    and password='$password'") or die(mysqli_query($con));
    $row = mysqli_fetch_assoc($query);
    if ($row) {
        $_SESSION['name_of_hod'] = $row['name_of_hod'];
        //header('Location:admindashboard.php');
        echo "1";
        exit();
    } else {
        echo "0";
        exit();
    }
}

?>