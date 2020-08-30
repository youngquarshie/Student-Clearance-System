<?php
include('shared/connection.php');
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
        <img src="images/ktu_logo.png">
        <h1 style="font-size:40px"> K.T.U Clearance Portal</h1>
    </div>
</header>

<nav id="navbar">
    <div class="container">
        <ul>

            <li><a href="designeelogin.php"><img src="images/icons/icons8_Admin_48px.png"> STAFF PORTAL </a></li>
            <li><a href="supervisor_login.php"><img src="images/icons/icons8_Admin_48px.png"> SUPERVISOR PORTAL </a></li>
            <li><a href="hod_login.php"><img src="images/icons/icons8_Admin_48px.png"> HOD PORTAL </a></li>
            <li><a href="login_admin.php"><img src="images/icons/icons8_Admin_48px.png"> ADMIN PORTAL </a></li>
        </ul>
    </div>
</nav>
<div class="container" style="background-color: white">
    <section id="showcase">
        <div class="container">
            <img src="images/sk.jpg " style="width: 100%; height: 60%">
            <!--<p> Flexible Clearance Web Portal <br>Technology has come to stay with us with accompanying ramifications and mixed blessings.
                <br>The influence of current and future Information Technology and their applications is beyond human imaginations. </p>
    -->
        </div>
    </section>
</div>

<div class="container">
    <footer id="main-footer">
        <p> Copyright &copy; 2018 KTU Clearance</p>
    </footer>
</div>
<style>
    body{
        background:white;
        color:#555;
        font-family:Arial, Helvetica,sans-serif;
        font-size:16px;
        line-height:1.6em;
        margin:0;
        overflow: hidden;

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
        background-color: #fff;
        color:#fff;
    }
    #navbar ul{
        padding:0;
        list-style: none;
    }
    #navbar li{
        display:inline;
    }
    #navbar a{
        color: black;
        text-decoration: none;
        font-size:18px;
        padding:5px;
    }

    #navbar a:hover{
        background-color: #ff2fb3;


    }
    #showcase {
        /*background-color: rgba(224, 230, 255, 0.89);*/
        /*min-height:380px;*/



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
        padding:5px;
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

