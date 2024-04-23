<?php
    require "./components/Producto.php";
    require_once "./utilities/readJsonFile.php";
    
    $data = readJsonFile('productos.json')['productos'];
    shuffle($data);
    $interesantes = array_slice($data, 0, 4);
    ?>
    <div class="row">
        <?php foreach ($interesantes as $key => $producto): ?>
            <div class="col-3">
                <?php
                $productoObj = new Producto($producto['imagen'], $producto['nombre'], $producto['precio'], $producto['id']);
                echo $productoObj->render();
                ?>
            </div>
        <?php endforeach ?>
    </div>
</div>