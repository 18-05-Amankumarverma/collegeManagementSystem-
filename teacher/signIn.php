<?php
//include ("../database/connection.php");

function dataSanitize($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;

}


//errorMessage 
$errorMessage = null;

if (isset($_POST['submit'])) {

    $teacher_name = dataSanitize($_POST['teacher_name']);
    $teacher_password = dataSanitize($_POST['teacher_password']);


    $sql = "select teacher_name , teacher_password from teacher_login where teacher_name = '$teacher_name' and teacher_password = '$teacher_password' ";

    $result = $conn->query($sql);

    if ($result->num_rows) {

        echo "data found";
        $_SESSION["is_user_loggedIn"] = true;
        $_SESSION["user_data"] = mysqli_fetch_assoc($result);

        header("location:teacherLandingPage.html");
        //header("location:data_files.php");

    } else {

        echo "data not found";

        $teacher_name = null;
        $teacher_password = null;

    }


}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Teacher Sign In</title>
    <style type="text/css">
        :root {
            --bgcolor: #256edb;
            --header-color: #1E4682;
            --footer-color: #1E4682;
            --btn-color: #1BB9BE;
        }

        body {
            background-color: var(--bgcolor);
        }

        .warningMessageContainer {
            width: 400px;
            height: 80px;
            background-color: rgb(243, 234, 234);
            margin: 20px auto;
            margin-bottom: 10px;
            border-radius: 4px;
            overflow: hidden;
            transition: all .8s;
        }

        .warningMessageContainer {
            animation-name: sweetAlertAnimation;
            animation-duration: .8s;
            animation-delay: .1s;
            animation-iteration-count: 1;
            animation-fill-mode: forwards;
        }

        @keyframes sweetAlertAnimation {
            to {
                transform: translateY(8px);
            }

            from {
                transform: translateY(0px);
            }
        }

        #successMessage {
            display: none;
        }

        #alertMessage {
            display: none;
        }

        .warningMessage {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: row;
        }

        .message {
            height: 80px;
            width: 295px;
            padding: 14px 20px;

        }

        .line {
            width: 5px;
            height: 80px;
            background: #FEA500;
        }

        .icon {
            width: 50px;
            height: 80px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .icon img {
            height: 30px;
            width: 30px;
        }

        .closeIcon {
            width: 50px;
            height: 80px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .closeIcon img {
            height: 30px;
            width: 33px;

        }

        .message h4 {
            font-size: 15px;
            margin-bottom: 6px;
            width: 100%;
            color: #242424;

        }

        .message p {
            width: 100%;
            font-size: 12px;
            color: rgb(121, 121, 121);
        }

        .form_container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
        }

        span {
            display: none;
            margin-bottom: 30px;
            width: 100%;
            background-color: red;
            font-size: 16px;
            font-weight: 500;
            height: 35px;
            text-align: center;
            padding: 5px 0px;
            color: #fff;

        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        form {
            height: 400px;
            width: 370px;
            margin: 0px auto;
            background-color: rgb(223, 222, 222);
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0px 0px 3px #000;
        }

        form div {
            display: flex;
            flex-direction: column;
        }

        input {
            width: 300px;
            height: 38px;
            padding-left: 10px;
            font-size: 17px;
            font-weight: 400;
        }

        input:focus {
            outline: none;
        }

        label {
            font-size: 20px;
            font-weight: 500;
            line-height: 25px;
        }

        input[type="submit"] {
            margin: 40px 0px;
            font-size: 18px;
            font-weight: 500;
            height: 2.3rem;
            padding-left: 0px;
            background-color: var(--btn-color);
            border: none;
        }

        .links {
            display: block;
            flex-direction: row;
        }

        .links a {}
    </style>

    <?php
    if ($errorMessage != null) {
        ?>
        <style>
            span {
                display: block;
            }
        </style>
        <?php
    }
    ?>

</head>

<body>
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

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="form_container">
                        <div>
                            <span><?php echo $errorMessage ?></span>
                            <h1>Sign In</h1>
                            <form method="POST" action="signIn.php">
                                <div>
                                    <label for="teacher_name">Teacher Name</label>
                                    <input type="username" name="teacher_name" id="username" />
                                    <br />
                                    <label for="teacher_password">Teacher Password</label>
                                    <input type="text" name="teacher_password" id="password" />
                                    <input type="submit" value="Submit" name="submit" id="submit" />
                                    <div class="links">
                                        <a href="signUp.html">Forgot Password</a>
                                        <a href="signUp.php" style="float:right;">Sign Up</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>

    <script>

        var x = "<?php echo $teacher_name ?>" ; 
        var y = "<?php echo $teacher_password ?>" ;

        var successMessage = document.getElementById("successMessage");
        var alertMessage = document.getElementById("alertMessage");


        if (x && y) {
            console.log("success");
            successMessage.style.display = "block";
            setTimeout(() => {
                window.location.href = "student_camera.php";
            }, 4000);

        }
        else {
            console.log("not success");
            alertMessage.style.display = "block";

        }

        var username = document.getElementById("username");

        function settingUserNameforNextPage() {
            localStorage.setItem("username", username.value);
        }
    </script>
</body>

</html>