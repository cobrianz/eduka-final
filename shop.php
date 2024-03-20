<?php
require 'config/database.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eduka | Shop</title>
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <!-- Glide js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.theme.css">
    <!-- Custom StyleSheet -->
    <link rel="stylesheet" href="shop.css">
</head>

<body class="">
    <div class="top-nav">
        <div class="container d-flex">
            <p>Order Online Or Call Us: (+245) 702764907</p>
            <ul class="d-flex">
                <li><a href="#">About Us</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </div>
    <div class="container">
        <header class="navigation">
            <div class="nav-center container d-flex">
                <ul class="nav-list d-flex">
                    <li class="nav-item">
                        <a href="<?= ROOT_URL ?>" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= ROOT_URL ?>products_json_fetch.php" class="nav-link">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a href="#terms" class="nav-link">Terms</a>
                    </li>
                    <li class="nav-item">
                        <a href="#about" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="#contact" class="nav-link">Contact</a>
                    </li>
                    <li class="icons d-flex">
                        <?php if (isset ($_SESSION['user-id'])): ?>
                            <a href="account.php" class="icon">
                                <i class="bx bx-user"></i>
                            </a>
                            <?php
                            $id = $_SESSION['user-id'];
                            $fetch_user_query = "SELECT * FROM users WHERE id = $id";
                            $run_query = mysqli_query($connection, $fetch_user_query);
                            $user_record = mysqli_fetch_assoc($run_query);

                            ?>
                            <div class="icon">
                                <i>Ksh.<b id='balance'>
                                        <?php echo ' ' . $user_record['balance'] ?>
                                    </b></i>
                            </div>
                        <?php else: ?>
                            <a href="login.php" class="icon">
                                <i class="bx bx-user"></i>
                            </a>
                        <?php endif; ?>
                    </li>
                </ul>

                <div class="icons d-flex">
                    <?php if (isset ($_SESSION['user-id'])): ?>
                        <a href="account.php" class="icon">
                            <i class="bx bx-user"></i>
                        </a>
                        <div class="icon">
                            <i>Ksh.<b id='balance'>
                                    <?php echo ' ' . $user_record['balance'] ?>
                                </b></i>
                        </div>
                    <?php else: ?>
                        <a href="login.php" class="icon">
                            <i class="bx bx-user"></i>
                        </a>
                    <?php endif; ?>
                </div>

                <div class="hamburger">
                    <i class="bx bx-menu-alt-left"></i>
                </div>
            </div>
            <div class="icon-cart">
                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 15a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0h8m-8 0-1-4m9 4a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-9-4h10l2-7H3m2 7L3 4m0 0-.792-3H1" />
                </svg>
                <span>0</span>
            </div>
        </header>
    </div>
    <div class="listProduct">

    </div>
    <div class="cartTab">
        <h1>Shopping Cart</h1>
        <div class="listCart">

        </div>

        <div class="payment">
            <h2>Payment</h2>
            <div id="subtotal">
                <span>Subtotal</span>
                <span>Ksh. <span id="subtotalAmount">0</span></span>
            </div>
            <div id="tax">
                <span>Tax</span>
                <span>Ksh. <span id="taxAmount">0</span></span>
            </div>
            <div id="total">
                <span>Total</span>
                <span>
                    Ksh. <span id="totalAmount">0</span>
                </span>
            </div>
            <?php if (isset ($_SESSION['user-id'])): ?>
                <div id="balance">

                    <span>Balance</span>

                    <span>
                    </span>
                    </span>
                    <span id="balance">Ksh.
                        <?php echo $user_record['balance'] ?>
                </div>
            <?php endif; ?>
        </div>


        <div class="btn">
            <button class="close">CLOSE</button>
            <button class="checkOut" onclick="checkout()">Buy</button>
        </div>
    </div>
    <footer class="footer">
        <div class="row">
            <div class="col d-flex">
                <h4>INFORMATION</h4>
                <a href="">About us</a>
                <a href="">Contact Us</a>
                <a href="">Term & Conditions</a>
                <a href="">Shipping Guide</a>
            </div>
            <div class="col d-flex">
                <h4>USEFUL LINK</h4>
                <a href="">Online Store</a>
                <a href="">Customer Services</a>
                <a href="">Promotion</a>
                <a href="">Top Brands</a>
            </div>
            <div class="col d-flex">
                <span><i class="bx bxl-facebook-square"></i></span>
                <span><i class="bx bxl-instagram-alt"></i></span>
                <span><i class="bx bxl-github"></i></span>
                <span><i class="bx bxl-twitter"></i></span>
                <span><i class="bx bxl-pinterest"></i></span>
            </div>
        </div>
    </footer>
    <script>
        let listProductHTML = document.querySelector('.listProduct');
        let listCartHTML = document.querySelector('.listCart');
        let iconCart = document.querySelector('.icon-cart');
        let iconCartSpan = document.querySelector('.icon-cart span');
        let body = document.querySelector('body');
        let closeCart = document.querySelector('.close');
        let products = [];
        let cart = [];

        iconCart.addEventListener('click', () => {
            body.classList.toggle('showCart');
        });

        closeCart.addEventListener('click', () => {
            body.classList.toggle('showCart');
        });

        const addDataToHTML = () => {
            listProductHTML.innerHTML = ''; // Clear previous product list
            if (products.length > 0) {
                products.forEach(product => {
                    let newProduct = document.createElement('div');
                    newProduct.dataset.id = product.id;
                    newProduct.classList.add('item');
                    newProduct.innerHTML = `
                    <div class="products_title">
                        <h2>${product.name}</h2>
                        <span class="discount">${product.discount}</span>
                    </div>
                    <img src="./products/${product.thumbnail}" alt="product image">
                    <div class="price">Ksh. ${product.price}</div>
                    <button class="addCart">Add To Cart</button>`;
                    listProductHTML.appendChild(newProduct);
                });
            }
        };

        listProductHTML.addEventListener('click', (event) => {
            let positionClick = event.target;
            if (positionClick.classList.contains('addCart')) {
                let id_product = positionClick.parentElement.dataset.id;
                addToCart(id_product);
            }
        });

        const addToCart = (product_id) => {
            let positionThisProductInCart = cart.findIndex((value) => value.product_id == product_id);
            if (cart.length <= 0) {
                cart.push({
                    product_id: product_id,
                    quantity: 1
                });
            } else if (positionThisProductInCart < 0) {
                cart.push({
                    product_id: product_id,
                    quantity: 1
                });
            } else {
                cart[positionThisProductInCart].quantity = cart[positionThisProductInCart].quantity + 1;
            }
            addCartToHTML();
            addCartToMemory();
        };

        const addCartToMemory = () => {
            localStorage.setItem('cart', JSON.stringify(cart));
        };

        const addCartToHTML = () => {
            listCartHTML.innerHTML = '';
            let totalQuantity = 0;
            let subtotalAmount = 0;
            if (cart.length > 0) {
                cart.forEach(item => {
                    totalQuantity += item.quantity;
                    let positionProduct = products.findIndex((value) => value.id == item.product_id);
                    let info = products[positionProduct];
                    subtotalAmount += info.price * item.quantity;
                    let newItem = document.createElement('div');
                    newItem.classList.add('item');
                    newItem.dataset.id = item.product_id;

                    listCartHTML.appendChild(newItem);
                    newItem.innerHTML = `
                    <div class="image">
                        <img src="./products/${info.thumbnail}" alt="product image">
                    </div>
                    <div class="name">
                        ${info.name}
                    </div>
                    <div class="totalPrice">Ksh. ${info.price * item.quantity}</div>
                    <div class="quantity">
                        <span class="minus"><</span>
                        <span>${item.quantity}</span>
                        <span class="plus">></span>
                    </div>
                `;
                });
            }
            iconCartSpan.innerText = totalQuantity;

            // Update payment details
            const taxRate = 0.2; // Example tax rate (20%)
            const taxAmount = subtotalAmount * taxRate;
            const totalAmount = subtotalAmount + taxAmount;
            document.getElementById('subtotalAmount').innerText = subtotalAmount.toFixed(2);
            document.getElementById('taxAmount').innerText = taxAmount.toFixed(2);
            document.getElementById('totalAmount').innerText = totalAmount.toFixed(2);

            // Update cart object with payment details
            cart.subtotal = subtotalAmount.toFixed(2);
            cart.tax = taxAmount.toFixed(2);
            cart.total = totalAmount.toFixed(2);
        };

        listCartHTML.addEventListener('click', (event) => {
            let positionClick = event.target;
            if (positionClick.classList.contains('minus') || positionClick.classList.contains('plus')) {
                let product_id = positionClick.parentElement.parentElement.dataset.id;
                let type = 'minus';
                if (positionClick.classList.contains('plus')) {
                    type = 'plus';
                }
                changeQuantityCart(product_id, type);
            }
        });

        const changeQuantityCart = (product_id, type) => {
            let positionItemInCart = cart.findIndex((value) => value.product_id == product_id);
            if (positionItemInCart >= 0) {
                switch (type) {
                    case 'plus':
                        cart[positionItemInCart].quantity = cart[positionItemInCart].quantity + 1;
                        break;

                    default:
                        let changeQuantity = cart[positionItemInCart].quantity - 1;
                        if (changeQuantity > 0) {
                            cart[positionItemInCart].quantity = changeQuantity;
                        } else {
                            cart.splice(positionItemInCart, 1);
                        }
                        break;
                }
            }
            addCartToHTML();
            addCartToMemory();
        };

        const initApp = () => {
            fetch('products.json')
                .then(response => response.json())
                .then(data => {
                    products = data;
                    addDataToHTML();
                    if (localStorage.getItem('cart')) {
                        cart = JSON.parse(localStorage.getItem('cart'));
                        addCartToHTML();
                    }
                });
        };

        function checkout() {
            if (localStorage.getItem('cart')) {
                var cart = JSON.parse(localStorage.getItem('cart'));
                writeToCartFile(cart);
            } else {
                console.log("Cart is empty.");
            }
        }

        function writeToCartFile(cart) {
            // Generate random string
            var randomString = generateRandomString(20);

            // Calculate subtotal, tax, and total using addCartToHTML() logic
            var subtotalAmount = 0;
            var totalQuantity = 0;
            cart.forEach(item => {
                let positionProduct = products.findIndex((value) => value.id == item.product_id);
                let info = products[positionProduct];
                subtotalAmount += info.price * item.quantity;
                totalQuantity += item.quantity;
            });
            const taxRate = 0.2;
            const taxAmount = subtotalAmount * taxRate;
            const totalAmount = subtotalAmount + taxAmount;

            // Create cart object with random string as key
            var cartObject = {};
            cartObject[randomString] = {
                cart: cart,
                subtotal: subtotalAmount,
                tax: taxAmount,
                total: totalAmount
            };

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "write_cart.php", true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log("Cart data has been written to cart.json");
                    localStorage.removeItem('cart'); // Clear cart from localStorage after successful checkout
                    window.location.href = "Thanks.php"; // Redirect to Thanks.php
                }
            };
            xhr.send(JSON.stringify(cartObject));
        }


        function generateRandomString(length) {
            var result = '';
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for (var i = 0; i < length; i++) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
            return result;
        }

        checkout(); // Call checkout function when the page loads
        initApp();
    </script>

</body>

</html>