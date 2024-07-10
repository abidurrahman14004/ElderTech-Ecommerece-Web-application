document.addEventListener("DOMContentLoaded", function () {
    const cartButton = document.querySelector("#cart-button");
    const cartSidebar = document.querySelector("#cart-sidebar");
    const cartItemsContainer = document.querySelector("#cart-items");
    const cartTotal = document.querySelector("#cart-total");

    // Toggle the cart sidebar
    function toggleCartSidebar() {
        cartSidebar.classList.toggle("open");
    }

    cartButton.addEventListener("click", function () {
        toggleCartSidebar();
    });

    // Clear the cart
    document.querySelector("#clear-cart").addEventListener("click", function () {
        cartItemsContainer.innerHTML = "";
        updateCartTotal();
    });

    // Buy button click event
    document.querySelector(".buy-now").addEventListener("click", function () {
        alert("Items bought successfully");
        const cartItems = [];
        const cartItemElements = cartItemsContainer.querySelectorAll(".cart-item");

        cartItemElements.forEach(item => {
            const name = item.getAttribute('data-name');
            const price = parseFloat(item.querySelector(".item-details p").textContent.replace("Price: ৳", ""));
            const quantity = parseInt(item.querySelector(".item-quantity").textContent);
            cartItems.push({ name, price, quantity });
        });

        const totalPrice = cartItems.reduce((sum, item) => sum + item.price * item.quantity, 0);

        fetch('cart.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(cartItems),
        })
        .then(response => response.json())
        .then(data => {
            console.log('Success:', data);
            alert(data.message);
            if (data.status === 'success') {
                cartItemsContainer.innerHTML = "";
                updateCartTotal();
            }
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    });

    document.getElementById("products").addEventListener("click", function (event) {
        if (event.target.classList.contains("add-to-cart")) {
            const product = event.target.closest(".product");
            const productInfo = {
                image: product.querySelector("img").src,
                name: product.querySelector("h3").textContent,
                price: parseFloat(product.querySelector(".price").textContent.replace("৳", "")),
                quantity: 1 
            };
            addToCart(productInfo);
        }
    });

    function addToCart(item) {
        const existingCartItem = cartItemsContainer.querySelector(`[data-name="${item.name}"]`);

        if (existingCartItem) {
            const quantityElement = existingCartItem.querySelector(".item-quantity");
            let quantity = parseInt(quantityElement.textContent);
            quantity++;
            quantityElement.textContent = quantity;
        } else {
            const cartItem = document.createElement("div");
            cartItem.classList.add("cart-item");
            cartItem.setAttribute("data-name", item.name);
            cartItem.innerHTML = `
                <img src="${item.image}" alt="${item.name}">
                <div class="item-details">
                    <h4>${item.name}</h4>
                    <p>Price: ৳${item.price}</p>
                    <p>Quantity: <span class="item-quantity">1</span></p>
                </div>
                <button class="delete-item">Delete</button>
            `;
            cartItemsContainer.appendChild(cartItem);
        }

        updateCartTotal();
    }

    function updateCartTotal() {
        const cartItems = cartItemsContainer.querySelectorAll(".cart-item");
        let total = 0;
        cartItems.forEach(item => {
            const price = parseFloat(item.querySelector(".item-details p").textContent.replace("Price: ৳", ""));
            const quantity = parseInt(item.querySelector(".item-quantity").textContent);
            total += price * quantity;
        });
        cartTotal.textContent = total.toFixed(2);
    }

    cartItemsContainer.addEventListener("click", function (event) {
        if (event.target.classList.contains("delete-item")) {
            const item = event.target.closest(".cart-item");
            item.remove();
            updateCartTotal();
        }
    });
});
