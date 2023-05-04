<?php

//connecting to the database
require_once("ConnectToDB.php");

//catching the variables that have been sent
//username of the student
$id = $_GET['id'];

//username of the admin
$user = $_GET['user'];

//query for deleting the student's data
$sql = "DELETE  FROM student WHERE User_Id='$id'";

//executing the query
$result = mysqli_query($connection, $sql);
if($result){ 
	header("Location:show_students.php?id=".$user); 
}
else{
	echo "Something went wrong. Student could not be deleted."; 
}
?>