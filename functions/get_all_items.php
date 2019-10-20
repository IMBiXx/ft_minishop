<?php
function get_all_categories() {
    $i = 1;
    while (($category = category_array_by_ID($i))){
        $categories[] = $category;
        $i++;
    }
    return ($categories);
}

?>