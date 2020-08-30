<?php
session_start();
include('../shared/connection.php');
$supervisor_id = $_POST['supervisor_id'];
$button_pressed = $_POST['approve'];
$user_id=$_POST['user_id'];


switch($supervisor_id){
    case 1:
        $q="SELECT * FROM student where index_no='$user_id'";
        $query=mysqli_query($con,$q);
        $f=mysqli_fetch_assoc($query);
        if($f['pws_request']==1){
            echo "Request Already Sent";
            exit();
        }
        else{
            $update="UPDATE student SET pws_request=1 WHERE index_no='$user_id'";
            $sql=mysqli_query($con,$update);
            if($sql){
                echo "Request Sent";
            }
            else{
                echo "Request Declined";
            }
        }
        break;

    case 2:
        $q="SELECT * FROM student where index_no='$user_id'";
        $query=mysqli_query($con,$q);
        $f=mysqli_fetch_assoc($query);
        if($f['pws_request']==1){
            echo "Request Already Sent";
            exit();
        }
        else{
            $update="UPDATE student SET pws_request=1 WHERE index_no='$user_id'";
            $sql=mysqli_query($con,$update);
            if($sql){
                echo "Request Sent";
            }
            else{
                echo "Request Declined";
            }
        }
        break;

    case 3:
        $q="SELECT * FROM student where index_no='$user_id'";
        $query=mysqli_query($con,$q);
        $f=mysqli_fetch_assoc($query);
        if($f['pws_request']==1){
            echo "Request Already Sent";
            exit();
        }
        else{
            $update="UPDATE student SET pws_request=1 WHERE index_no='$user_id'";
            $sql=mysqli_query($con,$update);
            if($sql){
                echo "Request Sent";
            }
            else{
                echo "Request Declined";
            }
        }
        break;

    case 4:
        $q="SELECT * FROM student where index_no='$user_id'";
        $query=mysqli_query($con,$q);
        $f=mysqli_fetch_assoc($query);
        if($f['pws_request']==1){
            echo "Request Already Sent";
            exit();
        }
        else{
            $update="UPDATE student SET pws_request=1 WHERE index_no='$user_id'";
            $sql=mysqli_query($con,$update);
            if($sql){
                echo "Request Sent";
            }
            else{
                echo "Request Declined";
            }
        }
        break;

    case 5:
        $q="SELECT * FROM student where index_no='$user_id'";
        $query=mysqli_query($con,$q);
        $f=mysqli_fetch_assoc($query);
        if($f['pws_request']==1){
            echo "Request Already Sent";
            exit();
        }
        else{
            $update="UPDATE student SET pws_request=1 WHERE index_no='$user_id'";
            $sql=mysqli_query($con,$update);
            if($sql){
                echo "Request Sent";
            }
            else{
                echo "Request Declined";
            }
        }
        break;

    case 6:
        $q="SELECT * FROM student where index_no='$user_id'";
        $query=mysqli_query($con,$q);
        $f=mysqli_fetch_assoc($query);
        if($f['pws_request']==1){
            echo "Request Already Sent";
            exit();
        }
        else{
            $update="UPDATE student SET pws_request=1 WHERE index_no='$user_id'";
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

