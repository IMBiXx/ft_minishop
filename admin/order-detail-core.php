<section class="order_part padding_top">
    <div class="container">
      <div class="row">
        <div class="col-large-6 col-lx-4">
          <div class="single_order_details">
            <h4>Informations sur la commande</h4>
            <ul>
              <li>
                <p>№ commande</p><span> : <?php echo $_GET['id'];?></span>
              </li>
              <li>
                <p>Date</p><span> : <?php echo $order['order_date'];?></span>
              </li>
              <li>
                <p>Total</p><span>: <?php echo $order['order_total']." €";?></span>
              </li>
            </ul>
          </div>
        </div>
        
      </div>
      <div class="row">
        <div class="col-large-12">
          <div class="order_details_iner">
            <h3>Détail de la commande</h3>
            <table class="table table-borderless">
              <thead>
                <tr>
                  <th scope="col" colspan="2">Produit(s)</th>
                  <th scope="col">Quantité</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php
                  foreach ($order_details as $elem) {
                    $product = product_array_by_ID($elem['product_ID']);
                    echo '<tr><th colspan="2"><a href="../product.php?id='.$product['product_ID'].'"><img src="../'.$product['product_image'].'"><span>'.$product['product_name'].'</span></a></th>
                      <th>'.$elem['product_quantity'].'</th>
                      <th> <span>'.$elem['product_total'].' €</span></th></tr>';
                }
                    ?>
              </tbody>
              <tfoot>
                <tr>
                  <th colspan="3">Total</th>
                  <th> <span><?php echo $order['order_total']." €";?></span></th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>