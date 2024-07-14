<?php
session_start();

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['pet_id']) || !isset($data['name'])) {
    echo json_encode(['status' => 'error', 'message' => 'Pet ID or Name not provided']);
    exit;
}

$_SESSION['pet_id'] = $data['pet_id'];
$_SESSION['pet_name'] = $data['pet_name'];

echo json_encode(['status' => 'success']);
?>
