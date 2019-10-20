<section class="order_list_part padding_top">
    <div class="container">
      <div class="row">
        <div class="col-large-12">
          <div class="order_details_iner">
            <h3>Mon historique de commande</h3>
            <table class="table table-borderless">
              <thead>
                <tr>
                  <th scope="col" colspan="2">№ Commande</th>
                  <th scope="col">Date</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                foreach ($orders as $order) {
                        echo '<tr><th colspan="2"><a href="my-order.php?id='.$order['order_ID'].'"><span>'.$order['order_ID'].'</span></a></th>
                        <th>'.$order['order_date'].'</th>
                        <th> <span>'.$order['order_total'].' €</span></th></tr>';
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>