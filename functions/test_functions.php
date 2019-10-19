<?php

include("product.php");
include("server.php");

$mysqli = connect_db("localhost:3306", "root", "toto", "rush00");

// print_r(product_array_by_ID($mysqli, 2));
print_r(product_array_by_price($mysqli, 0, 899));

?>
