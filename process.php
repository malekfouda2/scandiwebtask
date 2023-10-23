<?php
require_once('connect.php');
require_once('product.php');
require_once('Dvd.php');
require_once('Book.php');
require_once('Furniture.php');
var_dump($_POST);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sku = $_POST['sku'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $type = $_POST['type'];

    switch ($type) {
        case "dvd":
            $size = $_POST['size'];
            $product = new Dvd($sku, $name, $price, $size);
            break;
        case "book":
            $weight = $_POST['weight'];
            $product = new Book($sku, $name, $price, $weight);
            break;
        case "furniture":
            $length = $_POST['length'];
            $width = $_POST['width'];
            $height = $_POST['height'];
            $product = new Furniture($sku, $name, $price, $length, $width, $height);
            break;
        default:
            die("Invalid product type");
    }

    $productId = $product->insertProduct($conn);

    if ($product instanceof Dvd) {
        $product->insertDvdSpecificData($conn, $productId);
    } elseif ($product instanceof Book) {
        $product->insertBookSpecificData($conn, $productId);
    } elseif ($product instanceof Furniture) {
        $product->insertFurnitureSpecificData($conn, $productId);
    }
}
