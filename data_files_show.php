<?php

include('database/connection.php');

$sql = "select * from file_upload ";

$results  = $conn->query($sql);

if($results){
	echo "result selected";
} 
else{
	echo "not selected";
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>data_files_show</title>
	<style type="text/css">
		body{
			font-family:Arial, Helvetica, sans-serif;
			background-color: rgb(7, 59, 104);
		}
		.container{
			width:1200px;
			margin:0px auto;
		}
		.parent_div{
			display:grid;
			grid-template-columns:1fr 1fr;
			grid-template-rows:1fr 1fr;
			gap:12px;
			width:1000px;
			margin:0px auto;


		}
		.child_div{
			background-color:rgb(169, 169, 219);
			height:300px;
			padding:10px 10px;
		}
		.child_div div h2{
			font-size:;
			font-weight:600;
			
		}
		.child_div div button{
			height:35px;
			
		}
		.child_div div button a {
			font-size: 18px;
			font-weight:600;
			text-decoration:none;
			padding:4px 0px;
			color:#000;
		}
		.child_div div div  span{
			font-size:18px;
			font-weight:500;
		}
		.child_div div div p{
			font-size:17px;
			font-weight:400;
			text-align:justify;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="parent_div">

			<?php
				    foreach($results as $result):
		    ?>

			<div class="child_div">

				

				<div>
					<h2>Uploaded By :<?php echo $result['file_uploader_name'] ?></h2>
					<h5>Date: 10-10-2005</h5>
					<div>
						<span>Uploaded File:</span>
						<button>
							<a href="teacher/uploaded_files/<?php echo $result['file_upload_box'] ; ?>">Download</a>
						</button>
					</div>
					<div style="margin-top:20px;">
						<span>Message:</span>
						<p>
							<?php echo $result['message'] ; ?>

						</p>
					</div>
				</div>
			</div>

			<?php endforeach ; ?>

		</div>
	</div>
</body>
</html>