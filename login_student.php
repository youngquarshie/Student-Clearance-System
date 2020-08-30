
<!DOCTYPE html>
<html lang="en">

<head>
    <script type="text/javascript">
        function noBack(){window.history.forward();}
        noBack();
        window.onload=noBack;
        window.onpageshow=function(evt){if(evt.persisted)noBack();}
        window.onunload=function(){void(0);}
    </script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="jquery-3.2.1.min.js"></script>
    <script src="assets/js/placeholder.js"></script>
    <script src="bootstrap-sweetalert-master/dist/sweetalert.js"></script>
    <script src="bootstrap-sweetalert-master/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="bootstrap-sweetalert-master/dist/sweetalert.css">
    <title>Student Login</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/form-elements.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" href="images/icon.ico">


    <script src="assets/js/jquery-1.11.1.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.backstretch.min.js"></script>
    <script src="assets/js/scripts.js"></script>


</head>

<body>
<script>

    function registration(){
        window.location.href="registration.php";
    }
    function checkuserlogin(){
        var username = document.getElementById("form-username").value;
        username.toUpperCase();
        var password = document.getElementById("form-password").value;
        var xml=new XMLHttpRequest();
        xml.onreadystatechange=function(){

            document.getElementById("load").innerHTML="<img src='images/blue.gif' width='70px'>";
            if(xml.readyState==4 && xml.status==200){
                var thevalue= xml.responseText;
                setTimeout(function () {
                    if(thevalue=="1"){
                            window.location.href="request_dashboard.php";

                    } else
                    {
                        swal("",("Wrong Username or Password"),"error");
                        setTimeout(function () {
                            document.getElementById("load").innerHTML="";
                        },2000);


                    }
                },4000)

            }

        };
        xml.open("GET", "student_login_server.php?form-username="+username+"&form-password="+password, true);
        xml.send();
        console.log(xml.responseText);
    }
    $(document).keydown(function(e){
        switch (e.which){
            case 13:
                checkuserlogin();
                break;
            default:
        }
    })

</script>
<?php
include('shared/connection.php');
?>
<!-- Top content -->
<div class="top-content">

    <div class="inner-bg">
        <div class="container">
            <a href="index.php"><img src="images/ktu_logo.png"></a>
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text">

                    <div class="description">

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 form-box">
                    <div class="form-top">
                        <button type="button" class="btn" onclick="registration();">Register!</button>
                        <div class="form-top-left">
                            <div id="load"></div>
                            <div id="status" style="color: red;"></div>

                            <h3 style="color: #3e8f3e">Student Portal Login</h3>
                            <p style="color: #1733ff">Enter Your Index No and Password to Log on:</p>
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-key"></i>
                        </div>
                    </div>
                    <div class="form-bottom">
                        <form role="form" class="login-form">
                            <div class="form-group">
                                <label class="sr-only" for="form-username">Index No</label>
                                <input type="text" name="form-username" placeholder="Index No..."
                                       class="form-username form-control" id="form-username" required>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-password">Password</label>
                                <input type="password" name="form-password" placeholder="Password..."
                                       class="form-password form-control" id="form-password" required>
                            </div>
                            <button type="button" class="btn" onclick="checkuserlogin();">Sign in!</button>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>


<!-- Javascript -->

<![endif]-->

</body>

</html>