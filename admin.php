<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders List</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
   
<main>
    <div class="container">
        <h1>Orders List</h1>
        <?php

        require 'connection.php';


        $query = "SELECT * FROM orders";
        $result = $con->query($query);

        // Check if there are any orders
        if ($result->num_rows > 0) {
            // Start the HTML table
            echo '<table>';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Order ID</th>';
            echo '<th>User Name</th>';
            echo '<th>Email</th>';
            echo '<th>Item</th>';
            echo '<th>Price</th>';
            echo '<th>Quantity</th>';
            echo '<th>Status</th>';
            echo '<th>Action</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            // Loop through each order and create a row in the table
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['user_name'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>' . $row['item'] . '</td>';
                echo '<td>৳' . $row['price'] . '</td>';
                echo '<td>' . $row['quantity'] . '</td>';
                echo '<td>' . $row['status'] . '</td>';
                echo '<td><button>Deploy</button></td>';
                echo '</tr>';
            }

            // End the HTML table
            echo '</tbody>';
            echo '</table>';
        } else {
            echo 'No orders found.';
        }

        // Close the database connection
        $con->close();
        ?>
    </div>
</main>
    <script src ='admin.js'></script>
</body>
</html>
