<?php

include('../shared/connection.php');
$studid = $_POST['userid'];
$button_pressed = $_POST['approve'];

//Clicking on the approve button
if($button_pressed == "approve"){
$insert="INSERT INTO clearance (id) values('$studid')";
mysqli_query($con,$insert) or die(mysqli_error($con));
$sql="SELECT 
		student.id, 
		student.index_no, 
		student.first_name, 
		student.last_name, 
		student.status,
		tbl_account.first_year, 
		tbl_account.second_year,
		tbl_account.third_year
		FROM student INNER JOIN tbl_account on 
		student.id=tbl_account.student_id
		WHERE tbl_account.student_id=student.id 
		GROUP BY student.id";
$q=mysqli_query($con,$sql);
$fetch=mysqli_fetch_assoc($q);
if($fetch['third_year']==0 && $fetch['id']==$studid){
$query="UPDATE clearance SET is_account_approved=0 WHERE id='$studid'";
mysqli_query($con,$query) or die(mysqli_error($con));
echo "Approval Denied:"." "."Student is owing fees";
$update="UPDATE clearance SET is_account_approved=NULL WHERE id='$studid'";
$q=mysqli_query($con,$update) or die(mysqli_error($con));
if($q)
{
    echo "run";
} else echo "cannot run"; 
}

else{ 
$query="UPDATE clearance SET is_account_approved=1 WHERE id='$studid'";
mysqli_query($con,$query) or die(mysqli_error($con));
echo "Cleared";}
}
?>
