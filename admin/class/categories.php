<?php
require_once __DIR__ . '/../../connection.php';
class Categories
{
    protected int $id_category;
    protected string $category_name;

    /**
     * @return self[]
     */
    public function all_categories()
    {
        $query = "SELECT id_category, category_name FROM categories";
        $categories = make_query($query);

        $categoryObjects = [];
        foreach ($categories as $category) {
            $categoryObj = new self();
            $categoryObj->id_category = $category['id_category'];
            $categoryObj->category_name = $category['category_name'];
            $categoryObjects[] = $categoryObj;
        }

        return $categoryObjects;
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