<?php
session_start();
if(!isset($_SESSION['admin_username'])){
    header("location:login_admin.php");
}
?>
    <body>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0"/>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="icon" href="images/icon.ico">
        <title>  K.T.U Student Clearance Portal | Welcome </title>
    </head>
    <header id="main-header">
        <div class="container">
            <h1 style="font-size:40px; color: orange"> K.T.U Student Clearance Portal</h1>
            <h1 style="color: white">Welcome <?php echo $_SESSION['admin_username'] ?></h1>
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

    <div class="container">

    </div>
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

