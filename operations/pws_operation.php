<?php

include('../shared/connection.php');
$studid = $_POST['userid'];
$button_pressed = $_POST['approve'];

//Clicking on the approve button
if($button_pressed == "approve"){
$insert="INSERT INTO clearance (id) values('$studid')";
mysqli_query($con,$insert) or die(mysqli_error($con));
$query="UPDATE clearance SET is_pws_approved=1 WHERE id='$studid'";
mysqli_query($con,$query) or die(mysqli_error($con));
echo "Cleared";
}
?>
