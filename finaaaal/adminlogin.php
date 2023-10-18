<?php 

session_start();

	include("connection.php");



	if(isset($_POST['aid']))
	{

			$aid = $_POST['aid'];
			$pass = $_POST['password'];

			$sql="select * from admintb where Adminid='".$aid."'AND pw='".$pass."'  ";

			$result = mysqli_query($con,$sql);
		
			if(mysqli_num_rows($result)==1)
			{
				
				header("Location: index.php");
				die;
			
				

			}
		else
		{
			echo " You Have Entered Incorrect Password";
			exit();


		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Login</div>

			<input id="text" type="email" placeholder="Admin ID" name="aid"><br><br>
			<input id="text" type="password" placeholder="Password" name="password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			
		</form>
	</div>
</body>
</html>