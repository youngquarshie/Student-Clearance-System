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
		tbl_library.book_title, 
		tbl_library.date_of_issue,
		tbl_library.date_of_return
		FROM student INNER JOIN tbl_library on 
		student.id=tbl_library.student_id
		WHERE tbl_library.student_id=student.id 
		GROUP BY student.id";
$q=mysqli_query($con,$sql);
$fetch=mysqli_fetch_assoc($q);
if($fetch['date_of_return']=="" && $fetch['id']==$studid){
$query="UPDATE clearance SET is_library_approved=0 WHERE id='$studid'";
mysqli_query($con,$query) or die(mysqli_error($con));
echo "Approval Denied".""."Student in possession of a book";
}

else{ 
$query="UPDATE clearance SET is_library_approved=1 WHERE id='$studid'";
mysqli_query($con,$query) or die(mysqli_error($con));
echo "Cleared";}
}
?>