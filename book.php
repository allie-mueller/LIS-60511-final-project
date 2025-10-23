<!-- Add your name here: Book Loving Student -->

<?php include('header.php'); ?>

<!-- TASK 2: COMBINE DATA MASHUPS (REST API) -->
<!-- FOLLOW THE EXAMPLES BELOW, AND MODIFY THIS PAGE TO DISPLAY ADDITIONAL DATA FROM THE OPENLIBRARY API -->

<section id="Book">
	<button onclick="history.back()">Go Back</button>
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
			<p id="BookNumberOfPages">[NUMBER OF PAGES]</p>
			<p class="book-detail-label">Subjects:</p>
			<div id="BookSubjects"></div>
		</div>
  	</div>
	<div id="actions-container">
		<div id="action-button" onclick="addToCart()">Add to Cart</div>
		<div id="action-button" onclick="saveForLater()">Save for Later</div>
		<div id="action-button" onclick="addToWishList()">Add to Wishlist</div>
	</div>

</section>

<script>
	const addToCart = () => {
		alert("Added to cart!");
	};

	const saveForLater = () => {
		alert("Saved for later!");
	};

	const addToWishList = () => {
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

        //STEP 3: DISPLAY MORE DATA, USE THE LINES BELOW AS A GUIDE
        //$('#YOUR_ATTRIBUTE1').text(book.YOUR_ATTRIBUTE1);
        //$('#YOUR_ATTRIBUTE2').text(book.YOUR_ATTRIBUTE2);
        //$('#YOUR_ATTRIBUTE3').text(book.YOUR_ATTRIBUTE2);
      }
    });
  });
</script>

<?php include('footer.php'); ?>
