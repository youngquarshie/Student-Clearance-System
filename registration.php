<head>
    <?php include("shared/connection.php")?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <script src="jquery-3.2.1.min.js"></script>
    <script src="bootstrap-sweetalert-master/dist/sweetalert.js"></script>
    <script src="bootstrap-sweetalert-master/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="bootstrap-sweetalert-master/assets/docs.css">
    <link rel="stylesheet" href="bootstrap-sweetalert-master/dist/sweetalert.css">
</head>
<body>

<script>
    $(function () {
        var index_format="04/2015/";
        document.getElementById("index_no").value =index_format;
        $("#send").click(function (e) {
            e.preventDefault();
            var index_no=$("#index_no").val();
            var fname=$("#fname").val();
            var lname=$("#lname").val();
            var email=$("#email").val();
            var password=$("#password").val();
            var session_type=$("#session_type option:selected").text();
            var completion=$("#completion option:selected").val();
            var department=$("#department option:selected").val();
            var faculty=$("#faculty option:selected").val();
            var supervisor=$("#supervisor option:selected").val();

            document.getElementById("load").innerHTML="<img src='images/blue.gif' width='70px' " +
                "style='background-color: transparent'>";
            $.ajax({
                type:"post",
                url:"registration_server.php",
                data:{
                    index_no:index_no,
                    fname:fname,
                    lname:lname,
                    email:email,
                    password:password,
                    session_type:session_type,
                    completion:completion,
                    department:department,
                    faculty:faculty,
                    supervisor:supervisor
                },
                success:function(result){
                    setTimeout(function(){
                        //alert(result);

                        if(result=="3"){
                            window.location.href="login_student.php";

                        }
                        else if(result=="2"){
                            //$("#name_error").html("Index Number already exist");
                            swal("error","Index Number Already Exist","error");
                            document.getElementById("load").innerHTML="";
                        }
                        else{
                            $("#name_error").html(result);
                            document.getElementById("load").innerHTML="";
                        }


                    },2000)

                }
            })


        })
        $("#completion").change(function () {
            var my_year=$(this).val();
            if(my_year=="2019"){
                var index_format="04/2016/";
                document.getElementById("index_no").value =index_format;
            }
            else if(my_year=="2020"){
                var index_format="04/2017/";
                document.getElementById("index_no").value =index_format;
            }

            else if(my_year=="2018"){
                var index_format="04/2015/";
                document.getElementById("index_no").value =index_format;
            }

        })

    })
</script>
<div id="bod">
    <form>
        <h1>Register</h1>

        <fieldset>
            <label for="job">Year of Completion:</label>
            <select id="completion" name="session">
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
            </select>
            <label for="name">Index Number:</label>
            *<input type="text" id="index_no" name="index_number">

            <label for="name">First Name:</label>
            *<input type="text" id="fname" name="fname">


            <label for="name">Last Name:</label>
            *<input type="text" id="lname" name="lname">


            <label for="mail">Email:</label>
            *<input type="email" id="email" name="email">

            <label for="password">Password:</label>
            <div style="color: red; background-color: transparent"> Password should be at least 12 Characters</div>
            *<input type="password" id="password" name="user_password">

            <label for="job">Session:</label>
            <select id="session_type" name="session">
                <option value="morning">Morning</option>
                <option value="evening">Evening</option>
                <option value="weekend">Weekend</option>

            </select>

            <label for="job">Faculty:</label>
            <?php
            $sql=mysqli_query($con,"SELECT faculty_id, faculty_name FROM faculty");
            echo "<select id='faculty'>";
            while($row=mysqli_fetch_array($sql)) {
                echo "<option value='$row[0]'>$row[1]</option>";
            }
            echo "</select>";
            ?>

            <label for="job">Department:</label>
            <?php
            $sql=mysqli_query($con,"SELECT department_id, department_name FROM department");
            echo "<select id='department'>";
            while($row=mysqli_fetch_array($sql)) {
                echo "<option value='$row[0]'>$row[1]</option>";
            }
            echo "</select>";
            ?>

            <label for="job">Select Your Supervisor:</label>
            <?php
            $sql=mysqli_query($con,"SELECT * FROM tbl_supervisors");
            echo "<select id='supervisor'>";
            while($row=mysqli_fetch_array($sql)) {
                echo "<option value='$row[0]'>$row[1]</option>";
            }
            echo "</select>";
            ?>
            <div id="field"></div>
            <div id="load" style="background-color: transparent"></div>
            <div id="name_error" style="background-color: transparent; color:red"></div>
            <button type="submit" id="send">Register</button>
            <a href="login_student.php" style="background-color: transparent; font-size: 20px;">Click Here to Login</a>
        </fieldset>
    </form>
</div>


<style>
    *, *:before, *:after {
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        overflow: auto;
        /*background-color: #21d6ff;*/
        padding:0px;
        margin: 0px;
    }

    body {
        font-family: 'Arial', sans-serif;
        color: white;

    }

    form {
        max-width:80%px;
        margin: 10px auto;
        padding: 10px 30px;
        background-color:#ffffff;
        border-radius: 8px;
    }

    h1 {
        margin: 0 0 30px 0;
        text-align: center;
        background: white;
        color:black;
    }

    input[type="text"],
    input[type="password"],
    input[type="date"],
    input[type="datetime"],
    input[type="email"],
    input[type="number"],
    input[type="search"],
    input[type="tel"],
    input[type="time"],
    input[type="url"],
    textarea,
    select {
        border: none;
        font-size: 16px;
        height: auto;
        margin: 0;
        outline: 0;
        padding: 5px;
        width: 70%;
        background-color: rgb(3, 162, 255);
        color: white;
        box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
        margin-bottom: 25px;
        text-align:center;

    }

    
    button {
        color: #FFF;
        background-color: #ff0c81;
        font-size: 18px;
        text-align: center;
        font-style: normal;
        border-radius: 5px;
        width: 40%;
        border: 1px solid #ff0c81;
        border-width: 1px 1px 3px;
        box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
        margin-bottom: 10px;
        cursor:pointer;

    }

    fieldset {
        margin-bottom: 30px;
        border: none;
        background:white;

    }

    legend {
        font-size: 1.4em;
        margin-bottom: 10px;

    }
    #bod{
        background-image:url("images/sk.jpg");
    }

    label {
        display: block;
        margin-bottom: 8px;
        background: white;
        color: #4603ff;


    }

    label.light {
        font-weight: 300;
        display: inline;
    }



    @media screen and (min-width: 480px) {

        form {
            max-width: 600px;
        }

    }
</style>

</body>
</html>