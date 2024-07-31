<?php
require 'connection.php';

// Get the raw POST data
$data = json_decode(file_get_contents('php://input'), true);

// Check if the ID is provided
if (isset($data['id'])) {
    $orderId = $data['id'];
    $query = "UPDATE orders SET status='deployed' WHERE id=?";

    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $orderId);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Order deployed successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update order status.']);
    }

    $stmt->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Order ID not provided.']);
}

$con->close();
?>
