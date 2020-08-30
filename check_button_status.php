<?php 
include("shared/connection.php");
$user= $_POST['user'];
//echo $user;
$sql="SELECT * FROM student where id='$user'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
if($row['src_request']==1){
	echo "1";
}
else echo "2";
?>