<div>
    <?php
    require "./components/Producto.php";
    require_once "./utilities/readJsonFile.php";
    $data = readJsonFile('productos.json')['productos'];
    //agregar aleatorizacion
    shuffle($data);
    $interesantes = array_slice($data, 0, 4);
    ?>
    <div class="row">
        <?php foreach ($interesantes as $key => $producto): ?>
            <div class="col-3">
                <?= Producto($producto) ?>
            </div>
        <?php endforeach ?>
    </div>
</div>