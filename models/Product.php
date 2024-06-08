<?php
class Product
{
    public $image;
    public $name;
    public $price;
    public $id;
    public $detail;
    public $description;

    public function __construct($image, $name, $price, $id, $description, $detail)
    {
        $this->image = $image;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->detail = $detail;
        $this->id = $id;
    }

    public function render()
    {
        return '
            <li class="col-lg-3 col-md-6 col-s-12">
                <div class="mb-5">
                    <div class="card h-100">
                        <div class="badge bg-dark text-white position-absolute">Sale</div>
                        <img class="card-img" src="' . $this->image . '" alt="' . $this->name . '">
                        <div class="card-body p-4">
                            <div class="text-center">
                                <h5 class="fw-bolder">' . $this->name . '</h5>
                                <span class="text-muted text-decoration-line-through">$' . ($this->price + 5) . '</span> $' . $this->price . '
                            </div>
                        </div>
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn mt-auto" href="index.php?section=detail&id_producto=' . $this->id . '">Ver</a></div>
                        </div>
                    </div>
                </div>
            </li>
        ';
    }
}
