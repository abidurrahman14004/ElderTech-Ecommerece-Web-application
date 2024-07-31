<?
include 'cart.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Medicine Online</title>
    <link rel="stylesheet" href="medicin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="footer.css">

</head>
<body>
<?php include_once('nav.php'); ?>

<main>
    <div class="sidebar">
        <h2>Categories</h2>
        <input type="text" id="search-bar" placeholder="Search...">
        <button id="search-button">Search</button>
        <ul>
            <li><a href="#" data-category="all">All Medicines</a></li>
            <li><a href="#" data-category="otc-medicine">OTC Medicine</a></li>
            <li><a href="#" data-category="womens-choice">Women's Choice</a></li>
            <li><a href="#" data-category="diabetic-care">Diabetic Care</a></li>
            <li><a href="#" data-category="baby-care">Baby Care</a></li>
            <li><a href="#" data-category="dental-care">Dental Care</a></li>
            <li><a href="#" data-category="supplement">Supplement</a></li>
        </ul>
    </div>
    <div class="content">
        <h1 id="category-title">All Medicines</h1>
        <div class="products" id="products"></div>
    </div>
    <div class="cart-icon-container">
        <img src="images/cart.jpg" id="cart-button" class="cart-icon" alt="Cart">
    </div>
    <div class="cart-sidebar" id="cart-sidebar">
        <div class="cart-header">
            <h2>Shopping Cart</h2>
            <button class="close-cart" id="close-cart">&times;</button>
        </div>
        <div class="cart-items" id="cart-items">
            <!-- Cart items will be dynamically added here -->
        </div>
        <div class="cart-footer">
            <h3>Total: <span id="cart-total">0.00</span></h3>
            <button class="clear-cart" id="clear-cart">Clear Cart</button>
            <button class="buy-now">Buy Now</button>
        </div>
    </div>
</main>
<footer>
    <?php include_once('footer.php'); ?>
</footer>
<script src="filter.js"></script>
<script src="cart.js"></script>
</body>
</html>
