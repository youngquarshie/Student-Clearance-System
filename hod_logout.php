<?php
session_start();
session_destroy();
header('location:hod_login.php');

?>