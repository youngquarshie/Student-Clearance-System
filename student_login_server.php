<?php
session_start();
$index_no=$_GET['form-username'];
$password=$_GET['form-password'];


if($index_no&&$password){
	$connect=mysqli_connect("localhost", "root", "") or die ("Could not connect to the server");
	mysqli_select_db($connect,"clearance") or die("Couldnt connect to the database");
	$query=mysqli_query($connect,"SELECT * FROM student WHERE index_no='$index_no'
	and password='$password'");
	$row=mysqli_fetch_assoc($query);
	if($row)
{
			$_SESSION['id']=$row['id'];
			$_SESSION['index_no']=$row['index_no'];
			$_SESSION['first_name']=$row['first_name'];
			$_SESSION['last_name']=$row['last_name'];
			$_SESSION['email']=$row['email'];
			$d="SELECT student.index_no, student.department_id, department.department_name FROM
			student INNER JOIN department ON
			student.department_id=department.department_id WHERE student.index_no='$index_no'";
			$department=mysqli_query($connect, $d);
			$row=mysqli_fetch_assoc($department);
			$_SESSION['department']=$row['department_name'];
			$f="SELECT student.index_no, student.faculty_id, faculty.faculty_name FROM student
			INNER JOIN faculty ON student.faculty_id=faculty.faculty_id
			WHERE student.index_no='$index_no'";
			$faculty=mysqli_query($connect, $f);
			$row=mysqli_fetch_assoc($faculty);
			$_SESSION['faculty']=$row['faculty_name'];
			//header('location:request_dashboard.php');
			echo "1";
			exit;
			
}
		else {
			//header('location:studentlogin.php?failed=failed');
			//echo "Wrong username or password";
			echo "0";
			exit;
		}
	
}



?>