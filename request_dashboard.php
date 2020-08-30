<?php session_start();
include('shared/connection.php');
if(!isset($_SESSION['index_no'])){
    header("location:login_student.php");
    exit();
}
?>
<?php
$id=$_SESSION['id'];

?>
<?php
include('shared/connection.php');
?>
<body>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0"/>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css">
    <script src="bootstrap/js/jquery-3.2.1.min.js"></script>
    <script src="bootstrap/bootstrap.js"></script>
    <script src="bootstrap-sweetalert-master/dist/sweetalert.js"></script>
    <script src="bootstrap-sweetalert-master/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="bootstrap-sweetalert-master/dist/sweetalert.css">
    <link rel="icon" href="images/icon.ico">

    <title>  K.T.U Student Clearance Portal | Welcome </title>
</head>
<header id="main-header">
    <div class="container">
        <img src="images/ktu_logo.png">
        <h1 style="font-size:40px; color: orange"> K.T.U Student Clearance Portal</h1>
    </div>
</header>

<nav id="navbar">
    <div class="container">
        <ul>
            <li><a href="request_dashboard.php"><img src="images/icons/icons8_Message_40px.png"> REQUEST DASHBOARD</a></li>
            <li><a href="clearance.php"><img src="images/icons/icons8_Notification_48px.png"> CLEARANCE DASHBOARD</a></li>
            <li><a href="student_logout.php"><img src="images/icons/icons8_Sign_Out_48px.png">LOGOUT </a></li>

        </ul>
    </div>
</nav>

<section id="newsletter">
    <div class="container">
        <div id="div">
            <br>
            <?php
            echo "INDEX NO:"." ".$_SESSION['index_no']."<br>"."";
            echo "Full Name:"." ".$_SESSION['first_name']." ".$_SESSION['last_name']."<br>"."";
            echo "Faculty:"." ".$_SESSION['faculty']."<br>"."";
            echo "Department:"." ".$_SESSION['department']." "."<br>";
            ?>
            <script src="jquery-3.2.1.min.js"></script>
            <script>
//                for student and designee
                $(function(){
                    var userid="<?php echo $_SESSION['index_no'];?>";
                    var useremail="<?php echo $_SESSION['email'];?>";
                    //alert(userid);
                    //Approve button
                    $(".request").click(function(){
                        var designee_id=$(this).closest("tr").find(".idx").val();
                        $(this).closest("tr").find(".request").attr("disabled","disabled").css("background-color","grey");
                        var approve = "approve";

                        //clearance request------------------
                        $.ajax({
                            type:"post",
                            url:"operations/clearance_operation.php",
                            data:{designee_id:designee_id,userid:userid,
                                approve:approve},
                            success:function(result){
                                swal("",(result),"success");
                                //alert(result);
                                //window.location.href = ("request_dashboard.php");

                            }
                        });


                        //email request
                        $.ajax({
                            type:"post",
                            url:"elastic/index.php",
                            data:{designee_id:designee_id,useremail:useremail,userid:userid},
                            success:function(result){
                                //alert(result);
                                //window.location.href = ("request_dashboard.php");

                            }
                        });


                    });

                });
            </script>

<!--            for student and supervisor-->
            <script>
                //                for student and supervisor
                $(function(){
                    var user_id="<?php echo $_SESSION['index_no'];?>";
                    var user_email="<?php echo $_SESSION['email'];?>";
                    //alert(user_id);
                    //Approve button
                    $("#supervisor").click(function(){
                        var supervisor_id=$(this).closest("tr").find(".super").val();
                        $(this).closest("tr").find("#supervisor").attr("disabled","disabled").css("background-color","grey");
                        var approve = "approve";

                        //clearance request------------------
                        $.ajax({
                            type:"post",
                            url:"operations/clearance_operation_sup.php",
                            data:{supervisor_id:supervisor_id,user_id:user_id,
                                approve:approve},
                            success:function(result){
                                swal("",(result),"success");
                                //alert(result);
                                //window.location.href = ("request_dashboard.php");

                            }
                        });


                        //email request
                        $.ajax({
                            type:"post",
                            url:"elastic/supervisor.php",
                            data:{supervisor_id:supervisor_id,user_email:user_email,user_id:user_id},
                            success:function(result){
                                //alert(result);
                                //window.location.href = ("request_dashboard.php");

                            }
                        });


                    });

                });
            </script>

            <!--for student and HOD-->
            <script>
                //                for student and HOD
                $(function(){
                    var user_id="<?php echo $_SESSION['index_no'];?>";
                    var user_email="<?php echo $_SESSION['email'];?>";
                    //Approve button
                    $("#hod").click(function(){
                        var hod_id=$(this).closest("tr").find(".v").val();
                        $(this).closest("tr").find("#hod").attr("disabled","disabled").css("background-color","grey");
                        var approve = "approve";

                        //clearance request------------------
                        $.ajax({
                            type:"post",
                            url:"operations/clearance_operation_dep.php",
                            data:{hod_id:hod_id,user_id:user_id,
                                approve:approve},
                            success:function(result){
                                swal("",(result),"success");
                                //alert(result);
                                //window.location.href = ("request_dashboard.php");

                            }
                        });


                        //email request
                        $.ajax({
                            type:"post",
                            url:"elastic/hodmail.php",
                            data:{hod_id:hod_id,user_email:user_email,user_id:user_id},
                            success:function(result){
                                //alert(result);
                                //window.location.href = ("request_dashboard.php");

                            }
                        });

                    });

                });
            </script>
            </head>
            <body>

            <div id="profile">
                <?php
                $sql="SELECT * FROM designee";
                $records=mysqli_query($con,$sql);
                ?>
                <table class="table" cellpadding="5" cellspacing="8">
                    <tr>
                        <th> Designee Name</th>
                        <th> Action</th>

                    </tr>
                    <?php
                    while($employee=mysqli_fetch_assoc($records)){
                        $index=$employee['designee_id'];
                        echo "<tr>";
                        echo "<td>".$employee['designee_name']."</td>";
                        echo "<td>".
                            "<button type='button' class='request'> Send Request </button>";

                        ?>
                        <input type="hidden" name="text" class= "idx" value="<?php echo $index;?>">
                        <?php

                        "</td>";
                        echo "</tr>";


                    }

                    ?>

