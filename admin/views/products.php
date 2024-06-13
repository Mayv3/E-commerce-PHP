<?php
require_once '../utilities/makeQuery.php';
require_once __DIR__ . '/../../models/Product.php';

#make query with join
$query = make_query('SELECT items.*, categories.category_name FROM items JOIN categories ON items.item_category = categories.id_category');

$products = [];

#converts all query into a 'Product' instance
foreach ($query as $key => $element) {

    $producto = new Product(
        $element['image_url'],
        $element['item_name'],
        $element['item_price'],
        $element['id_item'],
        $element['item_description'],
        $element['detail_item'],
        $element['category_name'],
    );

    $products[] = $producto;
}

?>

<main class="container">
    <section>
        <h1>Admintracion de Productos</h1>
        <div class="mb-1"><a href="index.php?section=newProduct">Agregar un producto nuevo</a></div>
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>PRECIO</th>
                    <th>DESCRIPCION</th>
                    <th>IMAGEN</th>
                    <th>CATEGORIA</th>
                    <th>DETALLE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($products as $product) {
                    echo '<tr>';
                    echo '<td class="text-center align-middle">' . $product->get_id() . '</td>';
                    echo '<td class="text-center align-middle">' . $product->get_name() . '</td>';
                    echo '<td class="text-center align-middle">$' . $product->get_price() . '</td>';
                    echo '<td class="text-center align-middle">' . $product->get_description() . '</td>';
                    echo '<td class="text-center align-middle"><img class="w-50 mx-auto d-block" src="' . $product->get_image() . '" alt="' . $product->get_name() . '"></td>';
                    echo '<td class="text-center align-middle">' . $product->get_category() . '</td>';
                    echo '<td class="text-center align-middle">' . $product->get_detail() . '</td>';
                    echo '</tr>';

                    ;
                }
                ?>
            </tbody>
        </table>
    </section>
</main>