<section class="order_list_part padding_top">
    <div class="container">
      <div class="row">
        <div class="col-large-12">
          <div class="order_details_iner">
            <h3>Liste des commandes</h3>
            <table class="table table-borderless">
              <thead>
                <tr>
                  <th scope="col" colspan="2">№ Commande</th>
                  <th scope="col">ID Client</th>
                  <th scope="col">Client</th>
                  <th scope="col">Date</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>
              <?php
                  foreach ($orders as $user)
                  {
                    foreach ($user as $order)
                    {
                      $user_detail = user_array_by_ID($order['user_ID']);
                  echo '<tr>
                  <th colspan="2"><a href="order-detail.php?id='.$order['order_ID'].'"><span>#'.$order['order_ID'].'</span></a></th>
                  <th><a href="single-user.php?id='.$order['user_ID'].'">'.$order['user_ID'].'</a></th>
                  <th>'.$user_detail['user_firstname'].' '.$user_detail['user_name'].'</th>
                  <th>'.$order['order_date'].'</th>
                  <th> <span>'.$order['order_total'].' €</span></th>
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