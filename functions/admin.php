<?php
// include('server.php');

// DATABASE USER CREATION / DELETION

function add_user_to_db( $login, $passwd, $database ){
	$mysqli = connect_db($GLOBALS['host'], 'root', 'toto', $database);
	$query = "CREATE USER ".$login."@localhost IDENTIFIED BY '".$passwd."';";
	$query .= "GRANT SELECT ON ".$database.".ft_products TO ".$login."@localhost;";
	$query .= "GRANT SELECT ON ".$database.".ft_orders TO ".$login."@localhost;";
	$query .= "GRANT SELECT ON ".$database.".ft_orderdetails TO ".$login."@localhost;";
	if (!($result = mysqli_multi_query($mysqli, $query))){
		echo 'Query error: ' . mysqli_error($mysqli) . "\n";
		mysqli_close($mysqli);
		return false;
	}
	mysqli_close($mysqli);
	return true;
}

function del_user_from_db( $login, $database ){
	$mysqli = connect_db($GLOBALS['host'], 'root', 'toto', $database);
	$query = "DROP USER ".$login."@localhost;";
	$query .= "DELETE FROM mysql.user WHERE user = "."'".$login."';";
	$query .= "FLUSH PRIVILEGES;";
	if (!($result = mysqli_multi_query($mysqli, $query))){
		echo 'Query error: ' . mysqli_error($mysqli) . "\n";
		mysqli_close($mysqli);
		return false;
	}
	mysqli_close($mysqli);
	return true;
}

// USER TABLE

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
		if ($row["user_email"] == $user_name)
			$column = $row;
	}
	mysqli_close($mysqli);
	return ($column);
}

// USER DATABASE VERIFICATIONS

function verify_current_user(){
	$mysqli = connect_db($GLOBALS['host'], 'root', 'toto', $GLOBALS['database']);
	$query = 'SELECT * FROM ft_users';
	if (!($result = mysqli_query($mysqli, $query))){
		echo 'Query error: ' . mysqli_error($mysqli) . "\n";
		mysqli_close($mysqli);
		return false;
	}
	while($row = mysqli_fetch_assoc($result)){
		if ($row["user_email"] == $_SESSION['username'])
		mysqli_close($mysqli);
		return true;
	}
	mysqli_close($mysqli);
	return false;
}

function verify_current_user_ID( $user_ID ){
	$mysqli = connect_db($GLOBALS['host'], 'root', 'toto', $GLOBALS['database']);
	$query = 'SELECT * FROM ft_users';
	if (!($result = mysqli_query($mysqli, $query))){
		echo 'Query error: ' . mysqli_error($mysqli) . "\n";
		mysqli_close($mysqli);
		return false;
	}
	while($row = mysqli_fetch_assoc($result)){
		if ($row["user_email"] == $_SESSION['username']){
			if ($row['ID'] == $user_ID){
				mysqli_close($mysqli);
				return true;
			}
		}
	}
	mysqli_close($mysqli);
	return false;
}

function verify_product_quantity( $product_ID, $product_quantity ){
	$mysqli = connect_db($GLOBALS['host'], 'root', 'toto', $GLOBALS['database']);
	$query = 'SELECT product_ID, product_stock FROM ft_products';
	if (!($result = mysqli_query($mysqli, $query))){
		echo 'Query error: ' . mysqli_error($mysqli) . "\n";
		mysqli_close($mysqli);
		return false;
	}
	while($row = mysqli_fetch_assoc($result)){
		if ($row['product_ID'] == $product_ID){
			if ($row['product_stock'] >= $product_quantity){
				mysqli_close($mysqli);
				return true;
			}
			else{
				echo "Not enough stock\n";
				mysqli_close($mysqli);
				return false;
			}
		}
	}
	echo "Product not found\n";
	mysqli_close($mysqli);
	return false;
}

