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

<body>
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
        </div>
        <div id="divPrint">
        <?php
        echo "ID:"." ".$_SESSION['index_no']."<br>"."";
        echo "Full Name:"." ".$_SESSION['first_name']." ".$_SESSION['last_name']."<br>"."";
        echo "Faculty:"." ".$_SESSION['faculty']."<br>"."";
        echo "Department:"." ".$_SESSION['department'];
        ?>
        <div class="input-group">
            <button type="submit" id="prt" class="btn" name="submit" onclick="print();">
                <img src="images/icons/icons8_Print_48px.png">
            </button>
        </div>

        <table class="table" cellpadding="10" cellspacing="40">
            <tr>
                <th> No</th>
                <th> Designee</th>
                <th> Status</th>
            </tr>

            <tr>
                <td>1</td>
                <td>SRC Officer </td>
                <?php
                $id=$_SESSION['id'];
                $query = "SELECT student.id,student.index_no,student.src_request, clearance.is_src_approved 
		        FROM student INNER JOIN clearance on student.id=clearance.id
		        WHERE clearance.id='$id' GROUP BY clearance.id";

                $results = mysqli_query($con, $query);
                $row=mysqli_fetch_assoc($results);
                if($row['id']==$id && $row['is_src_approved']==1)
                {
                    echo "<td>"."<h4 style='color:green;'>Cleared</h4>"."</td>"." ";
                }
                elseif($row['src_request']==1 && $row['is_src_approved']==NULL){
                    echo "<td>"."<h4 style='color:blue;'>See Me</h4>"."</td>"." ";
                }
                else
                    echo "<td>"."<h4 style='color:red;'>Pending</h4>"."</td>"." ";

                ?>
            </tr>

            <tr>
                <td>2</td>
                <td>HOD(Student Accounts) </td>
                <?php
                $id=$_SESSION['id'];
                $query = "SELECT student.id, student.account_request, student.index_no, clearance.is_account_approved 
		        FROM student INNER JOIN clearance on student.id=clearance.id
		        WHERE clearance.id='$id' GROUP BY clearance.id";
                $results = mysqli_query($con, $query);
                $row=mysqli_fetch_assoc($results);
                if($row['id']==$_SESSION['id'] && $row['is_account_approved']==1)
                {
                    echo "<td>"."<h4 style='color:green;'>Cleared</h4>"."</td>"." ";
                }
                elseif($row['account_request']==1 && $row['is_account_approved']==NULL){
                    echo "<td>"."<h4 style='color:blue;'>See Me</h4>"."</td>"." ";
                }
                else
                    echo "<td>"."<h4 style='color:red;'>Pending</h4>"."</td>"." ";

                ?>
            </tr>

            <tr>
                <td>3</td>
                <td>HOD Estate </td>
                <?php
                $id=$_SESSION['id'];
                $query = "SELECT student.id, student.estate_request, student.index_no, clearance.is_estate_approved 
		        FROM student INNER JOIN clearance on student.id=clearance.id
		        WHERE clearance.id='$id' GROUP BY clearance.id";
                $results = mysqli_query($con, $query);
                $row=mysqli_fetch_assoc($results);
                if($row['id']==$_SESSION['id'] && $row['is_estate_approved']==1)
                {
                    echo "<td>"."<h4 style='color:green;'>Cleared</h4>"."</td>"." ";
                }
                elseif($row['estate_request']==1 && $row['is_estate_approved']==NULL){
                    echo "<td>"."<h4 style='color:blue;'>See Me</h4>"."</td>"." ";
                }
                else
                    echo "<td>"."<h4 style='color:red;'>Pending</h4>"."</td>"." ";

                ?>
            </tr>

            <tr>
                <td>4</td>
                <td>Project Work Supervisor </td>
                <?php
                $id=$_SESSION['id'];
                $query = "SELECT student.id, student.index_no, student.pws_request, clearance.is_pws_approved
		        FROM student INNER JOIN clearance on student.id=clearance.id
		        WHERE clearance.id='$id' GROUP BY student.id";

                $results = mysqli_query($con, $query);
                $row=mysqli_fetch_assoc($results);
                if($row['index_no']==$_SESSION['index_no'] && $row['is_pws_approved']==1)
                {
                    echo "<td>"."<h4 style='color:green;'>Cleared</h4>"."</td>"." ";
                }
                elseif($row['pws_request']==1 && $row['is_pws_approved']==NULL){
                    echo "<td>"."<h4 style='color:blue;'>See Me</h4>"."</td>"." ";
                }
                else

                    echo "<td>"."<h4 style='color:red;'>Pending</h4>"."</td>"." ";
                ?>
            </tr>

            <tr>
                <td>5</td>
                <td>HOD(Academics) </td>
                <?php
                $id=$_SESSION['id'];
                $query = "SELECT student.id,student.index_no,student.hod_request, clearance.is_hod_approved 
		FROM student INNER JOIN clearance on student.id=clearance.id
		WHERE clearance.id='$id'";

                $results = mysqli_query($con, $query);
                $row=mysqli_fetch_assoc($results);
                if($row['index_no']==$_SESSION['index_no'] && $row['is_hod_approved']==1)
                {
                    echo "<td>"."<h4 style='color:green;'>Cleared</h4>"."</td>"." ";
                }
                elseif($row['hod_request']==1 && $row['is_hod_approved']==NULL){
                    echo "<td>"."<h4 style='color:blue;'>See Me</h4>"."</td>"." ";
                }
                else

                    echo "<td>"."<h4 style='color:red;'>Pending</h4>"."</td>"." ";

                ?>
            </tr>

            <tr>
                <td>6</td>
                <td>Sports Master </td>
                <?php
                $id=$_SESSION['id'];
                $query = "SELECT student.id,student.index_no, student.sports_request, clearance.is_sports_approved
		FROM student INNER JOIN clearance on student.id=clearance.id
		WHERE clearance.id='$id'";

                $results = mysqli_query($con, $query);
                $row=mysqli_fetch_assoc($results);
                if($row['index_no']==$_SESSION['index_no'] && $row['is_sports_approved']==1)
                {
                    echo "<td>"."<h4 style='color:green;'>Cleared</h4>"."</td>"." ";
                }
                elseif($row['index_no']==$_SESSION['index_no'] && $row['is_sports_approved']==NULL){
                    echo "<td>". "<h4 style='color:#1733ff;'>See Me</h4>" ."</td>"." ";
                }
                else echo "<td>"."<h4 style='color:red;'>Pending</h4>"."</td>"." ";

                ?>
            </tr>

            <tr>
                <td>7</td>
                <td>Ag.Librarian </td>
                <?php
                $id=$_SESSION['id'];
                $query = "SELECT student.id,student.index_no, student.library_request, clearance.is_library_approved 
		        FROM student INNER JOIN clearance on student.id=clearance.id
		        WHERE clearance.id='$id'";

                $results = mysqli_query($con, $query);
                $row=mysqli_fetch_assoc($results);
                if($row['index_no']==$_SESSION['index_no'] && $row['is_library_approved']==1)
                {
                    echo "<td>"."<h4 style='color:green;'>Cleared</h4>"."</td>"." ";
                }
                elseif($row['library_request']==1 && $row['is_library_approved']==NULL){
                    echo "<td>"."<h4 style='color:blue;'>See Me</h4>"."</td>"." ";
                }
                else
                    echo "<td>"."<h4 style='color:red;'>Pending</h4>"."</td>"." ";

                ?>
            </tr>

            <tr>
                <td>8</td>
                <td>Coordinator(CEID) </td>
                <?php
                $id=$_SESSION['id'];
                $query = "SELECT student.id,student.index_no, student.ceid_request, clearance.is_ceid_approved 
		        FROM student INNER JOIN clearance on student.id=clearance.id
		        WHERE clearance.id='$id'";

                $results = mysqli_query($con, $query);
                $row=mysqli_fetch_assoc($results);
                if($row['index_no']==$_SESSION['index_no'] && $row['is_ceid_approved']==1)
                {
                    echo "<td>"."<h4 style='color:green;'>Cleared</h4>"."</td>"." ";
                }
                elseif($row['ceid_request']==1 && $row['is_ceid_approved']==NULL){
                    echo "<td>"."<h4 style='color:blue;'>See Me</h4>"."</td>"." ";
                }
                else
                    echo "<td>"."<h4 style='color:red;'>Pending</h4>"."</td>"." ";

                ?>
            </tr>

            <tr>
                <td>9</td>
                <td>Student Services </td>
                <?php
                $id=$_SESSION['id'];
                $query = "SELECT student.id,student.index_no, student.student_service_request, 
                clearance.is_student_service_approved 
		        FROM student INNER JOIN clearance on student.id=clearance.id
		        WHERE clearance.id='$id'";

                $results = mysqli_query($con, $query) or die(mysqli_error($con));
                $row=mysqli_fetch_assoc($results);
                if($row['index_no']==$_SESSION['index_no'] && $row['is_student_service_approved']==1)
                {
                    echo "<td>"."<h4 style='color:green;'>Cleared</h4>"."</td>"." ";
                }
                elseif($row['student_service_request']==1 && $row['is_student_service_approved']==NULL){
                    echo "<td>"."<h4 style='color:blue;'>Not Eligible To Be Cleared </h4>"."</td>"." ";
                }
                else
                    echo "<td>"."<h4 style='color:red;'>Pending</h4>"."</td>"." ";

                ?>
            </tr>

        </table>
        </div>
        </div>

