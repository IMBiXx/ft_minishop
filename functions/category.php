<?php
// include("server.php");

function category_array_by_ID( $category_ID ){
	$mysqli = connect_db($GLOBALS['host'], $GLOBALS['user'], $GLOBALS['passwd'], $GLOBALS['database']);
	$query = 'SELECT * FROM ft_categories';
	if (!($result = mysqli_query($mysqli, $query))){
		echo 'Query error: ' . mysqli_error($mysqli) . "\n";
		return (NULL);
	}
	$column = array();
	while($row = mysqli_fetch_assoc($result)){
		if ($row["category_ID"] == $category_ID)
			$column = $row;
	}
	mysqli_close($mysqli);
	return ($column);
}

function category_array_by_name( $category_name ){
	$mysqli = connect_db($GLOBALS['host'], $GLOBALS['user'], $GLOBALS['passwd'], $GLOBALS['database']);
	$query = 'SELECT * FROM ft_categories';
	if (!($result = mysqli_query($mysqli, $query))){
		echo 'Query error: ' . mysqli_error($mysqli) . "\n";
		return (NULL);
	}
	$column = array();
	while($row = mysqli_fetch_assoc($result)){
		if ($row["category_name"] == $category_name)
			$column = $row;
	}
	mysqli_close($mysqli);
	return ($column);
}

function category_array_by_category_ID( $category_ID ){
	$mysqli = connect_db($GLOBALS['host'], $GLOBALS['user'], $GLOBALS['passwd'], $GLOBALS['database']);
	$query = 'SELECT * FROM ft_categories';
	if (!($result = mysqli_query($mysqli, $query))){
		echo 'Query error: ' . mysqli_error($mysqli) . "\n";
		return (NULL);
	}
	$column = array();
	while($row = mysqli_fetch_assoc($result)){
		if ($row["category_ID"] == $category_ID)
			$column[] = $row;
	}
	mysqli_close($mysqli);
	return ($column);
}

function category_array_by_price( $lower, $upper ){
	$mysqli = connect_db($GLOBALS['host'], $GLOBALS['user'], $GLOBALS['passwd'], $GLOBALS['database']);
	if ($lower > $upper)
	{
		echo "Warning: $lower is 'lower' price and $upper is 'upper' price\n";
		return (NULL);
	}
	$query = 'SELECT * FROM ft_categories ORDER BY category_price DESC';
	if (!($result = mysqli_query($mysqli, $query))){
		echo 'Query error: ' . mysqli_error($mysqli) . "\n";
		return (NULL);
	}
	$column = array();
	while($row = mysqli_fetch_assoc($result)){
		if ($row["category_price"] <= $upper && $row["category_price"] >= $lower){
			$column[] = $row;
		}
	}
	mysqli_close($mysqli);
	return ($column);
}

?>
