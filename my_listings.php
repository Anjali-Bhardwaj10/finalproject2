<?php
include '../includes/header.php';
include '../config/config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: /auth/login.php");
    exit;
}

$stmt = $pdo->prepare("SELECT id, title, price FROM listings WHERE user_id = ?");
$stmt->execute([$_SESSION['user_id']]);
$listings = $stmt->fetchAll();
?>

<main>
    <h2>My Listings</h2>
    <div class="listing-grid">
        <?php foreach ($listings as $listing): ?>
            <div class="listing-card">
                <h3><?= sanitize($listing['title']) ?></h3>
                <p>₹<?= $listing['price'] ?></p>
                <a href="/market/view_item.php?id=<?= $listing['id'] ?>">View</a>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<?php include '../includes/footer.php'; ?>
