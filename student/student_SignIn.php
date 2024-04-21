<?php
include("../database/connection.php");



//errorMessage 
$errorMessage = null;

if(isset($_POST['submit'])){

$student_name = $_POST['student_name'];
$student_password = $_POST['student_password'];


$sql = "select username , password from student_login where username = '$student_name' and password = '$student_password' ";

$result = $conn->query($sql);

if($result->num_rows){
               
    echo "data found";
     $_SESSION["is_user_loggedIn"] = true;
     $_SESSION["user_data"] = mysqli_fetch_assoc($result) ;


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


        $ipAddress = $_SERVER['REMOTE_ADDR'];
        $location_info = getLocationInfo($ip_address);

        $userLocation =  "Location: " . $location_info['city'] . ", " . $location_info['region'] . ", " . $location_info['country'];


        $sqlQueryForLocation = "insert into userloginrecord (logedUserName,logedUserIp,logedUserLocation) values ('$student_name','$ipAddress','$userLocation')";

        $runLocQuery = $conn->query($sqlQueryForLocation);
        
        if($runLocQuery){
            echo "location capture succesfully";
        }

    //end of location

    header("location:student_camera.php");

}
else{

    $errorMessage = "User not found";

}


}




/*
$sql = "select username , password from student_login where username = '$student_name' and password = '$student_password' ";

$result = $conn->query($sql);

if($result->num_rows){
       
       echo "data found";
        $_SESSION["is_user_loggedIn"] = true;
        $_SESSION["user_data"] = mysqli_fetch_assoc($result) ;

    header("location:student_camera.php");

}
else{
    echo "no data found";
}


}
*/

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
    .form_container{
        display:flex;
        justify-content:center;
        align-items:center;
        margin-top:60px;
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
    .links a{
    }

    </style>
    <?php
        if($errorMessage != null)
        {
            ?>
                <style>
                    span{
                        display:block;
                    }
                </style>
            <?php
        }
    ?>
</head>
<body>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="form_container">
                        <div>
                            <span id="errorMessage"><?php echo $errorMessage ?></span>
                            <h1>Sign In</h1>
                            <form method="POST" action="student_SignIn.php">
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

</body>
</html>