</section>

<?php
$query="SELECT 
		                student.id, 
		                student.index_no, 
		                student.first_name, 
		                student.last_name, 
		                student.status,
		                clearance.is_library_approved, 
		                clearance.is_account_approved, 
		                clearance.is_src_approved, 
		                clearance.is_sports_approved, 
		                clearance.is_estate_approved, clearance.is_pws_approved, 
		                clearance.is_ceid_approved,
		                clearance.is_student_service_approved,
		clearance.is_hod_approved 
		FROM student INNER JOIN clearance on '$id'=clearance.id 
		WHERE clearance.id='$id' 
		GROUP BY '$id'";
$d=mysqli_query($con,$query);
$fetch=mysqli_fetch_assoc($d);
if($fetch['is_src_approved']==1 &&
    $fetch['is_account_approved']==1 &&
    $fetch['is_sports_approved']==1  &&
    $fetch['is_pws_approved']==1 &&
    $fetch['is_hod_approved']==1 &&
    $fetch['is_library_approved']==1 &&
    $fetch['is_ceid_approved']==1&&
    $fetch['is_student_service_approved']==1 &&
    $fetch['is_estate_approved']==1) {
    $r = "UPDATE student SET status='1' where id='$id'";
    $qu=mysqli_query($con,$r) or die(mysqli_error($con));
}
else {
    $r = "UPDATE student SET status='0' where id='$id'";
    $qu = mysqli_query($con, $r) or die(mysqli_error($con));
}
?>

<style>
    #prt{
        position:relative;
        left:90%;
        background: rgb(7,133,191);
        color:white;
    }
    #prt:hover{
        background: black;
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
</body>