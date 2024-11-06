<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'C:/xampp/htdocs/vendor/phpmailer/phpmailer/src/Exception.php';
require 'C:/xampp/htdocs/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'C:/xampp/htdocs/vendor/phpmailer/phpmailer/src/SMTP.php';
require 'config.php';  // Include your database connection

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ensure that the username and email keys exist
    if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['email']) && !empty($_POST['email'])) {
        $username = $_POST['username'];
        $user_email_input = $_POST['email'];

        // Prepare the SQL statement using PDO
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        // Check if the username exists
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $user_email = $row['email'];  // Ensure the user table has an 'email' column

            // Validate if the email matches the one in the database
            if ($user_email_input !== $user_email) {
                echo "Email does not match the one on record.";
                exit;
            }

            // Rate limiting: check last reset request time
            $last_reset_request = strtotime($row['last_reset_request']);
            if (time() - $last_reset_request < 900) {  // 15 minutes cooldown
                echo "You can only request a password reset once every 15 minutes.";
                exit;
            }

            // Generate a unique token
            $token = bin2hex(random_bytes(50)); // 50-byte token

            // Store the token in the database and set it to expire in 1 hour
            $sql = "UPDATE users SET reset_token = :token, token_expiry = DATE_ADD(NOW(), INTERVAL 1 HOUR), last_reset_request = NOW() WHERE username = :username";
            $update_stmt = $conn->prepare($sql);
            $update_stmt->bindParam(':token', $token);
            $update_stmt->bindParam(':username', $username);
            $update_stmt->execute();

            // Send the reset link via email
            $reset_link = "http://localhost/Music_Streaming_Website/resetpass.php?token=" . urlencode($token);

            // Setup PHPMailer
            $mail = new PHPMailer(true);

            try {
                // Server settings
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';  // Set the SMTP server
                $mail->SMTPAuth = true;
                $mail->Username = 'patil.sr@somaiya.edu';  // SMTP username
                $mail->Password = 'xajy rwiq ebsq ivqk';  // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // Recipients
                $mail->setFrom('patil.sr@somaiya.edu', 'Sneha Patil');
                $mail->addAddress($user_email);

                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Password Reset Request';
                $mail->Body = "Hi $username,<br><br>We received a request to reset your password. Click the link below to reset it:<br><br>
                              <a href='$reset_link'>$reset_link</a><br><br>This link will expire in 1 hour.";

                // Send email
                $mail->send();
                echo 'Password reset link has been sent to your email.';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

        } else {
            echo "Username not found.";
        }
    } else {
        echo "Please enter both username and email.";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Forgot Password</title>
</head>
<body>
<div class="overlay">
  <form method="POST" action="forgotpass.php">
    <!-- Updated method and action -->
    <div class="con">
      <header class="head-form">
        <h2>Forgot Password</h2>
      </header>
      <br />
      <div class="field-set">
      <span class="input-item">
                <i class="fa fa-user-circle"></i>
              </span>
              <input class="form-input" id="username" name="username" type="text" placeholder="UserName" required>
              <br>
        <!-- Email Input -->
        <span class="input-item">
          <i class="fa fa-envelope"></i>
        </span>
        <input
          class="form-input"
          id="email"
          type="email"
          name="email"
          placeholder="Email"
          required
        />
        <br />

        <button class="sign-up" type="submit">
          Sign-Up
          <i class="fa fa-user-plus" aria-hidden="true"></i>
        </button>
      </div>
    </div>
  </form>
</div>
</body>
</html>