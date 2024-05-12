<?php
include("../database/connection.php");

if(isset($_POST['submit'])){

$student_name = $_POST['student_name'];
$student_password = $_POST['student_password'];


$sql = "select username , password from student_login where username = '$student_name' and password = '$student_password' ";

$result = $conn->query($sql);

if($result->num_rows){
               
    echo "data found";


     $_SESSION["is_user_loggedIn"] = true;
     $_SESSION["user_data"] = mysqli_fetch_assoc($result) ;
     
     $student_name1 = $student_name;
     $student_password1 = $student_password;

    // query for insertion into location table
          
          function getLocationInfo($ip_address) {
            $details = json_decode(file_get_contents("http://ipinfo.io/{$ip_address}/json"));
            return [
                'ip' => $details->ip,
                'city' => $details->city,
                'region' => $details->region,
                'country' => $details->country,
                'isp' => $details->org
            ];
        }


        $ip_address = getenv('REMOTE_ADDR');
        $location_info = getLocationInfo($ip_address);

        $userLocation =  "Location: " . $location_info['city'] . ", " . $location_info['region'] . ", " . $location_info['country'];
        

        $sqlQueryForLocation = "insert into userloginrecord (logedUserName,logedUserIp,logedUserLocation) values ('$student_name','$ip_address','$userLocation')";

        $runLocQuery = $conn->query($sqlQueryForLocation);
        
        if($runLocQuery){
            echo "location capture succesfully";
        }

    //end of location

    header("location:student_camera.php");

}
else{

    echo "data not found";

    $student_name = null;
    $student_password = null;

}

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Student SignIn</title>
    <style type="text/css">
    :root{
         --bgcolor:#256edb;
        --header-color:#1E4682;
        --footer-color:#1E4682;
        --btn-color:#1BB9BE;
    }   
    body{
        background-color:var(--bgcolor);
    }
     .warningMessageContainer{
            width:400px;
            height:80px;
            background-color:rgb(243, 234, 234);
            margin:20px auto;
            margin-bottom:10px;
            border-radius:4px;
            overflow:hidden;
        }
        #successMessage{
            display:none;
        }
        #alertMessage{
            display:none;
        }
        .warningMessage{
            display:flex;
            justify-content:center;
            align-items:center;
            flex-direction:row;
        }
        .message{
            height:80px;
            width:295px;
            padding:14px 20px;
        
        }
        .line{
            width:5px;
            height:80px;
            background:#FEA500;
        }
        .icon{
            width:50px;
            height:80px;
            display:flex;
            justify-content:center;
            align-items:center;
        }
        .icon img{
            height:30px;
            width:30px;
        }
        .closeIcon{
            width:50px;
            height:80px;
            display:flex;
            justify-content:center;
            align-items:center;
        }
        .closeIcon img{
            height:30px;
            width:33px;

        }
        .message h4{
            font-size:15px;
            margin-bottom:6px;
            width:100%;
            color:#242424;
            
        }
        .message p{
            width:100%;
            font-size:12px;
            color:rgb(121, 121, 121);
        }
    .form_container{
        display:flex;
        justify-content:center;
        align-items:center;
        margin-top:10px;
    }
    span{
        display:none;
        margin-bottom:30px;
        width:100%;
        background-color:red;
        font-size:16px;
        font-weight:500;
        height:35px;
        text-align:center;
        padding:5px 0px;
        color:#fff;

    }
    h1{
        text-align:center;
        margin-bottom:30px;
    }
    form{
        height:400px;
        width:370px;
        margin:0px auto;
        background-color:rgb(223, 222, 222);
        display:flex;
        justify-content:center;
        align-items:center;
        box-shadow:0px 0px 3px #000;
    }
    form div{
        display:flex;
        flex-direction:column;
    }
    input{
        width:300px;
        height:38px;
        border:;
        padding-left:10px;
        font-size:17px;
        font-weight:400;

    }
    input:focus{
        outline:none;
    }
    label{
        font-size:20px;
        font-weight:500;
        line-height:25px;
    }
    input[type="submit"]{
        margin:40px 0px;
        font-size:18px;
        font-weight:500;
        height:2.3rem;
        padding-left:0px;
        border:none;
        background-color:var(--btn-color);
    }
    .links{
        display:block;
        flex-direction:row;
    }
    </style>
</head>
<body>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">

                    <!--It will show Success alert-->   

                    <div class="warningMessageContainer" id="successMessage">
                        <div class="warningMessage">
                            <div class="line" style="background-color:#01C367;"></div>
                            <div class="icon">
                                <img src="../success.png" alt="">
                            </div>
                            <div class="message">
                                <h4>Successfully</h4>
                                <p>People invited and workspace members with link can access.</p>
                            </div>
                            <div class="closeIcon">
                                <img src="../close.png" alt="">
                            </div>
                        </div>
                    </div>

                    <!--It will show Error alert -->

                    <div class="warningMessageContainer" id="alertMessage">
                        <div class="warningMessage">
                            <div class="line" style="background-color:red;"></div>
                            <div class="icon">
                                <img src="../alert.png" alt="" style="width:35px;">
                            </div>
                            <div class="message">
                                <h4>Alert</h4>
                                <p>Your enter Credientals are not correct.</p>
                            </div>
                            <div class="closeIcon">
                                <img src="../close.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-12">

                    <!--Student SignIn Form-->

                    <div class="form_container">
                        <div>
                            <h1>Sign In</h1>
                            <form method="POST" action="">
                                <div>
                                    <label for="student_name">Student Name</label>
                                    <input type="text" name="student_name" id="username" />
                                    <br/>
                                    <label for="student_password">Student Password</label>
                                    <input type="text" name="student_password" id="password" />
                                    <input type="submit" value="Submit" name="submit" id="submit" />
                                    <div class="links">
                                        <a href="signUp.html" >Forgot Password</a>
                                        <a href="student_SignUp.php" style="float:right;">Sign Up</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <script>
        
        var x = "<?php echo $student_name ?>" ; 
        var y = "<?php echo $student_password ?>" ;

        var successMessage = document.getElementById("successMessage");
        var alertMessage = document.getElementById("alertMessage");


        if(x && y){
            console.log("success");
            successMessage.style.display = "block";
            setTimeout(()=>{
                     window.location.href = "student_camera.php";
            },4000);

        }
        else{
            console.log("not success");
            alertMessage.style.display = "block";

        }
        
    </script>

    </body>
</html>