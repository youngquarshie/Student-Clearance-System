<?php
   $hostname='localhost';
$user = 'root';
$password = '';
$mysql_database = 'clearance';
$con = mysqli_connect($hostname, $user, $password);
mysqli_select_db($con,"clearance");
    ?>