<?php
session_start();
session_destroy();
header('location:supervisor_login.php');

?>