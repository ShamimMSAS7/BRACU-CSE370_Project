<?php 
	$serverName="localhost";
	$userName="root";
	$password="";
	$dbName="project";
	
	
	//creating connection
	$connection=new mysqli($serverName,$userName,$password);
	
	//checking the connection
	if($connection->connect_error){
		die("Connection Failed. ". $connection->connect_error);
	}
	else{
		mysqli_select_db($connection, $dbName);
	}
?>