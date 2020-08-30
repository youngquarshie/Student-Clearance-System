<?php
session_start();
include('../shared/connection.php');
$dep_id = $_POST['hod_id'];
$button_pressed = $_POST['approve'];
$user=$_POST['user_id'];


switch($dep_id){
    case 1:
        $q="SELECT * FROM student where index_no='$user'";
        $query=mysqli_query($con,$q);
        $f=mysqli_fetch_assoc($query);
        if($f['hod_request']==1){
            echo "Request Already Sent";
            exit();
        }
        else{
            $update="UPDATE student SET hod_request=1 WHERE index_no='$user'";
            $sql=mysqli_query($con,$update);
            if($sql){
                echo "Request Sent";
            }
            else{
                echo "Request Declined";
            }
        }
        break;

    default: echo "Error";
}

?>

