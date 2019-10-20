<?php
// include('server.php');

// USER CREATION / DELETION

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

// USER DATABASE VERIFICATIONS

function verify_current_user(){
	// print_r($_SESSION);
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
	// print_r($_SESSION);
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

function verify_product_quantity( $product_ID, $product_quantity ){
	$mysqli = connect_db($GLOBALS['host'], 'root', 'toto', $GLOBALS['database']);
	$query = 'SELECT product_ID, product_stock FROM ft_products';
	if (!($result = mysqli_query($mysqli, $query))){
		echo 'Query error: ' . mysqli_error($mysqli) . "\n";
		mysqli_close($mysqli);
		return false;
	}
	while($row = mysqli_fetch_assoc($result)){
		if ($row['ID'] == $product_ID){
			if ($row['product_quantity'] >= $product_quantity){
				mysqli_close($mysqli);
				return true;
			}
			else
				mysqli_close($mysqli);
				return false;
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

function reset_cart(){
	for($tmp = 1; $_SESSION['cart'][$tmp]; $tmp += 1){
		unset($_SESSION['cart'][$tmp]);
	}
	$_SESSION['cart'][0] = 0;
}

?>
