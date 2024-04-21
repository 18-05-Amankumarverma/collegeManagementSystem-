<?php
    
  //  include('admin_middleware.php');
    
    require '../function.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Table</title>
    <style type="text/css">
        .table-container{
            display:flex;
            justify-content:center;
            align-items:center;
            background-color:#E2E0ED;
        }
        table{
            width:100%;
        }
        .heading{
            height:42px;
            background-color:#E2E0ED;
        }
        tr th{
            font-size:18px;
            font-weight:500;
            text-align:center;
        }
        tr td{
            text-align:center;
            font-size:17px;
            font-weight:400;
        }
        tr:nth-child(2n){
            background-color:#FBEEF5;
        }

        tr td img{
            height:130px;
            width:170px;
            padding:10px 10px;
        }
    </style>
</head>
<body>
   
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="table-container">
                        <table>
                            <tr class="heading">
                                <th>Id</th>
                                <th>Date-Time</th>
                                <th>Location</th>
                                <th>Photo</th>
                            </tr>
                            
  		                    <?php
                                $i = 1;
                                $rows = mysqli_query($conn,"SELECT * FROM tb_image ORDER BY id DESC");
                              
                            ?>

                            <?php
				                foreach($rows as $row):
		                    ?>

                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row['date']; ?></td>
                                <td>undefined</td>
                                <td>
                                    <img src="../img/<?php echo $row['imageName'] ; ?>"/>
                                </td>
                            </tr>
                            <?php endforeach ;?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>