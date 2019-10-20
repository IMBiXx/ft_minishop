<section class="order_list_part padding_top">
    <div class="container">
      <div class="row">
        <div class="col-large-12">
          <div class="order_details_iner">
            <h3>Liste des catégories</h3>
            <table class="table table-borderless">
              <thead>
                <tr>
                  <th scope="col" colspan="2">#ID</th>
                  <th scope="col">Nom</th>
                  <th scope="col">Description</th>
                  <th scope="col">Image</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($categories as $category)
                {
                  echo '<tr>
                  <th colspan="2"><a href="single-category.php?id='.$category['category_ID'].'"><span>'.$category['category_ID'].'</span></a></th>
                  <th>'.$category['category_name'].'</th>
                  <th>'.$category['category_description'].'</th>
                  <th><img src="../'.$category['category_image'].'"></th>
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