<?php
include('backend/core/Database.class.php');
include('backend/core/Product.php');

$db = new Database;

if(isset($_POST['save']))
{
    $inputs = [
        'sku' => mysqli_real_escape_string($db->conn,$_POST['sku']),
        'name' => mysqli_real_escape_string($db->conn,$_POST['name']),
        'price' => mysqli_real_escape_string($db->conn,$_POST['price']),
        'type' => mysqli_real_escape_string($db->conn,$_POST['type']),
    ];

    $item = new Product;
    $result = $item->setProducts($inputs);
}