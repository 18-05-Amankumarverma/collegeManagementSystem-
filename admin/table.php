<?php

//include('admin_middleware.php');
require '../function.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $row = mysqli_query($conn,"DELETE FROM tb_image WHERE id = '$id' "); // data deleted
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            color:white;
        }

        * {
            margin: 0px;
            padding: 0px;
        }

        .parent-container {
            height: 100vh;
            width: 100%;
        }

        .child-container {
            height: 100vh;
            width: 100%;
            display: grid;
            grid-template-columns: 16% 84%;
            grid-template-rows: 1fr;

        }

        .child-container .left {
            background-color: #000000;
            border-right: 2px solid #3a3838;
        }

        .child-container .left .inner-left .inner-left-top {
            height: 50px;
            width: 100%;
            border-right: 2px solid #3a3838;
        }

        .child-container .left .inner-left .inner-left-top h2 {
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: 600;
            height: 100%;
        }

        .child-container .left .inner-left .inner-left-bottom {
            display: flex;
            justify-content: center;
            width: 100%;
        }

        .child-container .left .inner-left .inner-left-bottom ul {
            list-style-type: none;
            margin: 40px 0px;
        }

        .child-container .left .inner-left .inner-left-bottom ul li a {
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            color: #fff;
        }

        .child-container .left .inner-left .inner-left-bottom ul li {
            padding: 8px 5px;
        }

        .child-container .right {
            background-color: #121313;
        }

        .child-container .right .inner-right .inner-right-top {
            height: 50px;
            width: 100%;
            border-bottom: 2px solid #3a3838;
        }

        .child-container .right .inner-right .inner-right-top {
            width: 100%;
        }

        .child-container .right .inner-right .inner-right-top .user-account {
            float: right;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .child-container .right .inner-right .inner-right-top .user-account .circle {
            height: 40px;
            width: 40px;
            border-radius: 100%;
            background-color: gray;
            margin-top: 5px;
        }

        .child-container .right .inner-right .inner-right-top .user-account .label {
            padding: 0px 10px;
        }

        .child-container .right .inner-right .inner-right-bottom {
            width: 100%;
        }

        .child-container .right .inner-right .inner-right-bottom .inner-right-bottom-top {
            width: 100%;
            height: 50px;
        }

        .allBtnsForFunctionExecution {
            display: flex;
            align-items: center;
            gap: 17px;
            margin: 5px 20px;
        }

        .allBtnsForFunctionExecution button {
            background-color:#5FD6A4;
            font-size: 14px;
            color: #1b1b1b;
            width: 80px;
            font-weight:600;
            padding: 10px 0px;
            border: none;
            border: 1px solid #e5e2e2;
            margin-top: 10px;
            border-radius: 8px;
            cursor: pointer;
        }

        .inner-right-bottom-bottom div {
            padding: 20px;
        }

        .inner-right-bottom-bottom div table {
            width: 100%;
            text-align: center;
            border: 1px solid #dcd9d9;
        }

        .inner-right-bottom-bottom div table tr {
            height: 14px;

        }

        .inner-right-bottom-bottom div table tr th {
            font-size: 18px;
            font-weight: 500;
            color: #fff;
            padding-top: 10px;

        }

        .inner-right-bottom-bottom div table tr td {
            font-size: 18px;
            font-weight: 500;
            color:#fff;
            padding-top: 10px;

        }
    </style>
</head>

<body>
    <div class="parent-container">
        <div class="child-container">
            <div class="left">
                <div class="inner-left">
                    <div class="inner-left-top">
                        <h2>Dashboard</h2>
                    </div>
                    <div class="inner-left-bottom">
                        <ul>
                            <li><a href="../dashboard.html">Dashboard</a></li>
                            <li><a href="#">Attendance</a></li>
                            <li><a href="#">Feedback</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="inner-right">
                    <div class="inner-right-top">
                        <div class="user-account">
                            <div class="circle">
                                <img src="https://img.freepik.com/free-photo/young-bearded-man-with-striped-shirt_273609-5677.jpg"
                                    height="100%" width="100%" style="border-radius:100%;">
                            </div>
                            <div class="label">
                                <h4 id="displayName"></h4>
                            </div>
                        </div>
                    </div>
                    <div class="inner-right-bottom">
                        <div class="inner-right-bottom-top">
                            <div class="allBtnsForFunctionExecution">
                                <button>filter</button>
                                <button>sort</button>
                                <button>select</button>
                                <button>tags</button>
                            </div>
                        </div>
                        <div class="inner-right-bottom-bottom">
                            <div>
                                <table cellspacing="0" border="1">
                                    <tr style="height:40px;">
                                        <th><input type="checkbox"></th>
                                        <th>Id</th>
                                        <th>Date/Time</th>
                                        <th>Location</th>
                                        <th>Photo</th>
                                        <th>Delete</th>
                                    </tr>
                                    <?php
                                        
                                        $i = 1;
                                        $rows = mysqli_query($conn,"SELECT * FROM tb_image");
                              
                                    ?>

                                    <?php
				                        foreach($rows as $row):
                                           
		                            ?>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td><?php echo $i++ ; ?></td>
                                        <td><?php echo $row['date']; ?></td>
                                        <td>undefined</td>
                                        <td>
                                            <img src="../usersPhotoCollection/<?php echo $row['imageName'] ; ?>" style="height:100px;width:100px"/>
                                        </td>
                                        <td>
                                            <button style="cursor: pointer;;height:30px;width:80px;border:none;background-color:red;border:.8px solid black;font-weight:600">
                                               <a href="<?php echo "table.php?id=" . $row['id'] ; ?>">Delete</a>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php endforeach ;?>

                                 </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        var displayName = document.getElementById("displayName");
        function setName(){
            displayName.textContent = localStorage.getItem("adminName");
        }
        setName();
    </script>
</body>

</html>