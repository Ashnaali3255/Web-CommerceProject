<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit(0);
}

include 'db.php';

$data = json_decode(file_get_contents("php://input"), true);

$name = $data['name'];
$price = $data['price'];
$image = $data['image'];

$conn->query("INSERT INTO products (name, price, image) VALUES ('$name', '$price', '$image')");

echo json_encode(["message" => "Product added"]);
?>