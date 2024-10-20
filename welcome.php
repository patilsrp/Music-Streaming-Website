<?php
session_start();

// Check if user is logged in using session or cookie
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} elseif (isset($_COOKIE['username'])) {
    $username = $_COOKIE['username'];
    // Optionally, set session again
    $_SESSION['username'] = $username;
} else {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Musical Odyssey</title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="icon" href="./favicon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,-25" />
</head>
<body>
    <!-- Header -->
    <header>
        <div class="logo"><span class="material-symbols-rounded">graphic_eq</span>
            <a href="welcome.php" style="color: inherit; text-decoration: none;">Musical Odyssey</a>
        </div>
        <div class="search-bar">
            <input type="text" placeholder="Search...">
            <button>Search</button>
        </div>
        <nav>
            <ul>
                <li><a href="merchandise.html">Browse</a></li>
                <li><a href="#">Genres</a></li>
                <li><a href="music-player/index.html">Radio</a></li>
                <li class="dropdown">
                    <a href="#">Account</a>
                    <div class="dropdown-content">
                        <a href="logout.php">Logout</a> <!-- Added Logout Link -->
                    </div>
                </li>
            </ul>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <h1>Welcome, <?php echo htmlspecialchars($username); ?> to Musical Odyssey!</h1> <!-- Dynamic Username -->
        <!-- Add banner image or video here -->
    </section>

    <!-- Main Content Area -->
    <main>
        <!-- Browse by Genre/Mood -->
        <section class="browse-section">
            <!-- Genre/Mood categories here -->
        </section>

        <!-- Featured Playlists -->
        <section class="featured-playlists">
            <!-- Featured playlists here -->
        </section>

        <!-- New Releases -->
        <section class="new-releases">
            <!-- New releases here -->
        </section>

        <!-- Artist Pages -->
        <section class="artist-pages">
            <!-- Artist information, images, etc. here -->
        </section>

        <!-- Album Pages -->
        <section class="album-pages">
            <!-- Album information, covers, track listings, etc. here -->
        </section>
    </main>

    <!-- Sidebar (Optional) 
    <aside class="sidebar">
        <h3>User Profile</h3>
        <p>Welcome back, <?php echo htmlspecialchars($username); ?>!</p>

    </aside> -->

    <!-- Footer -->
    <footer>
        <ul>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Help</a></li>
            <li><a href="#">Terms of Service</a></li>
            <li><a href="#">Privacy Policy</a></li>
        </ul>
        <!-- Social media links here -->
    </footer>

    <script src="scripts/main.js"></script>
</body>
</html>
