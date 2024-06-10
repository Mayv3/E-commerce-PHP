<?php
require_once "./utilities/getAllProducts.php";
#make fetch to db
$data = get_all_products();

shuffle($data); //randomize array
$interesants = array_slice($data, 0, 4); // subtracts an slice

?>
<ul class="row list-unstyled">
    <?php foreach ($interesants as $key => $product): ?>
        <?php
        echo $product->render();
        ?>
    <?php endforeach ?>
</ul>