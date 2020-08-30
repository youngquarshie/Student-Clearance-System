<?php
include("shared/connection.php");
$item=$_POST['item'];
echo $item;

$sql="SELECT student.id,student.index_no, student.first_name, student.last_name, student.department_id,
			student.faculty_id, faculty.faculty_name, student.status, department.department_name, clearance.is_src_approved, 
			clearance.is_estate_approved, clearance.is_hod_approved, clearance.is_pws_approved, clearance.is_account_approved,
			clearance.is_sports_approved, clearance.is_library_approved, clearance.is_ceid_approved FROM
			student INNER JOIN department ON
			student.department_id=department.department_id
			INNER JOIN faculty ON student.faculty_id=faculty.faculty_id 
			INNER JOIN clearance on student.id=clearance.id WHERE student.index_no LIKE '%".$item."%'
			GROUP BY student.index_no";

$query=mysqli_query($con, $sql) or die(mysqli_error($con));
while($fetch=mysqli_fetch_array($query)){
    if($fetch['status']==1){
        $result="Cleared";
    }
    else{
        $result="Not Cleared";
    }

    echo "<table>";
    echo "<tr>";
    echo "<td>";
    echo $fetch['index_no']." ".$fetch['first_name']." ".$fetch['last_name']." ".$fetch['department_name']." ".$fetch['faculty_name']." ".$result;
    echo "</td>";
    echo "</tr>";
    echo "</table>";

}


?>