<?php
$products = [
    ["id" => 1, "name" => "Product A", "stock" => 15, "sold" => 120],
    ["id" => 2, "name" => "Product B", "stock" => 0, "sold" => 150],
    ["id" => 3, "name" => "Product C", "stock" => 5, "sold" => 60],
    ["id" => 4, "name" => "Product D", "stock" => 20, "sold" => 30],
    ["id" => 5, "name" => "Product E", "stock" => 8, "sold" => 10],
    ["id" => 6, "name" => "Product F", "stock" => 0, "sold" => 200],
    ["id" => 7, "name" => "Product G", "stock" => 2, "sold" => 5]
];

function filter_products($products, $condition) {
    return array_filter($products, $condition);
}

$in_stock = filter_products($products, function($product) { return $product['stock'] > 0; });
$out_of_stock = filter_products($products, function($product) { return $product['stock'] == 0; });
$low_stock = filter_products($products, function($product) { return $product['stock'] > 0 && $product['stock'] < 10; });
$most_sold = array_slice(array_filter($products, function($product) { return $product['sold'] > 0; }), 0, 3);
$least_sold = array_slice(array_filter($products, function($product) { return $product['sold'] > 0; }), -3);
?>
