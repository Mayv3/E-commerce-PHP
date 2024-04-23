<?php
function Producto($producto) :string{
    return '<div class="col mb-5">
                <div class="card h-100">
                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                    <img class="card-img" src="' . $producto['imagen'] . '" alt="' . $producto['nombre'] . '">
                    <div class="card-body p-4">
                        <div class="text-center">
                            <h5 class="fw-bolder">' . $producto['nombre'] . '</h5>
                            <span class="text-muted text-decoration-line-through">' . ($producto['precio'] + 5) . '</span> ' . $producto['precio'] . '
                        </div>
                    </div>
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                    <div class="text-center"><a class="btn mt-auto" href="index.php?seccion=detalle&id_producto=' . $producto['id'] . '">Ver</a></div>
                    </div>
                </div>
            </div>';
}