<section class="order_list_part padding_top">
    <div class="container">
      <div class="row">
        <div class="col-large-12">
          <div class="order_details_iner">
            <h3>Liste des produits</h3>
            <table class="table table-borderless">
              <thead>
                <tr>
                  <th scope="col" colspan="2">#ID</th>
                  <th scope="col">Categorie</th>
                  <th scope="col">Image</th>
                  <th scope="col">Nom du produit</th>
                  <th scope="col">Description</th>
                  <th scope="col">Prix</th>
                  <th scope="col">Stock</th>
                </tr>
              </thead>
              <tbody>
              <?php
                foreach ($products as $category)
                {
                  foreach ($category as $product)
                  {
                    $cat_detail = category_array_by_ID($product['category_ID']);
                  echo '<tr>
                  <th colspan="2"><a href="single-product.php?id='.$product['product_ID'].'"><span>#'.$product['product_ID'].'</span></a></th>
                  <th><a href="single-category.php?id=1">(#'.$product['category_ID'].') '.$cat_detail['category_name'].'</a></th>
                  <th><img src="../'.$product['product_image'].'"></th>
                  <th>'.$product['product_name'].'</th>
                  <th>'.$product['product_description'].'</th>
                  <th> <span>'.$product['product_price'].' €</span></th>
                  <th>'.$product['product_stock'].'</th>
                </tr>';
              }
                }

                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>