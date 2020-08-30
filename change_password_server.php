<?php

    include('shared/connection.php');
    $newpassword = $_GET['form-new-password'];
    $confirmpassword= $_GET['form-confirm-password'];
    $id=$_GET['id'];
    if($newpassword==$confirmpassword){
            $query=mysqli_query($con, "UPDATE admin SET admin_password='$confirmpassword' where admin_username='$id'");
            if($query){
                echo "1";
            }
            else echo "Password Couldnt be Changed";
        }



?>