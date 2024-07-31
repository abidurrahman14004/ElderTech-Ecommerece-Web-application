<?php
require 'connection.php';

$query = "SELECT * FROM orders";
$result = $con->query($query);

$orders = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $orders[] = $row;
    }
}

echo json_encode($orders);

$con->close();
?>
