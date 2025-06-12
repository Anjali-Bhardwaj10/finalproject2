<?php
include '../includes/header.php';
include '../config/config.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    echo "<p>Item not found.</p>";
    include '../includes/footer.php';
    exit;
}

$stmt = $pdo->prepare("SELECT listings.*, users.name FROM listings JOIN users ON listings.user_id = users.id WHERE listings.id = ?");
$stmt->execute([$id]);
$item = $stmt->fetch();

if (!$item) {
    echo "<p>Item not found.</p>";
} else {
?>
    <main>
        <h2><?= sanitize($item['title']) ?></h2>
        <p><strong>Price:</strong> ₹<?= $item['price'] ?></p>
        <p><strong>Seller:</strong> <?= sanitize($item['name']) ?></p>
        <p><strong>Description:</strong><br><?= nl2br(sanitize($item['description'])) ?></p>
    </main>
<?php } ?>

<?php include '../includes/footer.php'; ?>
