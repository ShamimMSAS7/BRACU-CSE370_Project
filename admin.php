<html>

<head>
	
	<title>Admin</title>
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
	
	
	<div style="padding: 50px; text-align: center">
		<h1> You are an Admin </h1> 
	</div>

</body> 

</html>