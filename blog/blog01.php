<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h1 style="padding:30px 0px ;">Title: Unveiling the Power of AI</h1>
                    <div class="d-flex justify-content-center">
                        <img src="https://www.simplilearn.com/ice9/free_resources_article_thumb/Types_of_Artificial_Intelligence.jpg"
                            style="width:100%;">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <p style="text-align:justify;padding-top:40px;line-height:30px;">Artificial Intelligence (AI) has
                        transcended from a mere concept of science fiction to a
                        groundbreaking reality that is shaping the future of humanity. At its core, AI empowers machines
                        to mimic human intelligence, revolutionizing industries and everyday life.

                        In healthcare, AI analyzes vast amounts of medical data to assist in diagnosis and treatment
                        planning, improving patient outcomes and streamlining workflows. Additionally, AI-driven robotic
                        surgery ensures precision and efficiency, reducing human error and recovery time.

                        In the realm of transportation, AI is driving the development of autonomous vehicles, promising
                        safer roads and increased mobility. From self-driving cars to drone deliveries, AI is reshaping
                        how we perceive transportation, making it more convenient and sustainable.

                        Education is also experiencing a paradigm shift with AI-powered personalized learning platforms.
                        These systems adapt to individual student needs, offering tailored curriculum and feedback, thus
                        enhancing educational outcomes and fostering lifelong learning.

                        AI's impact on businesses is profound, optimizing operations through predictive analytics,
                        automation, and customer service chatbots. By harnessing AI, companies gain valuable insights,
                        improve efficiency, and deliver superior customer experiences, gaining a competitive edge in the
                        digital landscape.

                        However, AI isn't without its challenges. Ethical considerations surrounding data privacy,
                        algorithmic bias, and job displacement require careful navigation. As we embrace AI, it's
                        crucial to prioritize ethical frameworks and ensure inclusive development that benefits society
                        as a whole.

                        Looking ahead, AI holds the potential to tackle pressing global issues, from climate change to
                        healthcare disparities. By leveraging AI's predictive capabilities, we can develop proactive
                        solutions and empower communities to thrive in a rapidly changing world.

                        In conclusion, AI is not merely a technological advancement but a catalyst for societal
                        transformation. Its applications span across diverse domains, revolutionizing how we live, work,
                        and interact with the world around us. As we continue to harness the power of AI, let us do so
                        responsibly, guided by principles of equity, transparency, and human-centered design.</p>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h3>Comment Us:</h3>
                    <form action="blog01.php" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="name"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Message</label>
                            <input type="text" class="form-control" name="message" id="exampleInputPassword1">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary bg-success">Comment</button>
                    </form>
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
</body>

</html>
<?php

$username = "root";
$password = "";
$server = "localhost";
$db_name = "commentSystem";
$data = "";
$conn = @mysqli_connect($server, $username, $password, $db_name);
if (isset($_POST['submit'])) {

    $commenterName = $_POST['name'];
    $message = $_POST['message'];

    if (!empty($commenterName) && !empty($message)) {

    $sql_1 = "INSERT INTO comment_tb (commenterName,message) VALUES ('$commenterName','$message')";
    $result_1 = $conn->query($sql_1);

        if ($result_1) {
            echo "success";
        } else {
            echo "failed";
        }
    }
        else {
            echo "Name and message are required";
        }

}



//fetech
$sql = "SELECT * FROM comment_tb";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<section>
                    <div class='container'>
                        <div class='row'>
                            <div class='col-md-12 col-12'>
                                <table class='table'>
                                    <thead>
                                        <tr>  
                                            <th scope='col'><img src='https://icons.veryicon.com/png/o/miscellaneous/user-avatar/user-avatar-male-5.png' style='height:30px;width:30px;margin-right:15px'>".$row['commenterName'] . "</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><img src='https://cdn-icons-png.flaticon.com/512/1789/1789313.png' style='height:30px;width:30px;margin-right:15px'>".$row['message']."</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>";
    }
} else {
    echo "0 results";
}

?>