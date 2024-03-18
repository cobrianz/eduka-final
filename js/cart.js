// Function to fetch cart items from the server
function fetchCartItems() {
    // Make an AJAX request to fetch cart items
    $.ajax({
      url: 'get_cart_items.php', // Change the URL to your PHP script that fetches cart items
      method: 'GET',
      success: function(response) {
        // Parse the JSON response and render cart items
        renderCartItems(response);
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });
  }
  
  // Function to render cart items dynamically
  function renderCartItems(cartData) {
    const cartContainer = document.getElementById('cartContainer');
  
    // Clear existing cart items
    cartContainer.innerHTML = '';
  
    // Loop through cart data and generate HTML markup for each item
    cartData.forEach(item => {
      const cartItemHTML = `
        <div class="cart-item">
          <img src="./images/${item.image}" alt="${item.name}" />
          <div>
            <p>${item.name}</p>
            <span>Price: Ksh. ${item.price}</span><br />
            <span>Quantity: ${item.quantity}</span><br />
            <span>Subtotal: Ksh. ${item.subtotal}</span><br />
            <a href="#">Remove</a>
          </div>
        </div>
      `;
  
      // Append the cart item HTML to the cart container
      cartContainer.innerHTML += cartItemHTML;
    });
  }
  
  // Fetch cart items when the page loads
  document.addEventListener('DOMContentLoaded', function() {
    fetchCartItems();
  });
  