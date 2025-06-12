<?php include 'includes/header.php'; ?>

<main style="max-width: 700px; margin: 40px auto; padding: 30px; background-color: #e6f2ff; border-radius: 12px; box-shadow: 0 0 15px rgba(0,0,0,0.1); font-family: 'Segoe UI', sans-serif;">
    <h1 style="color: #2b3a67;">Contact Us</h1>
    <p style="font-size: 17px; color: #444;">Have a question, suggestion, or just want to say hello? Fill out the form below and we’ll get back to you soon.</p>

    <form method="post" style="margin-top: 20px;">
        <input type="text" name="name" required placeholder="Your Name" style="width: 100%; padding: 10px; margin-bottom: 15px; border-radius: 8px; border: 1px solid #ccc;">
        <input type="email" name="email" required placeholder="Your Email" style="width: 100%; padding: 10px; margin-bottom: 15px; border-radius: 8px; border: 1px solid #ccc;">
        <textarea name="message" required placeholder="Your Message" rows="5" style="width: 100%; padding: 10px; margin-bottom: 15px; border-radius: 8px; border: 1px solid #ccc;"></textarea>
        <button type="submit" style="background-color: #2b3a67; color: white; padding: 10px 20px; border: none; border-radius: 6px; cursor: pointer;">Send Message</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);

        
        echo "<p style='margin-top: 20px; color: green;'>Thank you, <strong>$name</strong>. We’ve received your message!</p>";
    }
    ?>
</main>

<?php include 'includes/footer.php'; ?>
