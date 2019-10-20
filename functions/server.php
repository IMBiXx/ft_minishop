<?php
$GLOBALS['host'] = "localhost:3306";
$GLOBALS['user'] = "root";
$GLOBALS['passwd'] = "toto";
$GLOBALS['database'] = "rush00";

function connect_db( $server, $user, $passwd, $database){
	$conn = mysqli_connect($server, $user, $passwd, $database);
	if (!$conn)
		die("Database connection failed: " . mysqli_connect_error());
	return $conn;
}

function log_in(){
	global $errors;
	if (($username = $_POST["email"]) == NULL){
		array_push($errors, "Username is required\n");
	}
	if (($password = hash('whirlpool', $_POST["password"])) == NULL){
		array_push($errors, "Password is required\n");
	}
	if (($user_data = user_array_by_name($username)) != NULL){
		if ($user_data['user_pass'] == $password){
			$_SESSION['user'] = $username;
			echo("<script>location.href = '../index.php';</script>");
		}
		else
			array_push($errors, "Wrong Password\n");
	}
	else
		array_push($errors, "User not found\n");
}

?>