function update_product_quantity( $product_ID, $product_quantity, $product_name ){
	$mysqli = connect_db($GLOBALS['host'], 'root', 'toto', $GLOBALS['database']);
	$query = 'SELECT product_ID, product_stock FROM ft_products';
	if (!($result = mysqli_query($mysqli, $query))){
		echo 'Query error: ' . mysqli_error($mysqli) . "\n";
		mysqli_close($mysqli);
	}
	while($row = mysqli_fetch_assoc($result)){
		if ($row['ID'] == $product_ID){
			if ($row['product_quantity'] >= $product_quantity){
				$new_stock = $row['product_quantity'] - $product_quantity;
				$query2 = 'UPDATE ft_products SET product_stock="'.$new_stock.'" WHERE product_ID='.$product_ID;
				if (!($result2 = mysqli_query($mysqli, $query2))){
					echo 'Query error: ' . mysqli_error($mysqli) . "\n";
					mysqli_close($mysqli);
				}
			}
			mysqli_close($mysqli);
		}
	}
	echo "Product not found\n";
	mysqli_close($mysqli);
}

function verify_current_user_order( $user_ID ){
	if (!verify_current_user_ID($user_ID)){
		echo "Wrong user ID\n";
		return false;
	}
	for ($tmp = 1; $_SESSION['cart'][$tmp] != NULL; $tmp += 1){
		if (!verify_product_quantity($_SESSION['cart'][$tmp]['product_ID'], $_SESSION['cart'][$tmp]['product_quantity'])){
			echo $_SESSION['cart'][$tmp]['product_name']." no more available\n";
			return false;
		}
	}
	for ($tmp = 1; $_SESSION['cart'][$tmp] != NULL; $tmp += 1){
		update_product_quantity($_SESSION['cart'][$tmp]['product_ID'], $_SESSION['cart'][$tmp]['product_quantity'], $_SESSION['cart'][$tmp]['product_name']);
	}
	reset_cart();
	return true;
}

// CART

function reset_cart(){
	unset($_SESSION['cart']);
	$_SESSION['cart'][0] = 0;
}

function update_current_user_cart( $product_ID, $product_quantity ){
	for ($tmp = 1; $_SESSION['cart'][$tmp] != NULL; $tmp += 1){
		if ($_SESSION['cart'][$tmp]['product_ID'] == $product_ID){
			if (verify_product_quantity($product_ID, intval($product_quantity + $_SESSION['cart'][$tmp]['product_quantity']))){
				$_SESSION['cart'][$tmp]['product_quantity'] = intval($product_quantity + $_SESSION['cart'][$tmp]['product_quantity']);
			}
			else
				return false;
		}
	}
	return true;
}

// ORDER

function user_orders_array( $user_ID ){
	$mysqli = connect_db($GLOBALS['host'], 'root', 'toto', $GLOBALS['database']);
	$query = 'SELECT * FROM ft_orders';
	if (!($result = mysqli_query($mysqli, $query))){
		echo 'Query error: ' . mysqli_error($mysqli) . "\n";
		mysqli_close($mysqli);
		return (NULL);
	}
	$column = array();
	while($row = mysqli_fetch_assoc($result)){
		if ($row["user_ID"] == $user_ID)
			$column[] = $row;
	}
	mysqli_close($mysqli);
	return ($column);
}

function user_order_details_array( $order_ID ){
	$mysqli = connect_db($GLOBALS['host'], 'root', 'toto', $GLOBALS['database']);
	$query = 'SELECT * FROM ft_orderdetails';
	if (!($result = mysqli_query($mysqli, $query))){
		echo 'Query error: ' . mysqli_error($mysqli) . "\n";
		mysqli_close($mysqli);
		return (NULL);
	}
	$column = array();
	while($row = mysqli_fetch_assoc($result)){
		if ($row["order_ID"] == $order_ID)
			array_push($column, $row);
	}
	mysqli_close($mysqli);
	return ($column);
}

?>
