<?php

$GLOBALS['host'] = "localhost:3306";
$GLOBALS['user'] = "root";
$GLOBALS['passwd'] = "toto";
$GLOBALS['database'] = "rush00";

include("product.php");
include("server.php");

// print_r(product_array_by_ID(2));
print_r(product_array_by_price(0, 899));

?>