<!--                    for supervisor-->
                    <?php
                    $sql="SELECT * FROM student WHERE id='$id'";
                    $r=mysqli_query($con,$sql);
                    $employ=mysqli_fetch_assoc($r);
                    $lect_id=$employ['supervisor_id'];
                    $result=mysqli_query($con, "SELECT * FROM tbl_supervisors WHERE supervisor_id=$lect_id");
                    $row=mysqli_fetch_assoc($result);
                    $sname=$row['supervisor_name'];
                        $index=$employ['supervisor_id'];
                        echo "<tr>";
                        echo "<td>"."Project Work Supervisor(".$sname.")</td>";
                        echo "<td>".
                            "<button type='button' id='supervisor'> Send Request </button>";

                        ?>
                        <input type="hidden" name="text" class= "super" value="<?php echo $index;?>">
                        <?php

                        "</td>";
                        echo "</tr>";



                    ?>

                    <!-- FOR HOD-->
                    <?php
                    $sql="SELECT * FROM student WHERE id='$id'";
                    $r=mysqli_query($con,$sql);
                    $employ=mysqli_fetch_assoc($r);
                    $dep_id=$employ['department_id'];
                    $result=mysqli_query($con, "SELECT * FROM tbl_hod WHERE department_id='$dep_id'") or
                    die(mysqli_error($con));
                    $row=mysqli_fetch_assoc($result);
                    $dname=$row['name_of_hod'];
                    $id=$row['hod_id'];
                    echo "<tr>";
                    echo "<td>".$dname."</td>";
                    echo "<td>".
                        "<button type='button' id='hod'> Send Request </button>";

                    ?>
                    <input type="hidden" name="text" class= "v" value="<?php echo $id;?>">
                    <?php

                    "</td>";
                    echo "</tr>";

                    ?>

                </table>


            </div>
        </div>

        <style>
            .request{
                padding: 7px;
                font-size: 15px;
                color: white;
                background:green;
                border: none;
                border-radius: 5px;
                cursor:pointer;
            }
            #send{
                padding: 7px;
                font-size: 15px;
                color: white;
                background:green;
                border: none;
                border-radius: 5px;
                cursor:pointer;
            }
            #hod{
                padding: 7px;
                font-size: 15px;
                color: white;
                background:green;
                border: none;
                border-radius: 5px;
                cursor:pointer;
            }
            #depart{
                padding: 7px;
                font-size: 15px;
                color: white;
                background:green;
                border: none;
                border-radius: 5px;
                cursor:pointer;
            }
            #supervisor{
                padding: 7px;
                font-size: 15px;
                color: white;
                background:green;
                border: none;
                border-radius: 5px;
                cursor:pointer;
            }

            #prt{
                position:relative;
                left:80%;
                background:blue;
                color:white;
            }
            .approve:hover{
                background: black;
            }
            .unapprove:hover{
                background: black;
            }
            #user{
                color:blue;
            }
        </style>
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
                line-height:2em;
                font-size: 22px;
                padding-top: 80px;
            }


            #main-footer{
                background: rgb(7,133,191);
                color:#fff;
                text-align: center;
                padding:20px;
                margin-top:0px;
            }
            @media(max-width:600px){
                #main{
                    width:100%;
                    float:none;
                }


            }
        </style>
    </div>
</body>
</html>
