<?php

include("../database/connection.php");

function dataSanitize($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    
    return $data;

}

if (isset($_POST['submit'])) {

    $admin_name = dataSanitize($_POST['admin_name']);
    $admin_password = dataSanitize($_POST['admin_password']);


    $sql = "select  id , admin_name , admin_password from admin_login where admin_name = '$admin_name' and admin_password = '$admin_password' ";

    $result = $conn->query($sql);

   if ($result->num_rows) {

        echo "data found";
        $_SESSION["is_user_loggedIn"] = true;
        $_SESSION["user_data"] = mysqli_fetch_assoc($result);
        
      
        header("location:table.php");

    } else {
        echo "no data found";  
        $admin_name     = null;
        $admin_password = null;
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
    <title>Admin Sign In</title>
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

        .form_container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
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

        label {
            font-size: 20px;
            font-weight: 500;
            line-height: 25px;
        }

        input:focus {
            outline: none;
        }

        input[type="submit"] {
            margin: 40px 0px;
            font-size: 18px;
            font-weight: 500;
            height: 2.3rem;
            padding-left: 0px;
            background-color: #1BB9BE;
            border: none;
        }

        .links {
            display: block;
            flex-direction: row;
        }

        .links a {}
    </style>
</head>

<body>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="form_container">
                        <div>
                            <h1>Admin SignIn</h1>
                            <form method="POST" action="admin_login.php">
                                <div>
                                    <label for="admin_name">Admin Name</label>
                                    <input type="text" name="admin_name" id="username" />
                                    <br />
                                    <label for="admin_password">Admin Password</label>
                                    <input type="text" name="admin_password" id="password" />
                                    <input type="submit" value="Submit" name="submit" id="submit" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>

        var admin_name = document.getElementById('username');
        var admin_password = document.getElementById('password');
        var submit = document.getElementById('submit');

        submit.addEventListener('click', () => {
            if (admin_name.value.length == 0 && admin_password.value.length == 0) {
                console.log("null value");
                localStorage.setItem("displayName",admin_name.value);
            }
            else {
                console.log("not null");
                localStorage.setItem("adminName", admin_name.value);
            }
        })

    </script>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>
    
    <script>
          
        var x = "<?php echo $admin_name ?>" ; 
        var y = "<?php echo $admin_password ?>" ;

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