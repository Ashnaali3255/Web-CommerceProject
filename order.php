<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Content-Type: application/json");

// Handle preflight request
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit(0);
}

include 'db.php';

// Get raw JSON
$json = file_get_contents("php://input");
$data = json_decode($json, true);

// Debug (optional)
// echo $json;

if (!is_array($data)) {
    echo json_encode(["error" => "Invalid data received"]);
    exit;
}

foreach ($data as $item) {
    $product_id = $item['id'];
    $quantity = 1;

    $conn->query("INSERT INTO orders (user_id, product_id, quantity) VALUES (1, $product_id, $quantity)");
}

echo json_encode(["message" => "Order saved"]);
?>