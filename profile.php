<?php
session_start();
include 'connection.php'; 
include 'functions.php';

// Check if the user is logged in
if (!isset($_SESSION['email']) || !isset($_SESSION['name']) || !isset($_SESSION['image'])) {
    header("Location: login.php");
    exit();
}

$name = $_SESSION['name'];
$email = $_SESSION['email'];
$image = $_SESSION['image'];

// Debugging: Display session variables
// Uncomment the below lines if needed for debugging
// echo "Name: " . $name;
// echo "Email: " . $email;
// echo "Image: " . $image;

$query = "SELECT item, price, quantity FROM registration WHERE user_name = ?";
$stmt = $con->prepare($query);

// Check if the statement was prepared correctly
if (!$stmt) {
    die("Prepare failed: " . $con->error);
}

$stmt->bind_param('s', $name);
$stmt->execute();
$result = $stmt->get_result();

// Check if the query was executed correctly
if (!$result) {
    die("Execute failed: " . $stmt->error);
}

$shoppingList = $result->fetch_all(MYSQLI_ASSOC);

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
