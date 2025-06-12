<?php
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Campus Bazar - Logout</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #dff6ff; 
            margin: 0;
            padding: 0;
        }

        main {
            max-width: 400px;
            margin: 100px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 50, 0.1);
            text-align: center;
        }

        h2 {
            color: #2b3a67;
            margin-bottom: 20px;
        }

        .message {
            font-size: 18px;
            color: #4169e1;
            margin-bottom: 20px;
        }

        .btn {
            padding: 10px;
            background-color: #2b3a67;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #4169e1;
        }
    </style>
</head>
<body>

<main>
    <h2>Logout Successful</h2>
    <p class="message">You have been logged out successfully. Click below to go back to the homepage.</p>
    <a href="../index.php" class="btn">Go to Homepage</a>
</main>

</body>
</html>
<?php
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Campus Bazar - Logout</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #dff6ff; 
            margin: 0;
            padding: 0;
        }

        main {
            max-width: 400px;
            margin: 100px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 50, 0.1);
            text-align: center;
        }

        h2 {
            color: #2b3a67;
            margin-bottom: 20px;
        }

        .message {
            font-size: 18px;
            color: #4169e1;
            margin-bottom: 20px;
        }

        .btn {
            padding: 10px;
            background-color: #2b3a67;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #4169e1;
        }
    </style>
</head>
<body>

<main>
    <h2>Logout Successful</h2>
    <p class="message">You have been logged out successfully. Click below to go back to the homepage.</p>
    <a href="../index.php" class="btn">Go to Homepage</a>
</main>

</body>
</html>

