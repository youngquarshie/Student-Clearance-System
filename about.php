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
        <h1 style="font-size:40px"> K.T.U Student Clearance Portal</h1>
    </div>
</header>

<nav id="navbar">
    <div class="container">
        <ul>
            <ul>
                <li><a href="index.php"><img src="images/icons/icons8_Home_40px.png">HOME</a></li>
                <li><a href="about.php"><img src="images/icons/icons8_Help_48px.png">ABOUT </a></li>
                <li><a href="contact.php"><img src="images/icons/icons8_Contact_48px.png">CONTACT</a></li>
                <li><a href="login_student.php"><img src="images/icons/icons8_Password_48px.png"> STUDENT PORTAL </a></li>
            </ul>
        </ul>
    </div>
</nav>
<div class="container">
    <section id="showcase">
        <div class="container">
            <p> This Portal was developed using PHP and MySQL, Ajax, JQuery & Bootstrap
                to manage clearance process of all Final Year Students in Koforidua Technical University
            </p>
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
        color:#fff;
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
        background-color: rgba(224, 230, 255, 0.89);
        min-height:380px;


    }
    #showcase p{
        color: #010101;
        line-height:1.5em;
        font-size: 20px;
    }

    #main-footer{
        background:rgb(7,133,191);
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

