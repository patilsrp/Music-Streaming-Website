// Cart variables
const cartBtn = document.querySelector(".cart-btn");
const closeCartBtn = document.querySelector(".close-cart");
const clearCartBtn = document.querySelector(".clear-cart");
const cartDOM = document.querySelector(".cart");
const cartOverlay = document.querySelector(".cart-overlay");
const cartItems = document.querySelector(".cart-items");
const cartTotal = document.querySelector(".cart-total");
const cartContent = document.querySelector(".cart-content");
const proceedBtn = document.querySelector(".proceed-payment"); // Proceed to payment button
let cart = [];

// Class to handle cart functionality
class UI {
  getBagButtons() {
    const buttons = [...document.querySelectorAll(".bag-btn")];
    buttons.forEach(button => {
      let id = button.dataset.id;
      let inCart = cart.find(item => item.id == id);
      if (inCart) {
        button.innerText = "In Cart";
        button.disabled = true;
      } else {
        button.addEventListener("click", event => {
          event.target.innerText = "In Cart";
          event.target.disabled = true;

          // Fetch correct product details from the button's data attributes
          let product = {
            id: parseInt(button.dataset.id),
            title: button.dataset.name,
            price: parseFloat(button.dataset.price),
            image: button.dataset.image,
            amount: 1
          };

          // Check if the product is already in the cart
          let existingItem = cart.find(item => item.id == product.id);
          if (existingItem) {
            // If the product is already in the cart, increase its quantity
            existingItem.amount += 1;
          } else {
            // If not, add it as a new item
            cart = [...cart, product];
          }

          // Save cart to localStorage
          Storage.saveCart(cart);

          // Update cart values and UI
          this.setCartValues(cart);
          this.addCartItem(product);
          this.showCart();
        });
      }
    });
  }

  setCartValues(cart) {
    let tempTotal = 0;
    let itemsTotal = 0;
    cart.map(item => {
      tempTotal += item.price * item.amount;
      itemsTotal += item.amount;
    });
    cartTotal.innerText = parseFloat(tempTotal.toFixed(2));
    cartItems.innerText = itemsTotal;
  }

  addCartItem(item) {
    const div = document.createElement("div");
    div.classList.add("cart-item");

    // Check if the item already exists in the cart content (avoid adding it twice)
    if (!document.querySelector(`.cart-item img[src="${item.image}"]`)) {
      div.innerHTML = `
        <img src="${item.image}" alt="${item.title}" />
        <div>
          <h4>${item.title}</h4>
          <h5>$${item.price}</h5>
          <span class="remove-item" data-id="${item.id}">remove</span>
        </div>
        <div>
          <i class="fas fa-chevron-up" data-id="${item.id}"></i>
          <p class="item-amount">${item.amount}</p>
          <i class="fas fa-chevron-down" data-id="${item.id}"></i>
        </div>
      `;
      cartContent.appendChild(div);
    } else {
      // If the item is already in the cart, update the quantity display
      const amountElement = document.querySelector(`.cart-item img[src="${item.image}"]`).parentElement.querySelector('.item-amount');
      amountElement.innerText = item.amount;
    }
  }

  showCart() {
    cartOverlay.classList.add("transparentBcg");
    cartDOM.classList.add("showCart");
  }

  setupAPP() {
    cart = Storage.getCart();
    this.setCartValues(cart);
    this.populateCart(cart);
    cartBtn.addEventListener("click", this.showCart);
    closeCartBtn.addEventListener("click", this.hideCart);
  }

  populateCart(cart) {
    cart.forEach(item => this.addCartItem(item));
  }

  hideCart() {
    cartOverlay.classList.remove("transparentBcg");
    cartDOM.classList.remove("showCart");
  }

  cartLogic() {
    clearCartBtn.addEventListener("click", () => {
      this.clearCart();
    });
    cartContent.addEventListener("click", event => {
      if (event.target.classList.contains("remove-item")) {
        let removeItem = event.target;
        let id = removeItem.dataset.id;
        cart = cart.filter(item => item.id != id);
        this.setCartValues(cart);
        Storage.saveCart(cart);
        cartContent.removeChild(removeItem.parentElement.parentElement);
        const buttons = [...document.querySelectorAll(".bag-btn")];
        buttons.forEach(button => {
          if (parseInt(button.dataset.id) === parseInt(id)) {
            button.disabled = false;
            button.innerHTML = `<i class="fas fa-shopping-cart"></i> Add to Cart`;
          }
        });
      } else if (event.target.classList.contains("fa-chevron-up")) {
        let addAmount = event.target;
        let id = addAmount.dataset.id;
        let tempItem = cart.find(item => item.id == id);
        tempItem.amount += 1;
        Storage.saveCart(cart);
        this.setCartValues(cart);
        addAmount.nextElementSibling.innerText = tempItem.amount;
      } else if (event.target.classList.contains("fa-chevron-down")) {
        let lowerAmount = event.target;
        let id = lowerAmount.dataset.id;
        let tempItem = cart.find(item => item.id == id);
        tempItem.amount -= 1;
        if (tempItem.amount > 0) {
          Storage.saveCart(cart);
          this.setCartValues(cart);
          lowerAmount.previousElementSibling.innerText = tempItem.amount;
        } else {
          cart = cart.filter(item => item.id != id);
          Storage.saveCart(cart);
          this.setCartValues(cart);
          cartContent.removeChild(lowerAmount.parentElement.parentElement);
          const buttons = [...document.querySelectorAll(".bag-btn")];
          buttons.forEach(button => {
            if (parseInt(button.dataset.id) === parseInt(id)) {
              button.disabled = false;
              button.innerHTML = `<i class="fas fa-shopping-cart"></i> Add to Cart`;
            }
          });
        }
      }
    });

    // Handle proceed to payment
    proceedBtn.addEventListener("click", () => {
      if (!Storage.isLoggedIn()) {
        // Redirect to login if not logged in
        window.location.href = "login.html";
      } else {
        // Proceed to payment if logged in
        window.location.href = "payment.html";
      }
    });
  }

  clearCart() {
    cart = [];
    this.setCartValues(cart);
    Storage.saveCart(cart);
    const buttons = [...document.querySelectorAll(".bag-btn")];
    buttons.forEach(button => {
      button.disabled = false;
      button.innerHTML = `<i class="fas fa-shopping-cart"></i> Add to Cart`;
    });
    while (cartContent.children.length > 0) {
      cartContent.removeChild(cartContent.children[0]);
    }
    this.hideCart();
  }
}

// Storage class for handling cart data and login status
class Storage {
  static saveCart(cart) {
    localStorage.setItem("cart", JSON.stringify(cart));
  }

  static getCart() {
    return localStorage.getItem("cart")
      ? JSON.parse(localStorage.getItem("cart"))
      : [];
  }

  static isLoggedIn() {
    return localStorage.getItem("isLoggedIn") === "true"; // Example login flag
  }

  static logIn() {
    localStorage.setItem("isLoggedIn", "true");
  }

  static logOut() {
    localStorage.setItem("isLoggedIn", "false");
  }
}

document.addEventListener("DOMContentLoaded", () => {
  const ui = new UI();
  ui.setupAPP();

  // Initialize cart logic
  ui.getBagButtons();
  ui.cartLogic();
});
