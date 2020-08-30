<?php
session_start();
include('shared/connection.php');

$username=$_GET['form-username'];
$password=$_GET['form-password'];


if($username&&$password) {

    $query = mysqli_query($con, "SELECT * FROM tbl_supervisors WHERE 
    username='$username' 
    and password='$password'");
    $row = mysqli_fetch_assoc($query);
    if ($row) {
        $_SESSION['supervisor_name'] = $row['supervisor_name'];
        //header('Location:admindashboard.php');
        echo "1";
        exit();
    } else {
        echo "0";
        exit();
    }
}

?>