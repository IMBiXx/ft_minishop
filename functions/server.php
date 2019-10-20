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

function register(){
	global $errors;
	if (($username = $_POST["email"]) == NULL){
		array_push($errors, "Username is required\n");
	}
	if (($password = hash('whirlpool', $_POST["password_1"])) == NULL){
		array_push($errors, "Password is required\n");
	}
	$confirm = hash('whirlpool', $_POST["password_2"]);
	if ($confirm == NULL || $confirm != $password){
		array_push($errors, "You must confirm your password\n");
	}
	$first_name = $_POST["first_name"];
	$name = $_POST["name"];
	echo $first_name;
	if (!(add_user_to_table($username, $password, $first_name, $name)))
		array_push($errors, "User already exists\n");
	else
		echo("<script>location.href = 'login.php';</script>");
}

function log_in(){
	global $errors;
	if ($_SESSION['user'] != NULL)
		echo("<script>location.href = '../my-orders.php';</script>");
	if (($username = $_POST["email"]) == NULL){
		array_push($errors, "Username is required\n");
	}
	if (($password = hash('whirlpool', $_POST["password"])) == NULL){
		array_push($errors, "Password is required\n");
	}
	if (($user_data = user_array_by_name($username)) != NULL){
		if ($user_data['user_pass'] == $password){
			$_SESSION['user'] = $username;
			$_SESSION['user_ID'] = $user_data['ID'];
			if ($GLOBALS['cart'] != NULL){
				$_SESSION['cart'] = $GLOBALS['cart'];
			}
			echo("<script>location.href = '../index.php';</script>");
		}
		else
			array_push($errors, "Wrong Password\n");
	}
	else
		array_push($errors, "User not found\n");
}

function log_out(){
	global $errors;
	if (isset($_SESSION['user']) && isset($_SESSION['user_ID'])){
		session_destroy();
		unset($_SESSION['user']);
		unset($_SESSION['user_ID']);
		session_destroy();
		echo("<script>location.href = '../login.php';</script>");
	}
}

?>
