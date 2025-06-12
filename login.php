<?php
include '../includes/header.php';
include '../config/config.php';
include '../includes/functions.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = sanitize($_POST['email']);
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: /index.php");
        exit;
    } else {
        $error = "Invalid email or password";
    }
}
?>

<main>
    <h2>Login</h2>
    <form method="post">
        <input type="email" name="email" required placeholder="Email">
        <input type="password" name="password" required placeholder="Password">
        <button type="submit">Login</button>
    </form>
    <p class="error"><?= $error ?></p>
</main>

<?php include '../includes/footer.php'; ?>
