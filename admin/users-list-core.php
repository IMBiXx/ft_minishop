<section class="order_list_part padding_top">
    <div class="container">
      <div class="row">
        <div class="col-large-12">
          <div class="order_details_iner">
            <h3>Liste des clients</h3>
            <table class="table table-borderless">
              <thead>
                <tr>
                  <th scope="col" colspan="2">#ID</th>
                  <th scope="col">Rang</th>
                  <th scope="col">E-mail</th>
                  <th scope="col">Prénom</th>
                  <th scope="col">Nom</th>
                  <th scope="col">Date d'inscription</th>
                </tr>
              </thead>
              <tbody>

              <?php
                foreach ($users as $user)
                {
                  if ($user['user_level'] == 1)
                    $grade = "Client";
                  else if ($user['user_level'] == 2)
                    $grade = "Administrateur";
                  echo '<tr>
                  <th colspan="2"><a href="single-user.php?id='.$user['ID'].'"><span>#'.$user['ID'].'</span></a></th>
                  <th>'.$grade.'</th>
                  <th>'.$user['user_email'].'</th>
                  <th>'.$user['user_firstname'].'</th>
                  <th>'.$user['user_name'].'</th>
                  <th>'.$user['user_registered'].'</th>
                </tr>';
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>