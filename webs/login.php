<?php
	
	$server = "localhost";
	$user = "root";
	$pass = "";
	$db = "test";
	$conn = mysqli_connect($server , $user , $pass , $db);
	$name = $_POST['name'];
	$password = $_POST['password'];
	$hs = password_hash($password, PASSWORD_DEFAULT);
	if($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	else{
	$db_pass = mysqli_query($conn, "select * from tb1 where name='$name' && password = '$hs'");
	while($rec_set = mysqli_fetch_assoc($db_pass)){
		echo "pass = ".$rec_set["password"];
		echo password_verify(password, $hs);
	}
	// if(isset($hs)&&password_verify($hs,$db_pass))
	// {
	// 	echo "<h1>Logged in Successfull <h1>";
	// }
	// else
	// {
	// 	echo "Invalid Credentials"; 
	// }
	 }
?>