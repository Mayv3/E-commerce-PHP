<?php
require_once './class/categories.php';

$categoriesInstance = new Categories();

$categories = $categoriesInstance->all_categories();
?>

<main class="container w-50">
    <section>
        <h1 class="mb-1">Publicar un nuevo producto</h1>
        <form action="actions/addProduct.php" method="post">
            <div class="pb-3">
                <label for="title">Titulo</label>
                <input type="text" id="tittle" name="titulo" class="form-control">
            </div>
            <div class="pb-3">
                <label for="price">Precio (en dolares)</label>
                <input type="number" id="price" name="price" class="form-control">
            </div>
            <div class="pb-3">
                <label for="description">Descripcion corta</label>
                <input type="text" id="description" name="description" class="form-control">
            </div>
            <div class="d-flex gap-4">
                <div class="pb-3">
                    <label for="image">Imagen</label>
                    <input type="file" id="image" name="image" class="form-control">
                </div>
                <div class="pb-3">
                    <label for="category">Categoria</label>
                    <select name="category" id="category" class="form-control">
                        <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category->get_id_category(); ?>">
                                <?php echo $category->get_category_name(); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div>
                <label for="detail">Detalle</label>
                <textarea id="detail" name="detail" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary border-0">Publicar</button>
        </form>
    </section>
</main>