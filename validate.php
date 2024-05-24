<?php

include_once('connection.php');

function test_input($data) {
	
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
// if(!isset($_GET['deslogar'])){

// 	$_GET['deslogar']='FALSE';
	

// 	//$converted_res = $res ? 'true' : 'false';
// }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	session_start();
	$username = $_POST["username"];
	$password = $_POST["senha"];
	$stmt = $conn->prepare("SELECT * FROM usuarios");
	$stmt->execute();
	$users = $stmt->fetchAll();

	$control = 0;

	foreach($users as $user) {
		
		$hashed_password = password_verify($password, $user['senha']);

		if(($user['username'] == $username) && 
			($hashed_password) && $_GET['deslogar']=="FALSE") {
				$control = 1;
				$_SESSION["usuario logado"] = $username;
				header("location: home.php");	

		} 

	if ($control == 0) {
			session_destroy();
			header("location: index.php?falhou=true");
			//echo "<script language='javascript'>";
			//echo "alert('WRONG INFORMATION')";
			//echo "</script>";
			
	}
}
}

?>