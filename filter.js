document.addEventListener("DOMContentLoaded", function () {
    const products = [
        {
            id: "otc-medicine",
            name: "Finix",
            description: "Rabeprazole Sodium",
            manufacturer: "Opsonin Pharma Ltd.",
            price: 126.00,
            oldPrice: 140.00,
            image: "images/finix.jpeg"
        },
        {
            id: "otc-medicine",
            name: "Provair",
            description: "Montelukast",
            manufacturer: "Unimed Unihealth MFG. Ltd.",
            price: 157.50,
            oldPrice: 175.00,
            image: "images/provair.jpeg"
        },
        {
            id: "otc-medicine",
            name: "Omidon",
            description: "Domperidone Maleate",
            manufacturer: "Incepta Pharmaceuticals Ltd.",
            price: 3.15,
            oldPrice: 3.50,
            image: "images/omidon_10.webp"
        },
        {
            id: "otc-medicine",
            name: "Dicaltrol",
            description: "Calcitriol",
            manufacturer: "Drug International Ltd.",
            price: 162.00,
            oldPrice: 180.00,
            image: "images/diactrol.jpeg"
        },
        {
            id: "womens-choice",
            name: "Freedom Heavy Flow Wings",
            description: "Sanitary Napkin",
            manufacturer: "ACI Pharma",
            price: 126.00,
            oldPrice: 140.00,
            image: "images/freedom.jpeg"
        },
        {
            id: "womens-choice",
            name: "Senora Confidence Regular Flow",
            description: "Sanitary Napkin",
            manufacturer: "Bangladesh",
            price: 157.50,
            oldPrice: 175.00,
            image: "images/senora.jpeg"
        },
        {
            id: "womens-choice",
            name: "Joya Sanitary Napkin",
            description: "Sanitary Napkin",
            manufacturer: "Incepta Pharmaceuticals Ltd.",
            price: 3.15,
            oldPrice: 3.50,
            image: "images/joya.jpeg"
        },
        {
            id: "womens-choice",
            name: "Pregnancy Test Kit",
            description: "Pregnancy test",
            manufacturer: "Drug International Ltd.",
            price: 162.00,
            oldPrice: 180.00,
            image: "images/pregnencytest.jpeg"
        },
        {
            id: "diabetic-care",
            name: "Novofine Needle",
            description: "Insulin needle",
            manufacturer: "ACI Pharma",
            price: 126.00,
            oldPrice: 140.00,
            image: "images/novo.jpeg"
        },
        {
            id: "diabetic-care",
            name: "DispoVan Syringe 100IU",
            description: "Diabetic Care",
            manufacturer: "Bangladesh",
            price: 157.50,
            oldPrice: 175.00,
            image: "images/Dispo.jpeg"
        },
        {
            id: "diabetic-care",
            name: "Quick Check Test Strip",
            description: "Diabeties Checker",
            manufacturer: "Incepta Pharmaceuticals Ltd.",
            price: 3.15,
            oldPrice: 3.50,
            image: "images/quickcheck.jpeg"
        },
        {
            id: "diabetic-care",
            name: "Insulin Syringe (Korean)100IU",
            description: "Insulin",
            manufacturer: "Drug International Ltd.",
            price: 162.00,
            oldPrice: 180.00,
            image: "images/insulin.jpeg"
        }
    ];
    
    const categoryLinks = document.querySelectorAll(".sidebar ul li a");
    const categoryTitle = document.getElementById("category-title");
    const productsContainer = document.getElementById("products");
    const searchBar = document.getElementById("search-bar");
    const searchButton = document.getElementById("search-button");

    function displayProducts(category) {
        productsContainer.innerHTML = "";
        const filteredProducts = category === "all" ? products : products.filter(product => product.id === category);
        renderProducts(filteredProducts);
    }

    function searchProducts(query) {
        productsContainer.innerHTML = "";
        const searchQuery = query.toLowerCase();
        const filteredProducts = products.filter(product => 
            product.name.toLowerCase().includes(searchQuery) ||
            product.description.toLowerCase().includes(searchQuery) ||
            product.manufacturer.toLowerCase().includes(searchQuery)
        );
        renderProducts(filteredProducts);
    }

    function renderProducts(productsToShow) {
        productsToShow.forEach(product => {
            const productDiv = document.createElement("div");
            productDiv.classList.add("product");
            productDiv.innerHTML = `
                <img src="${product.image}" alt="${product.name}">
                <h3>${product.name}</h3>
                <p>${product.description}</p>
                <p>${product.manufacturer}</p>
                <p class="price">৳${product.price} <span class="old-price">৳${product.oldPrice}</span></p>
                <a href="#" class="add-to-cart">Add to cart</a>
            `;
            productsContainer.appendChild(productDiv);
        });
    }

    categoryLinks.forEach(link => {
        link.addEventListener("click", function (event) {
            event.preventDefault();
            const category = this.getAttribute("data-category");
            categoryTitle.textContent = this.textContent;
            displayProducts(category);
        });
    });

    searchBar.addEventListener("input", function () {
        const query = this.value;
        searchProducts(query);
    });

    searchButton.addEventListener("click", function (event) {
        event.preventDefault();
        const query = searchBar.value;
        searchProducts(query);
    });

    displayProducts("all"); 
});

