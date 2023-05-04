<html>

<head>

	<title>Sign In</title>
	<link href="css/opening.css" rel="stylesheet"/>

</head>

<body >

	<h1 style=" padding-top: 40px; padding-bottom: 20px; color:black"><b>Please sign in first</b></h1>
	
	<!--creating form-->
	<form action="" method="post">
		<h4 style="color:black"><b>Username</b></h4>
		<input class="box" type="text" name="userid"> <br/>
		<h4 style="color:black"><b>Password</b></h4>
		<input class="box" type="password" name="pass"> <br/> <br/>
		<input class="submit" type="submit" value="Sign In">
	</form>

	<?php

	//connecting to the database
	require_once("ConnectToDB.php");
	$userid = (isset($_POST['userid']) ? $_POST['userid']:'');
	$pass = (isset($_POST['pass']) ? $_POST['pass']:'');

    //checking if every text fields are not empty
	if($userid!="" && $pass!=""){
		$adminsql="SELECT * FROM admin WHERE User_Id = '$userid' AND Password = '$pass'";
		$studentsql="SELECT * FROM student WHERE User_Id = '$userid' AND Password = '$pass'";

		//checking if the datas are in the admin table of the database or not and retrieving them
		$admin=mysqli_query($connection, $adminsql);

		//checking if the datas are in the student table of the database or not and retrieving them
		$student=mysqli_query($connection,$studentsql);

		//checking if the sql returns any row or not
		if(mysqli_num_rows($admin) !=0 ){

			//He/She is an admin
			header("Location:admin.php?id=".$userid);
		}
		else if((mysqli_num_rows($student) !=0 )){

			//He/She is a student
			header("Location:student.php?id=".$userid);
		}
		else{
			?>

			<h3 style=" padding-top: 10px; color:red;"><b>Username or Password is incorrect</b></h3>

			<?php
		}
	} 
	?>

	<br/>
	<h2 style="padding-top: 10px; color:black"><b>Don't have any account?</b></h2>
	<a href="student_registration.php">Sign Up</a> 

</body>

</html>

