<?php
include("shared/connection.php");
$index_no=htmlspecialchars($_POST["index_no"]);
$fname=htmlspecialchars($_POST["fname"]);
$lname=htmlspecialchars($_POST["lname"]);
$session_type=htmlspecialchars($_POST["session_type"]);
$completion=$_POST["completion"];
$department=$_POST["department"];
$faculty=$_POST["faculty"];
$supervisor=$_POST["supervisor"];
$email=htmlspecialchars($_POST["email"]);
$password=htmlspecialchars($_POST["password"]);

$numbers="1234567890";
$length=strlen($password);
if(intval($fname)|| intval($lname) || empty($fname) || empty($lname)){
    echo "Either the firstname or last name contain numbers";
    exit();

}
if($length>12 || empty($password)){
    echo "password field must have a maximum of 12 characters";
    exit();
}
else{
    $s=mysqli_query($con,"SELECT * FROM student where index_no='$index_no'");
    $fet=mysqli_fetch_assoc($s);
    if($fet){
        echo "2";
    }
    elseif(!$fet){
        $sql="INSERT into student(index_no, first_name, last_name, session_type, year_of_completion, department_id,
        faculty_id, supervisor_id, email, password)
      values ('$index_no','$fname','$lname','$session_type','$completion','$department','$faculty','$supervisor',
      '$email', '$password')";
        $query=mysqli_query($con, $sql) or die(mysqli_error($con));
        if($query){
            echo "3";
        }
    }
}


?>