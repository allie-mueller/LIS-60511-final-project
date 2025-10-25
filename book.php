<!-- Add your name here: Book Loving Student -->

<?php include('header.php'); ?>

<!-- TASK 2: COMBINE DATA MASHUPS (REST API) -->
<!-- FOLLOW THE EXAMPLES BELOW, AND MODIFY THIS PAGE TO DISPLAY ADDITIONAL DATA FROM THE OPENLIBRARY API -->

<section id="Book">
	<div id="back-button-container">
		<div class="back-button" id="action-button" onclick="history.back()"><- Go Back</div>
	</div>
	<div id="title-container">
		<h2 id="BookTitle">[TITLE]</h2>
	</div>
	<div id="content-container">
		<div id="image-container">
			<img id="BookCover" />
		</div>
		<div id="details-container">
			<p class="book-detail-label">Author:</p>
			<p id="BookAuthor">[AUTHOR]</p>
			<p class="book-detail-label">Publication Date:</p>
			<p id="BookPublicationDate">[PUBLICATION DATE]</p>
			<p class="book-detail-label">Publisher:</p>
			<p id="BookPublisher">[PUBLISHER]</p>
			<p class="book-detail-label">Number of Pages:</p>
			<p id="BookNumberOfPages">N/A</p>
		</div>
		<p class="book-detail-label">Subjects:</p>
		<div id="BookSubjects"></div>
  	</div>
	<div id="actions-container">
		<div id="action-button" onclick="addToCart()">Add to Cart</div>
		<div id="action-button" onclick="saveForLater()">Save for Later</div>
		<div id="action-button" onclick="addToWishList()">Add to Wishlist</div>
	</div>

</section>

<script>
	var currentBook;

	const addToCart = () => {
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
			isbn: currentBook.ISBN,
			title: currentBook.title,
			image: currentBook.cover.medium
		};
		cartJson.cart.push(item);
		localStorage.setItem("cart", JSON.stringify(cartJson));
		console.log(cartJson);
		alert("Added to cart!");
	};

	const saveForLater = () => {
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
			isbn: currentBook.ISBN,
			title: currentBook.title,
			image: currentBook.cover.medium
		};
		cartJson.savedForLater.push(item);
		localStorage.setItem("cart", JSON.stringify(cartJson));
		console.log(cartJson);
		alert("Saved for later!");
	};

	const addToWishList = () => {
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
			isbn: currentBook.ISBN,
			title: currentBook.title,
			image: currentBook.cover.medium
		};
		cartJson.wishList.push(item);
		localStorage.setItem("cart", JSON.stringify(cartJson));
		console.log(cartJson);
		alert("Added to wishlist!");
	};


  $(document).ready(function () {
    //The line below retrieves the value of ISBN from the URL using $_GET
    //This value is passed to book.php from the browse.php file when clicking on the title of a book
    var isbn = '<?php if(isset($_GET['isbn'])) echo($_GET['isbn']); ?>';
    var url = 'https://openlibrary.org/api/books?format=json&jscmd=data&bibkeys=ISBN:' + isbn;

    $.get({
      url: encodeURI(url),
      dataType: "jsonp",
      success: function (data) {
        //STEP 1: EXPLORE DATA RETURNED FROM THE OPENLIBRARY API
        //uncomment the line below to view the data in the debugger console (F12)
        console.log(data);

        var book = data['ISBN:' + isbn];
		book.ISBN = isbn;
		currentBook = book;

        $('#BookTitle').text(book.title);
        $('#BookNotes').text(book.notes);
        $('#BookCover').attr('src', book.cover.large);
        $('#BookAuthor').text(book.authors.map(author => author.name).join(', '));
        $('#BookPublicationDate').text(book.publish_date);
        $('#BookPublisher').text(book.publishers.map(publisher => publisher.name).join(', '));
        $('#BookNumberOfPages').text(book.number_of_pages);
        $('#BookSubjects').text(book.subjects.map(subject => subject.name).join(', '));

		const subjectsContainer = document.getElementById('BookSubjects');
		subjectsContainer.innerHTML = '';
		book.subjects.forEach((subject) => {
			const subjectDiv = document.createElement('div');
			subjectDiv.textContent = subject.name;
			subjectDiv.addEventListener('click', () => {
				window.open(subject.url, '_blank');
			});
			subjectDiv.classList.add('subject-item');
			subjectDiv.id=subject.name.replace(/\s+/g, '-').toLowerCase();
			subjectsContainer.appendChild(subjectDiv);
		});
      }
    });
  });
</script>

<?php include('footer.php'); ?>
