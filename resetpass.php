<?php
require 'config.php';  // Include your database connection

// Set the timezone explicitly to avoid issues
date_default_timezone_set('UTC');  // or your desired timezone

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $token = $_POST['token'];
    $new_password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    // Check if the passwords match and apply complexity rules
    if ($new_password === $password_confirm && strlen($new_password) >= 8 && preg_match('/[A-Z]/', $new_password) && preg_match('/[0-9]/', $new_password)) {
        // Verify the reset token and expiry in PHP
        $stmt = $conn->prepare("SELECT reset_token, token_expiry FROM users WHERE reset_token = :token");
        $stmt->bindParam(':token', $token);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if token exists and is not expired
        if ($result && strtotime($result['token_expiry']) > time()) {
            // Token is valid, update the password
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("UPDATE users SET password = :password, reset_token = NULL, token_expiry = NULL WHERE reset_token = :token");
            $stmt->bindParam(':password', $hashed_password);
            $stmt->bindParam(':token', $token);
            $stmt->execute();
            
            // Redirect to login.html after a successful password reset
            header('Location: login.html');
            exit();
        } else {
            echo 'Invalid or expired token.';
        }
    } else {
        echo 'Passwords do not match or do not meet complexity requirements.';
    }
} elseif (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Verify the reset token and expiry before showing the form
    $stmt = $conn->prepare("SELECT username FROM users WHERE reset_token = :token AND token_expiry > NOW()");
    $stmt->bindParam(':token', $token);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($result) {
        $username = $result['username'];
    } else {
        echo 'Invalid or expired token.';
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Reset Password</title>
</head>
<body>
<div class="overlay">
    <form method="POST" action="resetpass.php">
      <div class="con">
        <header class="head-form">
          <h2>Reset Password for <?php echo htmlspecialchars($username); ?></h2> <!-- Show the username -->
        </header>
        <br />
        <div class="field-set">
          <!-- Hidden Token Field -->
          <input
            type="hidden"
            name="token"
            value="<?php echo htmlspecialchars($_GET['token']); ?>"
            required
          />

          <!-- New Password Input -->
          <span class="input-item">
            <i class="fa fa-lock"></i>
          </span>
          <input
            class="form-input"
            id="password"
            type="password"
            name="password"
            placeholder="New Password"
            required
          />
          <br />

          <!-- Confirm Password Input -->
          <span class="input-item">
            <i class="fa fa-lock"></i>
          </span>
          <input
            class="form-input"
            id="password_confirm"
            type="password"
            name="password_confirm"
            placeholder="Confirm Password"
            required
          />
          <br />

          <!-- Reset Password Button -->
          <button class="sign-up" type="submit">
            Reset Password
            <i class="fa fa-check-circle" aria-hidden="true"></i>
          </button>
        </div>
      </div>
    </form>
  </div>

</body>
</html>

<?php
} else {
    echo 'No token provided.';
}
?>
