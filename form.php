
<?php

$message = "";
$email = "";
$userMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"] ?? "");
    $userMessage = trim($_POST["message"] ?? "");

    if (empty($email) || empty($userMessage)) {
        $message = "Please fill in all fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Please enter a valid email address.";
    } else {
        // Replace with your own email address before testing.
        $to = "your-email@example.com";
        $subject = "New Contact Form Message";

        $body = "From: " . $email . "\n\n";
        $body .= "Message:\n" . $userMessage;

        $headers = "From: noreply@barbara-bako.codefactory.live\r\n";
        $headers .= "Reply-To: " . $email . "\r\n";

        if (mail($to, $subject, $body, $headers)) {
            $message = "Your message has been sent!";
            $email = "";
            $userMessage = "";
        } else {
            $message = "Sorry, your message could not be sent.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow p-4 mx-auto" style="max-width: 600px;">

        <h2 class="text-center">Contact Me</h2>

        <?php if (!empty($message)): ?>
            <div class="alert alert-info">
                <?= htmlspecialchars($message) ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="mb-3">
                <label class="form-label">Your Email</label>
                <input type="email" name="email"
                       class="form-control"
                       value="<?= htmlspecialchars($email) ?>"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Your Message</label>
                <textarea name="message"
                          class="form-control"
                          rows="5"
                          required><?= htmlspecialchars($userMessage) ?></textarea>
            </div>

            <button type="submit" class="btn btn-success">
                Send Message
            </button>

            <a href="index.php" class="btn btn-secondary">
                Back to Home
            </a>
        </form>

    </div>
</div>

</body>
</html>
