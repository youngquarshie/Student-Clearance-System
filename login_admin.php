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
    <script src="bootstrap-sweetalert-master/dist/sweetalert.js"></script>
    <script src="bootstrap-sweetalert-master/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="bootstrap-sweetalert-master/dist/sweetalert.css">
    <title>Admin Login</title>

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
    <link rel="shortcut icon" href="assets/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

</head>

<body>
<script>
    function checkuserlogin(){
        var username = document.getElementById("form-username").value;
        var password = document.getElementById("form-password").value;
        var xml=new XMLHttpRequest();
        xml.onreadystatechange=function(){

            document.getElementById("load").innerHTML="<img src='images/blue.gif' width='70px'>";
            if(xml.readyState==4 && xml.status==200){
                var thevalue= xml.responseText;
                setTimeout(function () {
                    if(thevalue=="1"){
                        swal("","Logged in Successfully","success");
                        setTimeout(function () {
                            window.location.href="admin_dashboard.php";
                        },2000)

                    } else
                    {
                        swal("",("Wrong Username or Password"),"error");
                        setTimeout(function () {
                            document.getElementById("load").innerHTML="";
                        },2000);
                    }
                },2000)

            }

        };
        xml.open("GET", "adminserver.php?form-username="+username+"&form-password="+password, true);
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

<!-- Top content -->
<div class="top-content">

    <div class="inner-bg">
        <div class="container">
            <a href="staff.php"><img src="images/ktu_logo.png"></a>
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
                            <h3 style="color: #3e8f3e">Admin Portal Login</h3>
                            <p style="color: #1733ff">Enter Your Username and Password to Log on:</p>
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-key"></i>
                        </div>
                    </div>
                    <div class="form-bottom">
                        <form role="form" class="login-form">
                            <div class="form-group">
                                <label class="sr-only" for="form-username">Username</label>
                                <input type="text" name="form-username" placeholder="Username..."
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
<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.backstretch.min.js"></script>
<script src="assets/js/scripts2.js"></script>

<!--[if lt IE 10]>
<script src="assets/js/placeholder.js"></script>
<![endif]-->

</body>

</html>