<?php
// include('admin.php');

function add_product_to_cart( $product_ID, $quantity ){
	$product = product_array_by_ID($product_ID);
	if ($product['product_stock'] < $quantity){
		echo "No more ".$product['product_name']." available\n";
		mysqli_close($mysqli);
		return false;
	}
	unset($product['category_ID'], $product['product_description'], $product['product_stock'], $product['product_image'], $product['product_color']);
	$product['product_quantity'] = $quantity;
	$_SESSION['cart'][] = $product;
	$_SESSION['cart'][0] += $product['product_price'] * $product['$product_quantity'];
}

function validate_cart( $user_ID ){
	if (!verify_current_user_order($user_ID))
		return false;
	return true;
}

// function get_user_order( $user_ID, $order_ID ){
	
// }

// function list_user_orders( $user_ID ){

// }

?>
