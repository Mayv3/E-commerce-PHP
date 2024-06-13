<?php
class Category
{
    private int $id_category;
    private string $category_name;

    public function __construct($id_category, $category_name)
    {
        $this->id_category = $id_category;
        $this->category_name = $category_name;
    }

    public function get_id_category()
    {
        return $this->id_category;
    }

    public function get_category_name()
    {
        return $this->category_name;
    }
}