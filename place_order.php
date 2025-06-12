<?php
session_start();
include 'config/config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$cart = $_SESSION['cart'] ?? [];

if (empty($cart)) {
    echo "<p>Your cart is empty. Cannot place order.</p>";
    exit();
}

foreach ($cart as $item_id) {
    $stmt = $pdo->prepare("INSERT INTO orders (user_id, item_id, order_date) VALUES (?, ?, NOW())");
    $stmt->execute([$user_id, $item_id]);
}


unset($_SESSION['cart']);

echo "<div style='padding: 20px; background-color: #d4edda; color: #155724; text-align: center; font-size: 18px;'>✅ Order placed successfully!</div>";
echo "<div style='text-align: center; margin-top: 20px;'>

        <a href='index.php' style='color: #2b3a67;'>Back to Home</a>
    </div>";
?>
