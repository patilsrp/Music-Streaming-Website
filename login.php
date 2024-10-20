<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $hashed_password = $user['password'];
        
 
        if (password_verify($password, $hashed_password)) {
            $_SESSION['username'] = $username;

            if (isset($_POST['remember'])) {
                setcookie('username', $username, time() + (86400 * 30), "/");  
            }

            header("Location: welcome.php");  
            exit();
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "User does not exist!";
    }
}
?>
