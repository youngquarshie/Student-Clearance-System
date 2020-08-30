<?php
session_start();
include('shared/connection.php');
$username=$_GET['form-username'];
$password=$_GET['form-password'];

if($username&&$password) {
    //protect mysql injection
    $username = stripcslashes($username);
    $username = mysqli_real_escape_string($con, $username);
    $username = htmlspecialchars($username);

    $password = stripcslashes($password);
    $password = mysqli_real_escape_string($con, $password);
    $password = htmlspecialchars($password);

    //Run query to database
    $sql = "SELECT * FROM designee where username='$username' AND password='$password'";
    $result = mysqli_query($con, $sql);

    //Counting number of rows
    $row = mysqli_num_rows($result);

    //Fetching User information from database
    $userinfo = mysqli_fetch_assoc($result);
    //$user_type = $userinfo['user_type'];

    if ($row) //INITIALISING SESSION WITH DIFFERENT USER ROLE
    {

        $_SESSION['designee_name']=$userinfo['designee_name'];
        $_SESSION['user_type'] = $userinfo['user_type'];

        if ($_SESSION['user_type'] == 'src') {
            echo "1";
        }
        if ($_SESSION['user_type'] == 'account') {
            echo "2";
        }
        if ($_SESSION['user_type'] == 'estate') {
            echo "3";
        }
        if ($_SESSION['user_type'] == 'librarian') {
            echo "4";
        }
        if ($_SESSION['user_type'] == 'sports') {
            echo "5";
        }
        if ($_SESSION['user_type'] == 'stud') {
            echo "6";
        }
        if ($_SESSION['user_type'] == 'ceid') {
            echo "7";
        }
    }
}
?>
