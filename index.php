<!-- Add your name here: Dedicated Student -->

<!-- TASK 1: CONSTRUCT A WEBSITE LAYOUT -->

<!-- STEP 1: EDIT THE HEADER.PHP FILE -->
<?php include('header.php'); ?>

<!-- STEP 2: EDIT THE INDEX.PHP FILE -->
<section id="Home">
  	<h1>Welcome to Books Unlimited</h1>
  	<p>
		This is your neighborhood bookstore with limitless shelves and a lifelong love of reading. What began decades ago as a small family-run shop in New York City has grown into a cherished community of readers across the Tri-State area and beyond. Today, we offer an ever-expanding collection that spans every genre and generation — from current bestsellers and literary classics to rare editions, collector’s finds, and hidden gems waiting to be discovered.
	</p>
	<p>
		Whether you’re browsing in one of our cozy stores or exploring our online shelves, you’ll always find the same care, expertise, and genuine enthusiasm that have guided us from the start. At Books Unlimited, we believe a great bookstore should feel like home — a place to connect, get inspired, and find your next favorite story.
	</p>
  	<section class="homepage-section">
    	<h2>Best Sellers</h2>
    	<p>Discover our top-selling books that readers can't get enough of. From thrilling mysteries to heartwarming romances, our best sellers are sure to captivate your imagination.</p>
		<div class="homepage-book-section-container">
			<div class="homepage-book-section">
				<div id="best-seller-1"></div>
				<div id="best-seller-2"></div>
				<div id="best-seller-3"></div>
			</div>
		</div>
	</section>
  	<section class="homepage-section">
    	<h2>New Arrivals</h2>
    	<p>Be the first to explore our latest additions! Our new arrivals section features the hottest titles and freshest voices in literature, ensuring you never miss out on the next big thing.</p>
		<div class="homepage-book-section-container">
			<div class="homepage-book-section">
				<div id="new-arrival-1"></div>
				<div id="new-arrival-2"></div>
				<div id="new-arrival-3"></div>
			</div>
		</div>	
	</section>
	<section class="homepage-section">
    	<h2>Staff Picks</h2>
    	<p>Our staff has curated a selection of their favorite reads just for you. From hidden gems to beloved classics, these are the books we can't stop talking about.</p>
		<div class="homepage-book-section-container">
			<div class="homepage-book-section">
				<div id="staff-pick-1"></div>
				<div id="staff-pick-2"></div>
				<div id="staff-pick-3"></div>
			</div>
		</div>
	</section>

	<section class="homepage-section">
		<h2>Store Stats</h2>
		<table id="stats-table">
			<thead>
				<tr id="book-header-row">
					<th>Stat</th>
					<th>Value</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Number of Locations</td>
					<td>83</td>
				</tr>
				<tr>
					<td>Years in Business</td>
					<td>25</td>
				</tr>
				<tr>
					<td>Books Sold</td>
					<td>1,000,000+</td>
				</tr>
				<tr>
					<td>Customer Reviews</td>
					<td>10,000+</td>
				</tr>
			</tbody>
		</table>
	</section>
</section>

<script>

	const addToCart = (isbn) => {
		const url = 'https://openlibrary.org/api/books?format=json&jscmd=data&bibkeys=ISBN:' + isbn;
		$.get({
			url: encodeURI(url),
			dataType: "jsonp",
			success: function (data) {
				var book = data['ISBN:' + isbn];

				var cart = localStorage.getItem("cart");
				var cartJson = JSON.parse(cart);
				if (!cartJson) {
					cartJson = { 
						cart: [],
						savedForLater: [],
						wishList: []
					};
				}

				var item = {
					isbn: isbn.toString(),
					title: book.title,
					image: book.cover.medium
				};
				cartJson.cart.push(item);
				localStorage.setItem("cart", JSON.stringify(cartJson));
				console.log(cartJson);
				alert("Added to cart!");
			}
		});
	};

	const loadHomePageBooks = () => {
		const loadBook = (isbn, containerId) => {
			const url = 'https://openlibrary.org/api/books?format=json&jscmd=data&bibkeys=ISBN:' + isbn;
			$.get({
				url: encodeURI(url),
				dataType: "jsonp",
				success: function (data) {
					var book = data['ISBN:' + isbn];
					const container = document.getElementById(containerId);

					var html = `
						<div class="book-item">
							<img class="book-image" src="${book.cover.medium}" alt="${book.title} Cover" class="book-cover">
							<h3 class="book-title">${book.title}</h3>
							<p class="book-author">by ${book.authors.map(author => author.name).join(', ')}</p>
							<div class="homepage-book-actions">
								<div id="action-button" onClick="location.href='book.php?isbn=${isbn}'">View</div>
								<div id="action-button" onclick="addToCart(${isbn})">Add to Cart</div>
							</div>
						</div>
					`;
					container.innerHTML = html;
				}
			});
		};

		// Best Sellers
		loadBook("9781250899651", 'best-seller-1');
		loadBook("9780307744432", 'best-seller-2');
		loadBook("9780804139021", 'best-seller-3');

		// New Arrivals
		loadBook("9781250621801", 'new-arrival-1');
		loadBook("9781250301697", 'new-arrival-2');
		loadBook("9780735269934", 'new-arrival-3');

		// Staff Picks
		loadBook("9780385542364", 'staff-pick-1');
		loadBook("9781400078776", 'staff-pick-2');
		loadBook("9780316556347", 'staff-pick-3');


	};

	window.onload = loadHomePageBooks;
</script>

<?php include('footer.php'); ?>
