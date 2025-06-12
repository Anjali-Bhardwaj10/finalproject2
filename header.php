<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Campus-Bazar</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <header>
        <h1><a href="/index.php">Campus-Bazar</a></h1>
        <nav>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="/user/add_item.php">Add Item</a>
                <a href="/user/my_listings.php">My Listings</a>
                <a href="/auth/logout.php">Logout</a>
            <?php else: ?>
                <a href="/auth/login.php">Login</a>
                <a href="/auth/register.php">Register</a>
            <?php endif; ?>
        </nav>
    </header>
