<?php
require_once "./utilities/readJsonFile.php";

$data = readJsonFile('products.json');
shuffle($data); //desordena el array para generar aleatoriedad
$interesants = array_slice($data, 0, 4);
?>
<ul class="row list-unstyled">
    <?php foreach ($interesants as $key => $product): ?>
        <?php
        echo $product->render();
        ?>
    <?php endforeach ?>
</ul>
</div>