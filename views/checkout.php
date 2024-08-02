<div class="container mt-5">
    <div class="alert alert-success" role="alert">
        <h1 class="alert-heading">¡Compra Completa!</h1>
        <p class="text-dark">Tu compra ha sido procesada exitosamente. Gracias por tu compra.</p>
        <hr>
        <p class="mb-0 text-dark">Tu número de compra es:
            <strong><?php echo $_GET['purchase_id']; ?></strong>
        </p>
    </div>
    <a href="index.php?section=profile-user" class="btn mt-3">Ver en Compras</a>
</div>