<?php
require_once __DIR__ . '/../../utilities/getAllCategories.php';
require_once __DIR__ . '/../../utilities/getProductById.php';

$id = $_GET['id']; //obtained by the url

$categories = get_all_categories();

$product = get_product_by_id($id);

if ($product == null):
    echo '<p class="error-text">ERROR: el producto que intenta editar no existe</p>';
    echo '<a class="btn" href="index.php">Volver a inicio</a>';
else:
    ?>
    <section class="px-5 py-5">
        <h1 class="mb-4 display-5">Editar un producto</h1>
        <form action='actions/editProduct.php?id=<?php echo $id ?>' method="post" enctype="multipart/form-data">
            <div class="pb-3">
                <label for="tittle" class="h5">Título<span class="small">(mínimo 5 caracteres)</span></label>
                <input type="text" id="tittle" name="tittle" class="form-control"
                    value="<?= $oldData['tittle'] ?? $product->get_name() ?>" aria-label="Título del producto"
                    aria-describedby="tittleHelp">
                <?php if (isset($errors['tittle'])): ?>
                    <p id="tittleHelp" class="text-danger"><?= $errors['tittle'] ?></p>
                <?php endif; ?>
            </div>
            <div class="pb-3">
                <label for="price" class="h5">Precio<span class="small">(en dólares) (mínimo 1) (máximo
                        300.000)</span></label>
                <input type="number" id="price" name="price" class="form-control"
                    value="<?= $oldData['price'] ?? $product->get_price() ?>" aria-label="Precio del producto"
                    aria-describedby="priceHelp">
                <?php if (isset($errors['price'])): ?>
                    <p id="priceHelp" class="text-danger"><?= $errors['price'] ?></p>
                <?php endif; ?>
            </div>
            <div class="pb-3">
                <label for="description" class="h5">Descripción corta<span class="small">(mínimo 10
                        caracteres)</span></label>
                <input type="text" id="description" name="description" class="form-control"
                    value="<?= $oldData['description'] ?? $product->get_description() ?>"
                    aria-label="Descripción corta del producto" aria-describedby="descriptionHelp">
                <?php if (isset($errors['description'])): ?>
                    <p id="descriptionHelp" class="text-danger"><?= $errors['description'] ?></p>
                <?php endif; ?>
            </div>
            <div class="d-flex gap-4 flex-column flex-lg-row">
                <div class="pb-3">
                    <label for="image" class="h5">Imagen</label>
                    <input type="file" id="image" name="image" class="form-control">
                </div>
                <div class="pb-3">
                    <label for="category" class="h5">Categoría<span class="small">(selecciona una categoría)</span></label>
                    <select name="category" id="category" class="form-control" value=<?php echo $product->get_category(); ?>>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= $category->get_id_category() ?>" <?= (isset($oldData['category']) && $oldData['category'] == $category->get_id_category()) || ($product->get_category() == $category->get_id_category()) ? 'selected' : null ?>>
                                <?php echo $category->get_category_name() ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (isset($errors['category'])): ?>
                        <p id="categoryHelp" class="text-danger"><?= $errors['category'] ?></p>
                    <?php endif; ?>
                </div>
            </div>

            <div>
                <label for="detail" class="h5">Detalle <span class="small">(mínimo 10 caracteres)</span></label>
                <textarea id="detail" name="detail" class="form-control" aria-label="Detalle del producto"
                    aria-describedby="detailHelp"><?= $oldData['detail'] ?? $product->get_detail() ?></textarea>
                <?php if (isset($errors['detail'])): ?>
                    <p id="detailHelp" class="text-danger"><?= $errors['detail'] ?></p>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn-warning w-100 rounded border-0 my-4">Editar</button>
        </form>
    </section>

<?php endif; ?>