<?php
session_start();  
include 'config/config.php';
include 'includes/header.php';

if (!isset($_SESSION['user_id'])) {
    echo "<p>Please log in to view products and add them to the cart.</p>";
    exit();
}

$search = $_GET['search'] ?? '';

if (!empty($search)) {
    $stmt = $pdo->prepare("SELECT * FROM listings WHERE title LIKE ?");
    $stmt->execute(['%' . $search . '%']);
} else {
    $stmt = $pdo->query("SELECT * FROM listings ORDER BY id ASC LIMIT 20");
}
?>

<head>
    <title>Campus Bazar - Home</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #dff6ff;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            transition: background-color 1s; /* Smooth background color transition */
        }

        header {
            background-color: #2b3a67;
            padding: 15px;
            color: white;
            text-align: center;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            padding: 20px;
            background-color: #79BAEC;
        }

        .navbar a {
            text-decoration: none;
            color: white;
            font-size: 18px;
            padding: 12px 20px;
            border-radius: 6px;
            background-color: #2b3a67;
            margin-right: 15px;
            transition: background-color 1s;
        }

        .navbar a:hover {
            background-color: #4169e1;
        }

        main {
            display: flex;
            justify-content: space-between;
            padding: 20px;
            margin: 0 auto;
            max-width: 1200px;
            width: 100%;
            box-sizing: border-box;
        }

        .sidebar a {
            color: white;
            font-size: 18px;
            text-decoration: none;
            display: block;
            margin: 10px 0;
            padding: 10px;
            background-color: #4169e1;
            border-radius: 6px;
            transition: background-color 1s;
        }

        .sidebar a:hover {
            background-color: #2b3a67;
        }

        .content-area {
            flex: 1;
        }

        .search-form {
            margin-bottom: 20px;
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .search-form input[type="text"] {
            padding: 6px 10px;
            width: 200px;
            border-radius: 10px;
            border: 5px solid #ccc;
            font-size: 14px;
            transition: border-color 2s;
        }

        .search-form input[type="text"]:focus {
            border-color: #2b3a67;
        }

        .search-form button {
            padding: 6px 14px;
            background-color: #2b3a67;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 2s ease;
        }

        .search-form button:hover {
            background-color: #4169e1;
        }

        /* Updated grid to show 3 products per row */
        .listing-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* 3 columns */
            gap: 20px;
            margin-top: 20px;
            animation: fadeInGrid 2s ease-in-out;
        }

        /* Animation for grid appearance */
        @keyframes fadeInGrid {
            0% {
                opacity: 0;
                transform: translateY(50px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .listing-card {
            background-color: #79BAEC;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 2s ease, box-shadow 2s ease;
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        /* Hover effect: Pop-up scaling and shadow */
        .listing-card:hover {
            transform: translateY(-10px) scale(1.05);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
        }

        /* Add animation to image */
        .listing-card img {
            max-width: 100%;
            height: 180px;
            object-fit: contain;
            border-radius: 8px;
            background: #f9f9f9;
            transition: transform 2s ease-in-out;
        }

        .listing-card:hover img {
            transform: scale(1.1);
        }

        .listing-card h3 {
            margin: 10px 0;
            font-size: 18px;
            color: #123456;
        }

        .listing-card p {
            color: #123456;
            font-weight: bold;
        }

        .listing-card a,
        .listing-card form button {
            display: inline-block;
            padding: 8px 16px;
            background-color: #2b3a67;
            color: #fff;
            border-radius: 6px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            margin: 5px;
            transition: background-color 1s;
        }

        .listing-card a:hover,
        .listing-card form button:hover {
            background-color: #4169e1;
        }

        footer {
            background-color: #2b3a67;
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: 30px;
        }
    </style>
</head>

<body>
<header>
    <h1>Welcome to Campus Bazar</h1>
    <p>Your one-stop platform to buy and sell items for students</p>
</header>

<div class="navbar">
    <a href="index.php">Home</a>
    <a href="about.php">About Us</a>
    <a href="contact.php">Contact</a>
</div>

<main>
    <div class="content-area">
        <h2>Latest Listings</h2>

        <form method="get" class="search-form">
            <input type="text" name="search" placeholder="Search products..." value="<?= htmlspecialchars($search) ?>">
            <button type="submit">Search</button>
        </form>

        <div class="listing-grid">
            <?php while ($row = $stmt->fetch()): ?>
                <div class="listing-card">
                    <img src="upload/<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['title']) ?>">
                    <h3><?= htmlspecialchars($row['title']) ?></h3>
                    <p>₹<?= number_format($row['price'], 2) ?></p>
                    <a href="market/view_item.php?id=<?= $row['id'] ?>">View</a>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <a href="cart.php?add=<?= $row['id'] ?>">Add to Cart</a>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</main>

<footer>
    <p>&copy; 2025 Campus Bazar. All Rights Reserved.</p>
</footer>
</body>
</html>
