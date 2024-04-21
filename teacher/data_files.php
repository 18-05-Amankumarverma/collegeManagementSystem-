<?php
    
    //include('teacher_middleware.php');

    include('../database/connection.php');

    if(isset($_POST['submit'])){

        $file_uploader_name = $_POST['file_uploader_name'];
        $file_uploader_email = $_POST['file_uploader_email'];
        $file_upload_box = $_FILES['file_upload_box'];//file getting
        $message = $_POST['message'];

        if(isset($_FILES['file_upload_box'])) {
            
           // echo "<pre>";
            //print_r($_FILES);

            $tempName = $_FILES['file_upload_box']['tmp_name'];
            $fileName = $_FILES['file_upload_box']['name'];

            move_uploaded_file($tempName,'uploaded_files/' . $fileName);


            $sql = "insert into file_upload (file_uploader_name , file_uploader_email , file_upload_box , message) values ('$file_uploader_name' , '$file_uploader_email' , '$fileName' , '$message')"; 


            $result = $conn->query($sql);

            if($result){
                echo "file inserted into database";

            }
            else{
                echo "not inserted";
            }

        }



       
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Data Files</title>
    <style type="text/css">
    :root{
        --bgcolor:#ededf0;
        --header-color:#1b1b1b;
        --footer-color:#1E4682;
        --btn-color:#1BB9BE;
        --font-color:#FFFFFF;
    }
    body{
        background-color:var(--footer-color);
    }
    #file_container{
        display:flex;
        justify-content:center;
        align-items:center;
    }
    form{
        margin:50px 0px;
        background-color:rgb(231, 217, 231);
        display:flex;
        flex-direction:column;
        padding:40px 20px;
    }
    label{
        font-size:20px;
        font-weight:500;
        line-height:25px;
    }
    input{
        height:38px;
        padding-left:10px;
        font-size:17px;
        font-weight:400;
    }
    input:focus{
        outline:none;
    }
    textarea{
        height:130px;
        resize:none;
    }
    input[type="submit"]{
        margin:40px 0px;
        font-size:20px;
        font-weight:500;
        height:2.5rem;
        padding-left:0px;
        border:none;
        background-color:var(--btn-color);
        margin-bottom:0px;
   
    }
    </style>
</head>
<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <div id="file_container">
                        <form action="data_files.php" method="POST" enctype="multipart/form-data">
                            <label for="file_uploader_name">Name</label>
                            <input type="text" name="file_uploader_name"/>
                            <br/>
                            <label for="file_uploader_email">Email</label>
                            <input type="text" name="file_uploader_email"/>
                            <br/>
                            <div style="display: flex;">
                                <label for="file_upload_box">Upload</label>

                                <input type="file" name="file_upload_box"/>
                                <label for="preview">Preview</label>
                                <img src="" alt="" style="height:80px;width:80px;margin:10px 20px;">
                            </div>                
                            <br/>
                            <label for="message">Message</label>
                            <textarea type="file" accept=".jpg, .png, .pdf" name="message"></textarea>
                            <br/>
                            <input type="submit" name="submit" value="submit"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>