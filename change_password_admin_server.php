<?php
session_start();


// LOGIN USER
if (isset($_POST['login_user'])) {
  $admin_password = mysqli_real_escape_string($db, $_POST['admin_password']);

  $new_password = mysqli_real_escape_string($db, $_POST['admin_password']);
  $retype_password = mysqli_real_escape_string($db, $_POST['admin_password']);

  if (empty($admin_passowrd)) {
    array_push($errors, "Username is required");
  }
  if (empty($new_password)) {
    array_push($errors, "New Password is required");
  }

  if (empty($retype_password)) {
    array_push($errors, "Retype New Password");
  }

  if ($new_password !== $retype_password) {
  array_push($errors, "The two passwords do not match");
  }

  if (count($errors) == 0) {
    $admin_password = ($password);
    $query = "UPDATE admin SET admin_password='$retype_password' WHERE admin_username='$admin_username'";
    $results = mysqli_query($db, $query);
    $row=mysql_fetch_array($result);
    if (mysqli_num_rows($row) == 1) {
      $_SESSION['admin_username'] = $admin_username;
      $_SESSION['success'] = "You are have succesfully changed your password";
      header('location: index.php');
    }else {
      array_push($errors, "Wrong password combination");
    }
  }
}

?>