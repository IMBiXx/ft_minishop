<?php

function product_array_by_ID( $sqli, $product_ID ){
	$query = 'SELECT * FROM ft_products';
	if (!($result = mysqli_query($sqli, $query))){
		echo 'Query error: ' . mysqli_error($sqli) . "\n";
		return (NULL);
	}
	$column = array();
	while($row = mysqli_fetch_assoc($result)){
		if ($row["category_ID"] == $product_ID)
			$column[] = $row;
	}
	return ($column);
}

function product_array_by_name( $sqli, $product_name ){
	$query = 'SELECT * FROM ft_products';
	if (!($result = mysqli_query($sqli, $query))){
		echo 'Query error: ' . mysqli_error($sqli) . "\n";
		return (NULL);
	}
	$column = array();
	while($row = mysqli_fetch_assoc($result)){
		if ($row["product_name"] == $product_name)
			$column[] = $row;
	}
	return ($column);
}

function product_array_by_price( $sqli, $lower, $upper){
	$query = 'SELECT * FROM ft_products ORDER BY product_price DESC';
	if (!($result = mysqli_query($sqli, $query))){
		echo 'Query error: ' . mysqli_error($sqli) . "\n";
		return (NULL);
	}
	$column = array();
	while($row = mysqli_fetch_assoc($result)){
		if ($row["product_price"] <= $upper && $row["product_price"] >= $lower){
			$column[] = $row;
		}
	}
	return ($column);
}

?>
