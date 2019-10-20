<?php 
$product_list = product_array_by_price(850, 3000);
$i = 0;
foreach ($product_list as $s_product)
    $i++;
if ($i < 3)
    $i = 3;
else if ($i % 3 == 0)
    $i = 3;
else
    $i = 4;
?>

<section class="product_list section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-large-12">
                <div class="section_tittle text-center">
                    <h2>Meilleures ventes</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-large-12">
                <div class="single_product_list">
                    <div class="row align-items-center justify-content-between">
                        <?php
                    foreach ($product_list as $s_product) {
                        $flex = 100 / $i;
                        echo '<div class="col-large-3" style="flex: 0 0 '.$flex.'%;max-width:'.$flex.'%;">
                        <div class="single_product_item">
                        <div class="item-details"><a href="product.php?id='.$s_product['product_ID'].'"><img src="'.$s_product['product_image'].'" alt=""></a></div>
                            <div class="single_product_text">
                                <a href="product.php?id='.$s_product['product_ID'].'"><h4>'.$s_product['product_name'].'</h4></a>
                                <h3>'.$s_product['product_price'].' €</h3>
                                <a href="#" class="add_cart">+ ajouter au panier</a>
                            </div>
                        </div>
                        </div>';
                    }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>