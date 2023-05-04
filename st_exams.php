<html>

<head>

	<title> Exams </title>
	<link href="css/inside.css" rel="stylesheet"/>
	
</head>

<body> 

	<!--catching the username as id for shwoing in the navigation bar -->
	<?php
	$r = (isset($_GET['id']) ? $_GET['id']:'');
	?>
	
	<div class="nav" >
		<a class="navl" href="student.php?id=<?php echo $r; ?>"> Home </a> 
		<a class="navl" href="st_exams.php?id=<?php echo $r; ?>"> Exams </a>  
		<a class="navr" href="index.php"> Log Out </a> 
		<b class="navm"><?php echo $r; ?></b>
	</div>
	
	<div style="padding: 50px; text-align: center">
		<h1> Exam List for Students </h1> 
	</div>

</body> 

</html>