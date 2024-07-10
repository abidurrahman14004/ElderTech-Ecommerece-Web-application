<?php
session_start();
require 'connection.php'; 
include 'functions.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendMail($email, $subject, $message){
    require("PHPMailer/PHPMailer.php");
    require("PHPMailer/Exception.php");
    require("PHPMailer/SMTP.php");

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'sadikrahman397@gmail.com'; // replace with your email
        $mail->Password = 'biaj nkst fshp fmzn'; // replace with your email password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('sadikrahman397@gmail.com', 'ElderTech BD'); // replace with your email
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = nl2br($message); // Convert newlines to <br> for HTML emails

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Mail error: " . $mail->ErrorInfo);
        return false;
    }
}

$userEmail = $_SESSION['email'];
// Check if the session email is set
if (!isset($_SESSION['email'])) {
    echo json_encode(["status" => "error", "message" => "User email is not set in the session."]);
    exit;
}

$rawData = file_get_contents("php://input");
$cartItems = json_decode($rawData, true);

// Ensure cart items are received correctly


// Prepare and bind
$stmt = $con->prepare("INSERT INTO registration (item, price, quantity) VALUES (?, ?, ?)");
$stmt->bind_param("sdi", $item, $price, $quantity);

// Loop through the cart items and insert each one into the database
foreach ($cartItems as $items) {
    $item = $items['name'];
    $price = $items['price'];
    $quantity = $items['quantity'];
    $stmt->execute();
}

$stmt->close();
$con->close();

// Generate email content

$subject = "Your Purchase from ElderTech BD";
$message = "Thank you for your purchase! Here are the details of your order:\n\n";

foreach ($cartItems as $items) {
    $message .= "Item: " . $items['name'] . "\n";
    $message .= "Price: ৳" . $items['price'] . "\n";
    $message .= "Quantity: " . $items['quantity'] . "\n\n";
}

$totalPrice = array_reduce($cartItems, function ($sum, $item) {
    return $sum + ($item['price'] * $item['quantity']);
}, 0);

$message .= "Total: ৳" . $totalPrice;

sendMail($userEmail, $subject, $message);

echo json_encode(["status" => "success", "message" => "New records created successfully and email sent."]);
?>