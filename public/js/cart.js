// Initialize cart from localStorage or create a new cart array
let cart = JSON.parse(localStorage.getItem('cart')) || [];

// Function to add an item to the cart
function addToCart(product, price) {
  // Check if the product already exists in the cart
  const existingProduct = cart.find(item => item.product === product);
  
  if (existingProduct) {
    // If the product is already in the cart, increase the quantity
    existingProduct.quantity += 1;
  } else {
    // If it's a new product, add it to the cart
    cart.push({ product, price, quantity: 1 });
  }

  // Save the updated cart to localStorage
  localStorage.setItem('cart', JSON.stringify(cart));
}

// Function to handle 'Buy Now' button click
function buyNow(product, price) {
  addToCart(product, price);
  // Redirect to cart page after adding the item
  window.location.href = '/product/cart';
}

// Function to display cart items on the cart page
function displayCart() {
  const cartTable = document.querySelector('#cart-items tbody');
  const totalCostElement = document.getElementById('total-cost');
  let totalCost = 0;

  cartTable.innerHTML = '';  // Clear the table content

  cart.forEach(item => {
    const itemTotal = item.price * item.quantity;
    totalCost += itemTotal;

    // Create a row for each item in the cart
    const row = `<tr>
                  <td>${item.product}</td>
                  <td>${item.quantity}</td>
                  <td>$${item.price.toFixed(2)}</td>
                  <td>$${itemTotal.toFixed(2)}</td>
                </tr>`;
    cartTable.innerHTML += row;
  });

  // Display total cost
  totalCostElement.textContent = `$${totalCost.toFixed(2)}`;
}

// Call displayCart() when the cart page is loaded
window.onload = displayCart;

// Function to handle checkout button
function checkout() {
  alert("Proceeding to payment gateway...");
  // Redirect to payment gateway (implement actual logic if required)
  window.location.href = '/payment';
}