<?php
session_start();
include('shared/connection.php');
if(!isset($_SESSION['admin_username'])){
    header("location:login_admin.php");
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0"/>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css">
    <script src="bootstrap/js/jquery-3.2.1.min.js"></script>
    <script src="bootstrap/bootstrap.js"></script>
    <link rel="icon" href="images/icon.ico">

    <title>  K.T.U Student Clearance Portal | Welcome </title>
</head>
<header id="main-header">
    <div class="container">
        <img src="images/ktu_logo.png">
        <h1 style="font-size:40px"> K.T.U Clearance Portal</h1>
    </div>
</header>
<nav id="navbar">
    <div class="container">
        <ul>
            <li><a href="view_clearance_status.php"><img src="images/icons/icons8_Ok_48px.png">Clearance Info </a></li>
            <li><a href="managedesignee.php"><img src="images/icons/icons8_Staff_48px.png">View Staff</a></li>
            <li><a href="#"><img src="images/icons/icons8_Admin_48px.png">PW Supervisors</a></li>
            <li><a href="#"><img src="images/icons/icons8_Add_User_Male_48px.png">Add User</a></li>
            <li><a href="admin_change_password.php"><img src="images/icons/icons8_Password_48px.png">Change Password </a></li>
            <li><a href="admin_logout.php"><img src="images/icons/icons8_Sign_Out_48px.png">Logout </a></li>

        </ul>
    </div>
</nav>
<section id="newsletter">
    <div class="container">
        <div id="profile">
            <div class="input-group">
                <button type="submit" id="prt" class="btn" name="submit" onclick="print();">
                    <img src="images/icons/icons8_Print_48px.png">
                </button>
            </div>

            <body>
	<?php 
include('shared/connection.php');
$sql="SELECT * FROM designee";
$records=mysqli_query($con,$sql);
	?>
	<?php include('shared/bootstrap.php'); ?>
<table class="table" cellpadding="5" cellspacing="8">
	<tr>
		<th> Staff Name</th>
		<th> Username</th>
		<th> Password </th>
			
	</tr>
<?php
while($employee=mysqli_fetch_assoc($records)){
echo "<tr>";
echo "<td>".$employee['designee_name']."</td>";
echo "<td>".$employee['username']."</td>";
echo "<td>".$employee['password']."</td>";




?>
<input type="hidden" name="text" class= "idx" value="<?php echo $index;?>">
<?php

			"</td>";
echo "</tr>";



}


?>
    <style>
        #prt{
            position:relative;
            left:90%;
            background:white;
            color:white;
        }
        #prt:hover{
            background: black;
        }

    </style>

</table>
        </div>
    </div>
</section>
</body>
<style>
    body{
        background:white;
        color:#555;
        font-family:Arial, Helvetica,sans-serif;
        font-size:16px;
        line-height:1.6em;
        margin:0;
    }

    .container{
        width:80%;
        margin:auto;
        overflow:hidden
    }
    #main-header{

        background-color: rgb(7,133,191);
        color:white;
        box-sizing: border-box;

    }
    #main-header h1{

        position:relative;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;

    }
    #navbar{
        background-color: white;
        color:#fff;
    }
    #navbar ul{
        padding:0;
        list-style: none;
    }
    #navbar li{
        display:inline;
        padding-right:20px;

    }
    #navbar a{
        color: black;
        text-decoration: none;
        font-size:20px;

    }

    #navbar a:hover{
        background-color: #ff2fb3;


    }
    #showcase {
        background-color: rgba(224, 230, 255, 0.89);
        min-height:380px;

    }
    #showcase p{
        color: #010101;
        line-height:2em;
        font-size: 22px;
        padding-top: 80px;
    }


    #main-footer{
        background: rgb(7,133,191);
        color:#fff;
        text-align: center;
        padding:10px;
        margin-top:0px;
    }
    @media(max-width:600px){
        #main{
            width:100%;
            float:none;
        }

    }
</style>
</body>
</html>
