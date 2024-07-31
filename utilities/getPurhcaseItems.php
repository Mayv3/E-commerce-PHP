<?php
function get_purchase_items($id_purchase)
{
    $query = "
        SELECT 
            items.*,
            categories.category_name,
            purchase_item.item_quantity
        FROM 
            items
        INNER JOIN 
            purchase_item ON items.id_item = purchase_item.id_item
        INNER JOIN 
            categories ON items.item_category = categories.id_category
        WHERE 
            purchase_item.id_purchase = ?
    ";

    $response = make_query($query, [$id_purchase]);

    return $response;
}