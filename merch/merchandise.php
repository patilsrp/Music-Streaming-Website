<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Merchandise Page</title>
    <link rel="stylesheet" href="../styles/merchandise.css" />
    <link rel="icon" href="./favicon.svg" type="image/svg+xml" />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
      integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,-25"
    />
  </head>
  <body>
    <header>
      <div class="logo">
        <span class="material-symbols-rounded">graphic_eq</span>
        <a href="../index.html" style="color: inherit; text-decoration: none"
          >Musical Odyssey</a
        >
      </div>
      <div class="search-bar">
        <input type="text" placeholder="Search..." />
        <button>Search</button>
      </div>
      <nav>
        <ul>
          <li><a href="#hoodies-section">Hoodies</a></li>
          <li><a href="#posters-section">Poster</a></li>
          <li><a href="#tshirts-section">T-Shirt</a></li>
          <li>
            <div class="cart-btn">
              <span class="nav-icon"><i class="fas fa-cart-plus"></i></span>
              <div class="cart-items">0</div>
            </div>
          </li>
        </ul>
      </nav>
    </header>
    <section class="products">
      <h2>Our Products</h2>
      <div class="items-container">
      <?php
            // Include the PHP file to fetch items from the database
            include 'fetch_items.php';

            // Loop through the fetched items and display them
            foreach ($items as $item) {
                echo "
                <div class='item'>
                    <img src='http://localhost/Music%20Streaming%20Website/images/{$item['image']}' alt='{$item['name']}'>
                    <h4>{$item['name']}</h4>
                    <h5>\${$item['price']}</h5>
                </div>
                ";
            }
            ?>  

      </div>
      <!-- This is where items will be displayed -->
    </section>

    <section class="cart-overlay">
      <div class="cart">
        <span class="close-cart"><i class="far fa-window-close"></i></span>
        <h2>your cart</h2>

        <div class="cart-content"></div>

        <div class="cart-footer">
          <h3>your total : $<span class="cart-total">0</span></h3>
          <button class="clear-cart banner-btn">clear cart</button>
        </div>
      </div>
    </section>
    <footer>
      <ul>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="#">Help</a></li>
        <li><a href="#">Terms of Service</a></li>
        <li><a href="#">Privacy Policy</a></li>
      </ul>
    </footer>
    <script src="../scripts/merchandise.js"></script>
  </body>
</html>
