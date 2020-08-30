<?php
session_start();

// initializing variables
$index_no = "";
$first_name="";
$last_name="";
$email    = "";
$password_1 = "";
$password_1 = "";
$errors = array(); 

// connect to the database
include('shared/connection.php');

// REGISTER USER
if (isset($_POST['sign_up'])) {
  // receive all input values from the form
  $index_no = mysqli_real_escape_string($con, $_POST['index_no']);
  $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
  $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $password_1 = mysqli_real_escape_string($con, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($con, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($index_no)) { array_push($errors, "Index Number is required"); }
  if (empty($first_name)) { array_push($errors, "First Name is required"); }
  if (empty($last_name)) { array_push($errors, "Last Name is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM student WHERE index_no='$index_no' OR email='$email' LIMIT 1";
  $result = mysqli_query($con, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['index_no'] === $index_no) {
      array_push($errors, "Index No already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO student (index_no, first_name, last_name, email, password) 
  			  VALUES('$index_no', '$first_name', '$last_name', '$email',  '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['index_no'] = $index_no;
    $_SESSION['first_name'] = $first_name;
    $_SESSION['last_name'] = $last_name;
    $_SESSION['password'] = $password_2;
  	$_SESSION['success'] = "You are now logged in";
    echo 
  	header('location: index.php');
  }
}


?>