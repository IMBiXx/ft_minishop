<?php

function user_array_by_name( $user_name ){
	$mysqli = connect_db($GLOBALS['host'], 'root', 'toto', $GLOBALS['database']);
	$query = 'SELECT * FROM ft_users';
	if (!($result = mysqli_query($mysqli, $query))){
		echo 'Query error: ' . mysqli_error($mysqli) . "\n";
		mysqli_close($mysqli);
		return (NULL);
	}
	$column = array();
	while($row = mysqli_fetch_assoc($result)){
		if ($row["user_name"] == $user_name)
			$column = $row;
	}
	mysqli_close($mysqli);
	return ($column);
}

?>
