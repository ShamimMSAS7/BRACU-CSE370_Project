<html>
<head>

	<title> THE TITLE </title>
	<link href="css/opening.css" rel="stylesheet"/>

</head>

<body> 

	<h1 style=" padding-top: 10px; padding-bottom: 10px; text-align: center "><b>Please fill up all the fields</b></h1>

	<!--creating form-->
	<form action="" method="post">
		<table align="center">
			<tr>
				<td>
					<div style=" font-size:25; width: 200;">Username: </div>
				</td>
				<td >
					<input class="box" type="text" name="id">
				</td>
			</tr>
			<tr>
				<td>
					<div style=" font-size:25; width: 200;">First Name: </div>
				</td>
				<td >
					<input class="box" type="text" name="fname">
				</td>
			</tr>
			<tr>
				<td>
					<div style=" font-size:25; width: 200;">Last Name: </div>
				</td>
				<td >
					<input class="box" type="text" name="lname">
				</td>
			</tr>
			<tr>
				<td >
					<div style=" font-size:25; width: 200;">Password: </div>
				</td>
				<td >
					<input class="box" type="password" name="pass">
				</td>
			</tr>
			<tr>
				<td >
					<div style=" font-size:25; width: 200;">Confirm Password: </div>
				</td>
				<td >
					<input class="box" type="password" name="cpass">
				</td>
			</tr>
			
			<tr>
				<td></td>
				<td align="right">
					<input class="submit" type="submit" value="Sign Up">
				</td>
			</tr>

		</table>

		
	</form>
	<?php
	//connecting to the database
	require_once('ConnectToDB.php');

//catching the values and assigning into variables
	$u = (isset($_POST['id']) ? $_POST['id']:'');
	$f = (isset($_POST['fname']) ? $_POST['fname']:'');
	$l = (isset($_POST['lname']) ? $_POST['lname']:'');
	$p = (isset($_POST['pass']) ? $_POST['pass']:'');
	$cp = (isset($_POST['cpass']) ? $_POST['cpass']:'');

//checking if two passwords match or not
	if($p==$cp){

	//checking if none of the fiels are empty
		if($u!="" && $f!="" && $l!="" && $p!="" && $cp!=""){





			//queries for showing user id from student and admin table that matches with this username
			$has_this_id_in_student_sql="SELECT * FROM student WHERE User_Id = '$u'";
			$has_this_id_in_admin_sql="SELECT * FROM admin WHERE User_Id = '$u'";

  			//executing the queries
			$has_this_id_in_student=mysqli_query($connection,$has_this_id_in_student_sql);
			$has_this_id_in_admin=mysqli_query($connection,$has_this_id_in_admin_sql);

			//checking if the username is already in the database or not
			if(mysqli_num_rows($has_this_id_in_student) !=0 || mysqli_num_rows($has_this_id_in_admin) !=0){
				?>

				<h3 style=" text-align: center;color:red; "><b>Username has already been taken</b></h3>

				<?php
			} 
			else{

				//query for inserting the values
				$sql = " INSERT INTO student VALUES( '$u', '$f', '$l', '$p' ) ";

				//executing the query
				$result = mysqli_query($connection, $sql);

				//checking if this insertion is happening in the database
				if(mysqli_affected_rows($connection)){
					header("Location:student.php?id=".$u);
				}
				else{
					header("Location: student_registration.php");
				}
			}
		}
	}
	else{
		?>

		<h3 style=" text-align: center;color:red; "><b>Passwords don't match</b></h3>

		<?php
	}
	?>
	
	<br/>
	<h2 style=" color:black"><b>Already have an account?</b></h2>
	<a href="index.php">Sign In</a> 
	
</body>

</html>

