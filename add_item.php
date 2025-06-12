<?php
include '../includes/header.php';
include '../config/config.php';
include '../includes/functions.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: /auth/login.php");
    exit;
}

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = sanitize($_POST['title']);
    $description = sanitize($_POST['description']);
    $price = floatval($_POST['price']);

    $stmt = $pdo->prepare("INSERT INTO listings (user_id, title, description, price) VALUES (?, ?, ?, ?)");
    $stmt->execute([$_SESSION['user_id'], $title, $description, $price]);

    $message = "Item listed successfully!";
}
?>

<main>
    <h2>Add New Listing</h2>
    <form method="post">
        <input type="text" name="title" required placeholder="Item Title">
        <textarea name="description" required placeholder="Description"></textarea>
        <input type="number" step="0.01" name="price" required placeholder="Price (₹)">
        <button type="submit">Post Listing</button>
    </form>
    <p><?= $message ?></p>
</main>

<?php include '../includes/footer.php'; ?>
