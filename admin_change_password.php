<?php
session_start();
if(!isset($_SESSION['admin_username'])){
    header("location:login_admin.php");
}
?>
<html lang="en">



    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Change Password</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/form-elements.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" href="images/icon.ico">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Favicon and touch icons -->


</head>

<body>
<script>
    function userlogin(){

        var newpassword = document.getElementById("form-new-password").value;
        var confirmpassword = document.getElementById("form-confirm-password").value;
        var id="<?php echo $_SESSION['admin_username'];?>";
        var admin_id=id;
        var xml=new XMLHttpRequest();
        xml.onreadystatechange=function(){

            document.getElementById("load").innerHTML="<img src='images/loader.gif'>";
            if(xml.readyState==4 && xml.status==200){
                var thevalue= xml.responseText;
                alert(thevalue);
                setTimeout(function () {
                    if(thevalue=="1"){
                        document.getElementById("status").innerHTML="Password Changed Successfully";
                        window.location.href="admin_dashboard.php";
                    } else
                    {
                        document.getElementById("status").innerHTML="Password Couldnt be changed, check and try again";
                        document.getElementById("load").innerHTML="";
                    }
                },2000)

            }
        };
        xml.open("GET", "change_password_server.php?form-new-password="+newpassword+
            "&form-confirm-password="+confirmpassword+"&id="+admin_id, true);
        xml.send();
        console.log(xml.responseText);
    }
</script>

<!-- Top content -->
<div class="top-content">

    <div class="inner-bg">
        <div class="container">
            <a href="view_clearance_status.php"><img src="images/ktu_logo.png"></a>
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text">

                    <div class="description">

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 form-box">
                    <div class="form-top">
                        <div class="form-top-left">
                            <div id="load"></div>
                            <div id="status" style="color: red;"></div>
                            <h3 style="color: #3e8f3e">Change Password</h3>
                            <p style="color: #1733ff">Enter Your Username and Password to Log on:</p>
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-key"></i>
                        </div>
                    </div>
                    <div class="form-bottom">
                        <form role="form" class="login-form">
                            <div class="form-group">
                                <label class="sr-only" for="form-password">New Password</label>
                                <input type="password" name="form-password" placeholder="New Password..."
                                       class="form-password form-control" id="form-new-password" required>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-password">Confirm Password</label>
                                <input type="password" name="form-password" placeholder="Confirm Password..."
                                       class="form-password form-control" id="form-confirm-password" required>
                            </div>
                            <button type="button" class="btn" onclick="userlogin();">Confirm!</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>


<!-- Javascript -->
<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.backstretch.min.js"></script>
<script src="assets/js/scripts2.js"></script>

<!--[if lt IE 10]>
<script src="assets/js/placeholder.js"></script>
<![endif]-->

</body>

</html>