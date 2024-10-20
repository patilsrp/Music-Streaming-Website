<?php
session_start();
session_unset();  // Unset all session variables
session_destroy();  // Destroy session

// Remove the cookie if it exists
if (isset($_COOKIE['username'])) {
    setcookie('username', '', time() - 3600, "/");  // Expire the cookie
}

header("Location: index.html");  
exit();
?>
