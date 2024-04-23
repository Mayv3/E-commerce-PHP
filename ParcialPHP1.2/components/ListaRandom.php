<?php
    require_once "./utilities/readJsonFile.php";
    
    $data = readJsonFile('productos.json');
    shuffle($data); //desordena el array para generar aleatoriedad
    $interesantes = array_slice($data, 0, 4);
    ?>
    <div class="row">
        <?php foreach ($interesantes as $key => $producto): ?>
            <div class="col-3">
                <?php
                echo $producto->render();
                ?>
            </div>
        <?php endforeach ?>
    </div>
</div>