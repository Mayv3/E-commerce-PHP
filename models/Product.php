<?php
class Product
{
    private $image;
    private $name;
    private $price;
    private $id;
    private $detail;
    private $description;

    private $category;
    public function __construct($image, $name, $price, $id, $description, $detail, $category)
    {
        $this->image = $image;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->detail = $detail;
        $this->id = $id;
        $this->category = $category;
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
                                <p class="fw-bolder text-dark fs-4">' . $this->name . '</p>
                                <span class="text-muted text-decoration-line-through">$' . ($this->price + 5) . '</span> $' . $this->price . '
                                <p class="text-dark fs-5"> Categoria: ' . $this->category . '</p>
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

    public function get_image()
    {
        return $this->image;
    }

    public function get_name()
    {
        return $this->name;
    }

    public function get_price()
    {
        return $this->price;
    }

    public function get_id()
    {
        return $this->id;
    }

    public function get_detail()
    {
        return $this->detail;
    }

    public function get_description()
    {
        return $this->description;
    }
    public function get_category()
    {
        return $this->category;
    }


}
