<?php
session_start();
include('../shared/connection.php');
$designee_id = $_POST['designee_id'];
$button_pressed = $_POST['approve'];
$userid=$_POST['userid'];
//echo $button_pressed;


switch($designee_id){
case 3:
$q="SELECT * FROM student where index_no='$userid'";
$query=mysqli_query($con,$q);
$f=mysqli_fetch_assoc($query);
if($f['library_request']==1){
	echo "Request Already Sent";
	exit();
}
else{
$update="UPDATE student SET library_request=1 WHERE index_no='$userid'";
$sql=mysqli_query($con,$update);
if($sql){
echo "Request Sent";
}
else{
echo "Request Not Sent";
}
}
break;

case 4:
$q="SELECT * FROM student where index_no='$userid'";
$query=mysqli_query($con,$q);
$f=mysqli_fetch_assoc($query);
if($f['src_request']==1){
	echo "Request Already Sent";
	exit();
}
else{
$update="UPDATE student SET src_request=1 WHERE index_no='$userid'";
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
$q="SELECT * FROM student where index_no='$userid'";
$query=mysqli_query($con,$q);
$f=mysqli_fetch_assoc($query);
if($f['estate_request']==1){
	echo "Request Already Sent";
	exit();
}
else{
$update="UPDATE student SET estate_request=1 WHERE index_no='$userid'";
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
$q="SELECT * FROM student where index_no='$userid'";
$query=mysqli_query($con,$q);
$f=mysqli_fetch_assoc($query);
if($f['pws_request']==1){
	echo "Request Already Sent";
	exit();
}
else{
$update="UPDATE student SET pws_request=1 WHERE index_no='$userid'";
$sql=mysqli_query($con,$update);
if($sql){
echo "Request Sent";
}
else{
echo "Request Declined";
}
}
break;

case 7:
$q="SELECT * FROM student where index_no='$userid'";
$query=mysqli_query($con,$q);
$f=mysqli_fetch_assoc($query);
if($f['account_request']==1){
	echo "Request Already Sent";
	exit();
}
else{
$update="UPDATE student SET account_request=1 WHERE index_no='$userid'";
$sql=mysqli_query($con,$update);
if($sql){
echo "Request Sent";
}
else{
echo "Request Declined";
}
}
break;

case 8:
$q="SELECT * FROM student where index_no='$userid'";
$query=mysqli_query($con,$q);
$f=mysqli_fetch_assoc($query);
if($f['hod_request']==1){
	echo "Request Already Sent";
	exit();
}
else{
$update="UPDATE student SET hod_request=1 WHERE index_no='$userid'";
$sql=mysqli_query($con,$update);
if($sql){
echo "Request Sent";
}
else{
echo "Request Declined";
}
}
break;

case 9:
$q="SELECT * FROM student where index_no='$userid'";
$query=mysqli_query($con,$q);
$f=mysqli_fetch_assoc($query);
if($f['sports_request']==1){
	echo "Request Already Sent";
	exit();
}
else{
$update="UPDATE student SET sports_request=1 WHERE index_no='$userid'";
$sql=mysqli_query($con,$update);
if($sql){
echo "Request Sent";
}
else{
echo "Request Declined";
}
}
break;

case 10:
	$q="SELECT * FROM student where index_no='$userid'";
	$query=mysqli_query($con,$q);
        $f=mysqli_fetch_assoc($query);
        if($f['ceid_request']==1){
            echo "Request Already Sent";
            exit();
        }
        else{
            $update="UPDATE student SET ceid_request=1 WHERE index_no='$userid'";
            $sql=mysqli_query($con,$update);
            if($sql){
                echo "Request Sent";
            }
            else{
                echo "Request Declined";
            }
        }
        break;

    case 11:
        $q="SELECT * FROM student where index_no='$userid'";
        $query=mysqli_query($con,$q);
        $f=mysqli_fetch_assoc($query);
        if($f['student_service_request']==1){
            echo "Request Already Sent";
            exit();
        }
        else{
            $update="UPDATE student SET student_service_request=1 WHERE index_no='$userid'";
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

