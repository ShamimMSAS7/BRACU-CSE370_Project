<html>

<head>
	
	<title>shommanito admingon</title>
	<link href="css/inside.css" rel="stylesheet"/>

</head>

<body>

	<!--catching the username as id for shwoing in the navigation bar -->
	<?php
	$r = (isset($_GET['id']) ? $_GET['id']:'');
	?>
	
	<div class="nav" >
		<a class="navl" href="admin.php?id=<?php echo $r; ?>"> Home </a> 
		<a class="navl" href="exams.php?id=<?php echo $r; ?>"> Exams </a>  
		<a class="navl" href="show_admins.php?id=<?php echo $r; ?>"> Admins </a> 
		<a class="navl" href="show_students.php?id=<?php echo $r; ?>"> Students </a> 
		<a class="navr" href="index.php"> Log Out </a> 
		<b class="navm"><?php echo $r; ?></b>
	</div>
	
	<div style="text-align: center"><h1> All of you are Admins </h1> </div>
	
	<!--creating table for showing the values -->
	<table align="center">
		<tr>
			<th> Username</th>
			<th> First Name</th>
			<th> Last Name</th>
		</tr>

		<?php 

		//connecting to the database
		require_once("ConnectToDB.php");

		//selecting the datas for showing
		$sql = "SELECT User_Id, First_Name, Last_Name FROM admin";
		$result = mysqli_query($connection, $sql);
		if(mysqli_num_rows($result) > 0){

			//printing every row of $result
			while($row = mysqli_fetch_array($result)){
				?>

				<tr> 
					<td><?php echo $row[0]; ?></td> 
					<td><?php echo $row[1]; ?></td>
					<td><?php echo $row[2]; ?></td> 
				</tr>

				<?php 
			}					
		}
		?>

	</table>
	
</body>

</html>