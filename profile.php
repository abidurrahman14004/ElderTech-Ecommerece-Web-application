
<?php
session_start();
include 'connection.php'; 
include 'functions.php';

// Check if the user is logged in
if (!isset($_SESSION['email']) || !isset($_SESSION['name'])) {
    header("Location: login.php");
    exit();
}

$name = $_SESSION['name'];
$email = $_SESSION['email'];
$image = $_SESSION['image'];




// Debugging: Verify database connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$query = "SELECT item, price, quantity FROM registration WHERE user_name = ?";
$stmt = $con->prepare($query);

// Check if the statement was prepared correctly
if (!$stmt) {
    die("Prepare failed: " . $con->error);
}

// Debugging: Verify parameter binding
if (!$stmt->bind_param('s', $name)) {
    die("Binding parameters failed: " . $stmt->error);
}

// Debugging: Verify statement execution
if (!$stmt->execute()) {
    die("Execute failed: " . $stmt->error);
}

$result = $stmt->get_result();

// Check if the query was executed correctly
if (!$result) {
    die("Getting result set failed: " . $stmt->error);
}

// Debugging: Check if there are rows returned
// if ($result->num_rows === 0) {
//     echo "No items found for the user.<br>";
// } else {
//     echo "Items found: " . $result->num_rows . "<br>";
// }

// Fetch raw data and debug it
$rawData = $result->fetch_all();

// Convert to associative array
$result->data_seek(0);  // Reset result pointer
$shoppingList = $result->fetch_all(MYSQLI_ASSOC);

// Debugging: Output the fetched data

$stmt->close();
$con->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="profile.css">
</head>
<body>
<div class="profile-container">
    <h1>User Profile</h1>
    <div class="profile-image"> 
        <img src="./uploads/<?php echo htmlspecialchars($image); ?>" class="user-profile-img" alt="User Image">
    </div>
    <p><strong>Name:</strong> <?php echo htmlspecialchars($name); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
    <h2>Shopping List</h2>
    <?php if (count($shoppingList) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($shoppingList as $items): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($items['item']); ?></td>
                        <td>৳<?php echo htmlspecialchars($items['price']); ?></td>
                        <td><?php echo htmlspecialchars($items['quantity']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No items purchased yet.</p>
    <?php endif; ?>
</div>
</body>
</html>
