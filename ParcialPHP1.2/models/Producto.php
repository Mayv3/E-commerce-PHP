<?php
class Producto
{
    public $imagen;
    public $nombre;
    public $precio;
    public $id;
    public $detalle;
    public $descripcion;

    public function __construct($imagen, $nombre, $precio, $id, $descripcion,$detalle)
    {
        $this->imagen = $imagen;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->descripcion = $descripcion;
        $this->detalle= $detalle;
        $this->id = $id;
    }

    public function render()
    {
        return '<div class="col mb-5">
                    <div class="card h-100">
                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                        <img class="card-img" src="' . $this->imagen . '" alt="' . $this->nombre . '">
                        <div class="card-body p-4">
                            <div class="text-center">
                                <h5 class="fw-bolder">' . $this->nombre . '</h5>
                                <span class="text-muted text-decoration-line-through">' . ($this->precio + 5) . '</span> ' . $this->precio . '
                            </div>
                        </div>
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn mt-auto" href="index.php?seccion=detalle&id_producto=' . $this->id . '">Ver</a></div>
                        </div>
                    </div>
                </div>';
    }
}
