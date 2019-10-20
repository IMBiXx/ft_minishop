<?php
function get_all_categories() {
    $i = 1;
    while (($category = category_array_by_ID($i))){
        $categories[] = $category;
        $i++;
    }
    return ($categories);
}

function get_all_products() {
    $i = 1;
    $categories = get_all_categories();
    foreach ($categories as $category) {
        $products[] = product_array_by_category_ID($category['category_ID']);
    }
    return ($products);
}

function get_all_users() {
    $i = 1;
    while (($user = user_array_by_ID($i))){
        $users[] = $user;
        $i++;
    }
    return ($users);
}

function get_all_orders() {
    $i = 1;
    $users = get_all_users();
    foreach ($users as $user)
        $orders[] = user_orders_array($user['ID']);
    return ($orders);
}

?>