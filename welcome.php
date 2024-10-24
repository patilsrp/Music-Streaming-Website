<?php
session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} elseif (isset($_COOKIE['username'])) {
    $username = $_COOKIE['username'];
    $_SESSION['username'] = $username;
} else {
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
    <link rel="stylesheet" href="styles/main.css?v=1.0">
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
        <button type="submit">Search</button>
        </div>
        <nav>
            <ul>
                <li><a href="welcome.php">Home</a></li>
                <li><a href="merch/merchandise.php">Browse</a></li>
                <li><a href="#">Add Songs</a></li>
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
        <h1>Welcome, <?php echo htmlspecialchars($username); ?> to Musical Odyssey!</h1> 
        <p>Discover your favorite music here</p>
        <!-- Add banner image or video here -->
    </section>

    <!-- Main Content Area -->
    <main>
    <section class="browse-section">
            <h2>Browse by Genre/Mood</h2>
            <div class="genre-grid">
                <div class="genre-item">
                    <a href="login.html">
                    <img src="images/Genre/Rock.webp" alt="Rock Genre">
                    <h3>Rock</h3>
                    </a>
                </div>
                <div class="genre-item">
                    <a href="login.html">
                    <img src="images/Genre/Pop.webp" alt="Pop Genre">
                    <h3>Pop</h3>
                    </a>
                </div>
                <div class="genre-item">
                    <a href="login.html">
                    <img src="images/Genre/Jazz.webp" alt="Jazz Genre">
                    <h3>Jazz</h3>
                    </a>
                </div>
                <div class="genre-item">
                    <a href="login.html">
                    <img src="images/Genre/Classical.webp" alt="Classical Genre">
                    <h3>Classical</h3>
                    </a>
                </div>
                <div class="genre-item">
                    <a href="login.html">
                    <img src="images/Genre/Country Music.webp" alt="Country Music">
                    <h3>Country Music</h3>
                    </a>
                </div>
                <div class="genre-item">
                    <a href="login.html">
                    <img src="images/Genre/Metal.webp" alt="Metal Genre">
                    <h3>Metal </h3>
                    </a>
                </div>
                <div class="genre-item">
                    <a href="login.html">
                    <img src="images/Genre/New-age.webp" alt="New-Age Genre">
                    <h3>New-Age</h3>
                    </a>
                </div>
                <div class="genre-item">
                    <a href="login.html">
                    <img src="images/Genre/Hiphop.webp" alt="Hip-Hop">
                    <h3>Hip-Hop</h3>
                    </a>
                </div>
                <div class="genre-item">
                    <a href="login.html">
                    <img src="images/Genre/Disco.webp" alt="Disco">
                    <h3>Disco</h3>
                    </a>
                </div>
                <div class="genre-item">
                    <a href="login.html">
                    <img src="images/Genre/Electronic.webp" alt="Electronic">
                    <h3>Electronic</h3>
                    </a>
                </div>
                <div class="genre-item">
                    <a href="login.html">
                    <img src="images/Genre/Folk Music.webp" alt="Folk Music">
                    <h3>Folk Music</h3>
                    </a>
                </div>

            </div>
        </section>
    
        <!-- Featured Playlists -->
        <section class="featured-playlists">
            <h2>Featured Playlists</h2>
            <div class="playlist-grid">
                <div class="playlist-item">
                    <a href="login.html">
                    <img src="images/Featured-playlist/Top Hits.webp" alt="Playlist 1">
                    <h3>Top Hits</h3>
                    </a>
                </div>
                <div class="playlist-item">
                    <a href="login.html">
                    <img src="images/Featured-playlist/Chill Vibes.webp" alt="Playlist 2">
                    <h3>Chill Vibes</h3>
                    </a>
                </div>
                <div class="playlist-item">
                    <a href="login.html">
                    <img src="images/Featured-playlist/Workout Mix.webp" alt="Playlist 3">
                    <h3>Workout Mix</h3>
                    </a>
                </div>
                <div class="playlist-item">
                    <a href="login.html">
                    <img src="images/Featured-playlist/ThrowBack Classic.webp" alt="Playlist 4">
                    <h3>Throwback Classics</h3>
                    </a>
                </div>
                <div class="playlist-item">
                    <a href="login.html">
                    <img src="images/Featured-playlist/Relax & Unwind.webp" alt="Playlist 5">
                    <h3>Relax & Unwind</h3>
                    </a>
                </div>
                <div class="playlist-item">
                    <a href="login.html">
                    <img src="images/Featured-playlist/Party Anthems.webp" alt="Playlist 6">
                    <h3>Party Anthems</h3>
                    </a>
                </div>
                <div class="playlist-item">
                    <a href="login.html">
                    <img src="images/Featured-playlist/Road Trip Tunes.webp" alt="Playlist 7">
                    <h3>Road Trip Tunes</h3>
                    </a>
                </div>
                <div class="playlist-item">
                    <a href="login.html">
                    <img src="images/Featured-playlist/Indie Discoveries.webp" alt="Playlist 8">
                    <h3>Indie Discoveries</h3>
                    </a>
                </div>
                <div class="playlist-item">
                    <a href="login.html">
                    <img src="images/Featured-playlist/Focus Mode.webp" alt="Playlist 9">
                    <h3>Focus Mode</h3>
                    </a>
                </div>
                <div class="playlist-item">
                    <a href="login.html">
                    <img src="images/Featured-playlist/Electronic Essentials.webp" alt="Playlist 10">
                    <h3>Electronic Essentials</h3>
                    </a>
                </div>
            </div>
        </section>
    </main>

    <!--Sidebar (Optional) 

    <aside class="sidebar">
      <h3>
      <div class="sidebar"id="sidebar">
      <p>Welcome back, <?php echo htmlspecialchars($username); ?>!</p>

      <button class="sidebar-toggle" id="sidebarToggle">☰</button> 
    <div class="profile-section">
        <img src="path-to-profile-image.jpg" alt="User Profile Picture" class="profile-pic">

    </div>
    <nav class="profile-nav">
        <ul>
            <li><a href="#">Account Settings</a></li>
            <li><a href="#">Playlists</a></li>
            <li><a href="#">Subscriptions</a></li>
            <li><a href="#">Favorites</a></li>
        </ul>
    </nav>
</div>

    </aside> -->

    <Footer>
        <ul>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Help</a></li>
            <li><a href="#">Terms of Service</a></li>
            <li><a href="#">Privacy Policy</a></li>
        </ul>
    </Footer>

    <script src="scripts/main.js"></script>
</body>
</html>
