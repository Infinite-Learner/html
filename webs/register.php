<?php
	
	$server = "localhost";
	$user = "root";
	$pass = "";
	$db = "test";
	$conn = mysqli_connect($server , $user , $pass , $db);
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	pa
	$hs = password_hash($password, PASSWORD_DEFAULT); 
	if($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
	else{
	$sql = "INSERT INTO tb1 (name,password,email) VALUES ('$name','$password','$email')";
	$rs = mysqli_query($conn, $sql);
	if($rs)
	{
		echo "Contact Records Inserted";
	}
	}
?>