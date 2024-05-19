<?php

include_once('connection.php');

function test_input($data) {
	
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$username = $_POST["username"];
	$password = $_POST["senha"];
	$stmt = $conn->prepare("SELECT * FROM usuarios");
	$stmt->execute();
	$users = $stmt->fetchAll();

	$control = 0;

	foreach($users as $user) {
		
		$hashed_password = password_verify($password, $user['senha']);

		if(($user['username'] == $username) && 
			($hashed_password)) {
				$control = 1;
				header("location: home.html");				
		}
	}

	if ($control == 0) {
			echo "<script language='javascript'>";
			echo "alert('WRONG INFORMATION')";
			echo "</script>";
			die();
	}
}

?>
