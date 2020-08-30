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
		tbl_estate.type_of_damage, 
		tbl_estate.payment,
		tbl_estate.payment_date,
		tbl_estate.date_of_action 
		FROM student INNER JOIN tbl_estate on 
		student.id=tbl_estate.student_id
		WHERE tbl_estate.student_id='$studid'";
$q=mysqli_query($con,$sql);
$fetch=mysqli_fetch_assoc($q);
if($fetch['id']==$studid && $fetch['payment']==""){
$query="UPDATE clearance SET is_estate_approved=0 WHERE id='$studid'";
mysqli_query($con,$query) or die(mysqli_error($con));
echo  "Approval Denied:"." "."Student needs to pay for damages";
}

else{ 
$query="UPDATE clearance SET is_estate_approved=1 WHERE id='$studid'";
mysqli_query($con,$query) or die(mysqli_error($con));
echo "Cleared";}
}
?>
