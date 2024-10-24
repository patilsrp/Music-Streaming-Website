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
      include "fetch_items.php";
// Loop through the fetched items and display them with hardcoded images
foreach ($items as $item) {
    // Ensure 'id' exists
    if (!isset($item['id'])) {
        continue; // Skip if 'id' is missing
    }

    // Hardcode the images based on item ID with ../images path
    $image = '';
    switch ($item['id']) {
      case 1:
          $image = '../images/merchandise/hoodie.jpg';
          break;
      case 2:
          $image = '../images/merchandise/hoodie1.webp';
          break;
      case 3:
          $image = '../images/merchandise/hoodie2.jpeg';
          break;
      case 4:
          $image = '../images/merchandise/hoodie3.jpg';
          break;
      case 5:
          $image = '../images/merchandise/hoodie4.jpeg';
          break;
      case 6:
          $image = '../images/merchandise/hoodie5.jpeg';
          break;
      case 7:
          $image = '../images/merchandise/hoodie6.jpeg';
          break;
      case 8:
          $image = '../images/merchandise/hoodie7.jpeg';
          break;
      case 9:
          $image = '../images/merchandise/hoodie8.jpeg';
          break;
      case 10:
          $image = '../images/merchandise/hoodie9.jpeg';
          break;
      case 11:
          $image = '../images/merchandise/poster.webp';
          break;
      case 12:
          $image = '../images/merchandise/poster1.webp';
          break;
      case 13:
          $image = '../images/merchandise/poster2.jpeg';
          break;
      case 14:
          $image = '../images/merchandise/poster3.webp';
          break;
      case 15:
          $image = '../images/merchandise/poster4.webp';
          break;
      case 16:
          $image = '../images/merchandise/poster5.jpeg';
          break;
      case 17:
          $image = '../images/merchandise/poster6.jpeg';
          break;
      case 18:
          $image = '../images/merchandise/poster7.jpeg';
          break;
      case 19:
          $image = '../images/merchandise/poster8.jpeg';
          break;
      case 20:
          $image = '../images/merchandise/poster9.jpeg';
          break;
      case 21:
          $image = '../images/merchandise/t-shirt.jpeg';
          break;
      case 22:
          $image = '../images/merchandise/t-shirt1.webp';
          break;
      case 23:
          $image = '../images/merchandise/t-shirt2.webp';
          break;
      case 24:
          $image = '../images/merchandise/t-shirt3.webp';
          break;
      case 25:
          $image = '../images/merchandise/t-shirt4.avif';
          break;
      case 26:
          $image = '../images/merchandise/t-shirt5.jpeg';
          break;
      case 27:
          $image = '../images/merchandise/t-shirt6.jpeg';
          break;
      case 28:
          $image = '../images/merchandise/t-shirt7.jpeg';
          break;
      case 29:
          $image = '../images/merchandise/t-shirt8.jpeg';
          break;
      case 30:
          $image = '../images/merchandise/t-shirt9.jpeg';
          break;
      default:
          $image = '../images/merchandise/default.jpg'; // Fallback image
  }

    // Output item details with the specific hardcoded image
    if (is_string($image)) {
      // Output item details with the specific hardcoded image and Add to Cart button
      echo "
      <div class='item'>
          <img src='$image' alt='{$item['name']}'>
          <h4>{$item['name']}</h4>
          <h5>\${$item['price']}</h5>
          <button class='bag-btn' data-id='{$item['id']}' data-name='{$item['name']}' data-price='{$item['price']}' data-image='$image'>
              <i class='fas fa-shopping-cart'></i> Add to Cart
          </button>
      </div>
      ";
  } else {
      echo "Error: Image is not a string.";
  }

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
