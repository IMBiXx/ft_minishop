<?php
function connect_db( $server, $user, $passwd, $database){
	$conn = mysqli_connect($server, $user, $passwd, $database);
	if (!$conn)
		die("Database connection failed: " . mysqli_connect_error());
	else
		echo "Connected successfully\n";
	return $conn;
}
?>
