<?php
include("server.php");

function product_array_by_ID( $product_ID ){
	$mysqli = connect_db($GLOBALS['host'], $GLOBALS['user'], $GLOBALS['passwd'], $GLOBALS['database']);
	$query = 'SELECT * FROM ft_products';
	if (!($result = mysqli_query($mysqli, $query))){
		echo 'Query error: ' . mysqli_error($mysqli) . "\n";
		mysqli_close($mysqli);
		return (NULL);
	}
	$column = array();
	while($row = mysqli_fetch_assoc($result)){
		if ($row["product_ID"] == $product_ID)
			$column = $row;
	}
	mysqli_close($mysqli);
	return ($column);
}

function product_array_by_name( $product_name ){
	$mysqli = connect_db($GLOBALS['host'], $GLOBALS['user'], $GLOBALS['passwd'], $GLOBALS['database']);
	$query = 'SELECT * FROM ft_products';
	if (!($result = mysqli_query($mysqli, $query))){
		echo 'Query error: ' . mysqli_error($mysqli) . "\n";
		mysqli_close($mysqli);
		return (NULL);
	}
	$column = array();
	while($row = mysqli_fetch_assoc($result)){
		if ($row["product_name"] == $product_name)
			$column = $row;
	}
	mysqli_close($mysqli);
	return ($column);
}

function product_array_by_category_ID( $category_ID ){
	$mysqli = connect_db($GLOBALS['host'], $GLOBALS['user'], $GLOBALS['passwd'], $GLOBALS['database']);
	$query = 'SELECT * FROM ft_products';
	if (!($result = mysqli_query($mysqli, $query))){
		echo 'Query error: ' . mysqli_error($mysqli) . "\n";
		mysqli_close($mysqli);
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

function product_array_by_price( $lower, $upper ){
	$mysqli = connect_db($GLOBALS['host'], $GLOBALS['user'], $GLOBALS['passwd'], $GLOBALS['database']);
	if ($lower > $upper)
	{
		echo "Warning: $lower is 'lower' price and $upper is 'upper' price\n";
		mysqli_close($mysqli);
		return (NULL);
	}
	$query = 'SELECT * FROM ft_products ORDER BY product_price DESC';
	if (!($result = mysqli_query($mysqli, $query))){
		echo 'Query error: ' . mysqli_error($mysqli) . "\n";
		mysqli_close($mysqli);
		return (NULL);
	}
	$column = array();
	while($row = mysqli_fetch_assoc($result)){
		if ($row["product_price"] <= $upper && $row["product_price"] >= $lower){
			$column[] = $row;
		}
	}
	mysqli_close($mysqli);
	return ($column);
}

?>
