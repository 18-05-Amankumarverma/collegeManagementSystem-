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
			display:flex;
			flex-wrap:nowrap;

		}
		.box{
		  background-color:white;
		  width:350px;
		  height:400px;
		  margin:0px 20px;
		}
		.innerBox{
		    padding:20px 12px;
		    background-color:#BECCD9;
		    height:100%
		}
		.innerBox .dateAndTime{
		  display:flex;
		  justify-content:space-between;
		  
		}
		span{
		  display:block
		}
		.messageBox{
		  margin:20px 0px;
		  height:260px;
		  overflow-Y:scroll
		}
		.messageBox::-webkit-scrollbar {
		  display: none;
		}

		.innerBox .messageBox{
		  background-color:#E8EAEC;
		  padding:0px 0px;
		}
		.messageBox p{
		  line-height:22px;
		  text-align:justify;
		  padding:0px 8px
		}
		button{
		  padding:10px 14px;
		  font-size:14px;
		  background-color:crimson;
		  border:none;
		  margin:20px 0px;
		  font-weight:700;
		  cursor:pointer;
		   box-shadow:0px 0px 3px #000
		}
		button a{
		  text-decoration:none;
		  color:white;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="parent_div">

			<?php  foreach($results as $result): ?>

				<div class="box">
				  <div class="innerBox">
				    <div class="dateAndTime">
				      <span>Uploaded By :<?php echo $result['file_uploader_name'] ?></span>
				      <span>Date : 04-10-2024</span>
				    </div>
				    <div class="messageBox">
				      <p><span style="font-weight:bold">Message: </span> 
				        	<?php echo $result['message'] ; ?>
				      </p>
				    </div>
				    <button>
				      		<a href="teacher/uploaded_files/<?php echo $result['file_upload_box'] ; ?>">Download Work</a>
				    </button>
				  </div>
				</div>

			<?php endforeach ; ?>

		</div>
	</div>
</body>
</html>