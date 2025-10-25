<!-- Danielle Haight -->

<?php include('header.php'); ?>

<section id="Home">
    <h1>Shopping Cart</h1>
    <p>Here you will find items you have added to your cart, saved for later, or added to your wishlist.</p>
    <div id="clear-cart-container">
        <div id="action-button" onclick="clearCart()">Clear Cart</div>
	</div>

    <div id="cart-contents">
        <h2>Cart</h2>
    </div>
    <div id="save-for-later-contents">
        <h2>Save for Later</h2>
    </div>
    <div id="wishlist-contents">
        <h2>Wishlist</h2>
    </div>
</section>

<script>
    const clearCart = () => {
        localStorage.removeItem("cart");
        location.reload();
    };

    const loadCartContents = () => {
        var cart = localStorage.getItem("cart");
        var cartJson = JSON.parse(cart);
        if (!cartJson) {
            cartJson = { 
                cart: [],
                savedForLater: [],
                wishList: []
            };
        }

        const renderItems = (items, containerId) => {
            const container = document.getElementById(containerId);
            if (items.length === 0) {
                container.innerHTML += "<p>No items.</p>";
            } else {
                var html = `
                    <table>
                        <thead>
                            <tr>
                                <th>Cover</th>
                                <th>Title</th>
                                <th>ISBN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                `;

                items.forEach(item => {
                    html += `
                            <tr>
                                <td><img src="${item.image}" alt="${item.title}" style="height:75px;"/></td>
                                <td>${item.title}</td>
                                <td>${item.isbn}</td>
                            </tr>
                    `;
                });

                html += `
                        </tbody>
                    </table>
                `;

                container.innerHTML += html;
            }
        };

        renderItems(cartJson.cart, "cart-contents");
        renderItems(cartJson.savedForLater, "save-for-later-contents");
        renderItems(cartJson.wishList, "wishlist-contents");
    };

    window.onload = loadCartContents;
</script>

<?php include('footer.php'); ?>
