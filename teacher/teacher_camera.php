<?php

     include("../database/connection.php");

     //include("teacher_middleware.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Camera</title>
    <style>
        body{

            background-color:#256edb;
        }
        #camera-box{
            height:600px;
            width:400px;
            margin:20px auto;
        }
        #camera{
            height:500px;
            width:400px;
            padding:10px ;
        }
        video{
            width:380px !important;
        }
        #button-container{
            display:flex;
            justify-content:center;
            align-items:center;
        }
        button{
            border:none;
            background-color:#1BB9BE;
            color:white;
            font-size:18px;
            border:none;
            height:3.5rem;
            font-weight:500;
            width:200px;

        }
    </style>
</head>
<body onload="configure()">
    <section class="camera-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <div id="camera-box">
                        <div>
                            <div id="camera"></div>
                            <div id="results" style="visibility:hidden;;position: absolute;"></div>
                            <div id="button-container">
                                <button type="button" onclick="saveSnap()">Capture</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="../assets/webcam.min.js"></script>
    <script>
        function configure(){
            Webcam.set({
            height:500,
            width:400,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
        
        Webcam.attach( '#camera' );

        }

        function saveSnap(){
            Webcam.snap( function(data_uri) {
            document.getElementById('results').innerHTML = '<img id="webcam" src="'+data_uri+'"/>';
        } );

             Webcam.reset();
  
            var base64image = document.getElementById("webcam").src;
            Webcam.upload( base64image,'../function.php', function(code, text) {
            alert('Image Capture Successfully');
         });

        

        }
    </script>

    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>