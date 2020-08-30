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
		tbl_sports.item,
		tbl_sports.payment,
		tbl_sports.date_of_issue, 
		tbl_sports.date_of_return 
		FROM student INNER JOIN tbl_sports on 
		student.id=tbl_sports.student_id
		WHERE tbl_sports.student_id='$studid'";
$q=mysqli_query($con,$sql);
$fetch=mysqli_fetch_assoc($q);
if($fetch['id']==$studid && $fetch['date_of_return']==NULL){
$query="UPDATE clearance SET is_sports_approved=NULL WHERE id='$studid'";
mysqli_query($con,$query) or die(mysqli_error($con));
echo "Approval Denied:"." "."Student needs to return an item or pay an amount";
}

else{ 
$query="UPDATE clearance SET is_sports_approved=1 WHERE id='$studid'";
mysqli_query($con,$query) or die(mysqli_error($con));
echo "Cleared";}
}
?>
