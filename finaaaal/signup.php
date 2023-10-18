<?php 

session_start();

	include("connection.php");



	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$course = $_POST['course'];
		$bday = $_POST['bday'];
		$address = $_POST['address'];

		$pdf=$_FILES['pdf']['name'];
        $pdf_type=$_FILES['pdf']['type'];
        $pdf_size=$_FILES['pdf']['size'];
        $pdf_tem_loc=$_FILES['pdf']['tmp_name'];
        $pdf_store="pdf/".$pdf;

		

		if(!empty($user_name) &&!empty($email) && !empty($phone)  && !empty ($course) && !empty ($bday) && !empty ($address) && !empty($pdf) && !is_numeric($user_name))
		{

			//save to database
			$query = "insert into students (name,email,phone,course,Dateofbirth,address,cv) values ('$user_name','$email','$phone','$course','$bday','$address','$pdf')";

		 	mysqli_query($con, $query);

				
			header("Location: index.html");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

	<style type="text/css">
	
	body{
		background-image: linear-gradient(rgba(4,9,30,0.7),rgba(4,9,30,0.7)),url(The_Common_Wanderer_best_things_to_do_kandy-20.jpg);
	}

	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		margin-top: 3px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		margin-top: 25px;
		margin-left: 5rem;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#button:hover{
		background-color: blue;
	}

	#box{

		
		background-color:#fff3f3;
		z-index: 1;
		margin-top: 6rem;
		margin-left: 35rem;
		width: 300px;
		padding: 20px;
	}

	</style>

	<div id="box">
		
		<form method="post" enctype="multipart/form-data">
			
		<div style="font-size: 20px;margin: 10px;color: black;">Signup</div>

			<input id="text" type="text" placeholder="name" name="user_name"><br><br>
			<input id="text" type="email" placeholder="email" name="email"><br><br>
			<input id="text" type="number" placeholder="phone number" name="phone"><br><br>
			<select name="course" id="text">
				<option value="nvq_certificate_course">NVQ CERTIFICATE COURSES</option>
				<option value="diploma_course">DIPLOMA COURSE</option>
				<option value="training_course">TRAINING COURSE</option>
				
			</select> <br><br>
			<input id="text" type="varchar" placeholder="Date Of Birth" name="bday"><br><br>
			<input id="text" type="varchar" placeholder="Address" name="address"><br><br>

			<input type="file" name="pdf" id="text" placeholder="Upload CV">


			<input id="button" type="submit" value="Signup"><br><br>

		</form>
	</div>
</body>
</html>