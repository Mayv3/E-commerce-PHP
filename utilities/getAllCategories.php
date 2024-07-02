<?php
require_once __DIR__ . '/makeQuery.php';
function get_all_categories()
{
    $query = "SELECT id_category, category_name FROM categories";
    $categories = make_query($query);

    $categoryObjects = [];

    foreach ($categories as $category) {

        $categoryObj = new Category($category['id_category'], $category['category_name']);

        $categoryObjects[] = $categoryObj;
    }

    return $categoryObjects;
}