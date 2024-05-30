<?php

$username = "root";
$password = "";
$server = "localhost";
$db_name = "commentSystem";

$conn = @mysqli_connect($server, $username, $password,$db_name);
if (isset($_POST['submit'])) {

    $commenterName = $_POST['name'];
    $message = $_POST['message'];


    $sql_1 = "INSERT INTO comment_tb (commenterName,message) VALUES ('$commenterName','$message')";
    $result_1 = $conn->query($sql_1);

    if ($result_1) {

        echo "success";
        $sql_2 = "SELECT * FROM comment_tb";
        $result_2 = $conn->query($sql_2);

        if($result_2->num_rows>0){

            while($row = $result_2->fetch_assoc()){
                
                echo "<table class='table'>
                        <thead>
                            <tr>
                                <th scope='col'>".$row['commenterName'] . "</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>".$row['message']."</td>
                            </tr>
                        </tbody>"
                        ;
            }
        }
        else{
            echo "not selected";
        }
    } else {
        echo "failed";
    }
}
?>