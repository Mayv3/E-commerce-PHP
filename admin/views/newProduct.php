<?php
require_once __DIR__ . '/../../utilities/getAllCategories.php';

$categories = get_all_categories();

$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);

$oldData = $_SESSION['old-data'] ?? [];
unset($_SESSION['old-data']);
?>

<section>
    <h1 class="mb-4 display-5">Publicar un nuevo producto</h1>
    <form action="actions/addProduct.php" method="post">
        <div class="pb-3">
            <label for="tittle" class="h5">Título <span class="small">(mínimo 5 caracteres)</span></label>
            <input type="text" id="tittle" name="tittle" class="form-control" value="<?= $oldData['tittle'] ?? '' ?>"
                aria-label="Título del producto" aria-describedby="tittleHelp">
            <?php if (isset($errors['tittle'])): ?>
                <p id="tittleHelp" class="text-danger"><?= $errors['tittle'] ?></p>
            <?php endif; ?>
        </div>
        <div class="pb-3">
            <label for="price" class="h5">Precio <span class="small">(en dólares) (mínimo 1) (máximo
                    300.000)</span></span></label>
            <input type="number" id="price" name="price" class="form-control" value="<?= $oldData['price'] ?? '' ?>"
                aria-label="Precio del producto" aria-describedby="priceHelp">
            <?php if (isset($errors['price'])): ?>
                <p id="priceHelp" class="text-danger"><?= $errors['price'] ?></p>
            <?php endif; ?>
        </div>
        <div class="pb-3">
            <label for="description" class="h5">Descripción corta <span class="small">(mínimo 10
                    caracteres)</span></label>
            <input type="text" id="description" name="description" class="form-control"
                value="<?= $oldData['description'] ?? '' ?>" aria-label="Descripción corta del producto"
                aria-describedby="descriptionHelp">
            <?php if (isset($errors['description'])): ?>
                <p id="descriptionHelp" class="text-danger"><?= $errors['description'] ?></p>
            <?php endif; ?>
        </div>
        <div class="d-flex gap-4">
            <div class="pb-3">
                <label for="image" class="h5">Imagen</label>
                <input type="file" id="image" name="image" class="form-control">
            </div>
            <div class="pb-3">
                <label for="category" class="h5">Categoría <span class="small">(selecciona una categoría)</span></label>
                <select name="category" id="category" class="form-control">
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category->get_id_category() ?>" <?= (isset($oldData['category']) && $oldData['category'] == $category->get_id_category()) ? 'selected' : null ?>>
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
                aria-describedby="detailHelp"><?= $oldData['detail'] ?? '' ?></textarea>
            <?php if (isset($errors['detail'])): ?>
                <p id="detailHelp" class="text-danger"><?= $errors['detail'] ?></p>
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary border-0 my-4">Publicar</button>
    </form>
</section>