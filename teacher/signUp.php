<?php
     include("../database/connection.php");
     
     function dataSanitize($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    
    return $data;

}

     if(isset($_POST['submit'])){

        $teacher_name = dataSanitize($_POST['teacher_name']);
        $teacher_password = dataSanitize($_POST['teacher_password']);


        $sql = "insert into teacher_login (teacher_name,teacher_password) 
                values 
                ('$teacher_name','$teacher_password')";
        
        $result = $conn->query($sql);

        if($result == true){
            echo "data inserted successfully";
        }
        else{
            echo "failed" . $conn->error ; 
        }

     }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Teacher Sign Up</title>
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
</head>
<body>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="form_container">
                        <div>
                            <h1>Sign Up</h1>
                            <form method="POST" action="signUp.php">
                                <div>
                                    <label for="teacher_name">Username</label>
                                    <input type="username" name="teacher_name"/>
                                    <br/>
                                    <label for="teacher_password">Password</label>
                                    <input type="text" name="teacher_password"/>
                                    <input type="submit" value="Submit" name="submit"/> 
                                    <div class="links">
                                        <a href="signIn.php" style="float:right;">Sign In</a>
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