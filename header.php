
        
      <?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Campus-Bazar</title>
    <link rel="stylesheet" href="assets/css/style.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        header {
            background-color: #2b3a67;
            color: white;
            padding: 20px;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 32px;
        }

        header h1 a {
            text-decoration: none;
            color: white;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-top: 10px;
            font-size: 16px;
            padding: 0 20px;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 8px 12px;
            background-color: #4169e1;
            border-radius: 5px;
            position: relative;
        }

        nav a:hover {
            background-color: #2b3a67;
        }

        /* Flipkart-style cart */
        .cart-link {
            display: flex;
            align-items: center;
            gap: 6px;
            position: relative;
        }

        .cart-icon {
            background-color: white;
            color: #2b3a67;
            padding: 8px;
            border-radius: 50%;
            font-size: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .cart-badge {
            background-color: red;
            color: white;
            font-size: 12px;
            font-weight: bold;
            padding: 2px 6px;
            border-radius: 50%;
            position: absolute;
            top: -5px;
            right: -5px;
        }

        .cart-wrapper {
            position: relative;
            display: inline-block;
        }

        
        .nav-links-left {
            display: flex;
            gap: 15px;
        }

        .nav-links-right {
            display: flex;
            gap: 15px;
        }

        .logout-button {
            background-color: red; 
            padding: 8px 12px;
            border-radius: 5px;
        }

        
        .home-page nav {
            display: flex;
        }

        .other-pages nav {
            display: none;
        }

    </style>
</head>
<body class="<?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'home-page' : 'other-pages' ?>">

<header>
    <h1><a href="index.php">Campus-Bazar</a></h1>
    <nav>
        <?php if (isset($_SESSION['user_id'])): ?>
            
            <div class="nav-links-left">
                

                <a href="user/add_item.php">Add Item</a>
                <a href="user/my_listings.php">My Listings</a>
                

                <a href="cart.php" class="cart-link">
                    <div class="cart-wrapper">
                        <i class="fas fa-shopping-cart cart-icon"></i>
                        <?php if (!empty($_SESSION['cart'])): ?>
                            <span class="cart-badge"><?= count($_SESSION['cart']) ?></span>
                        <?php endif; ?>
                    </div>
                    Cart
                </a>
            </div>

            <div class="nav-links-right">
                
                <a href="auth/logout.php" class="logout-button">Logout</a>
            </div>
        <?php else: ?>
            
            <div class="nav-links-right">
                <a href="auth/login.php">Login</a>
                <a href="auth/register.php">Register</a>
            </div>
        <?php endif; ?>
    </nav>
</header>

</body>
</html>
