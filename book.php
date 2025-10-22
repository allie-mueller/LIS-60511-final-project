<!-- Add your name here: Book Loving Student -->

<?php include('header.php'); ?>

<!-- TASK 2: COMBINE DATA MASHUPS (REST API) -->
<!-- FOLLOW THE EXAMPLES BELOW, AND MODIFY THIS PAGE TO DISPLAY ADDITIONAL DATA FROM THE OPENLIBRARY API -->

<section id="Book">
  <h1 id="BookTitle">[TITLE]</h1>
  <img id="BookCover" />
  <p id="BookAuthor">[AUTHOR]</p>
  <p id="BookPublicationDate">[PUBLICATION DATE]</p>
  <p id="BookPublisher">[PUBLISHER]</p>
  <p id="BooknNumberOfPages">[NUMBER OF PAGES]</p>
  <p id="BookSubjects">[SUBJECTS]</p>


    <!--STEP 2: ADD MORE ELEMENTS, USE THE LINES BELOW AS A GUIDE -->
    <!--<span id="YOUR_ATTRIBUTE1"></span>-->
    <!--<span id="YOUR_ATTRIBUTE2"></span>-->
    <!--<span id="YOUR_ATTRIBUTE3"></span>-->

</section>

<script>
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
        $('#BooknNumberOfPages').text(book.number_of_pages);
        $('#BookSubjects').text(book.subjects.map(subject => subject.name).join(', '));

        //STEP 3: DISPLAY MORE DATA, USE THE LINES BELOW AS A GUIDE
        //$('#YOUR_ATTRIBUTE1').text(book.YOUR_ATTRIBUTE1);
        //$('#YOUR_ATTRIBUTE2').text(book.YOUR_ATTRIBUTE2);
        //$('#YOUR_ATTRIBUTE3').text(book.YOUR_ATTRIBUTE2);
      }
    });
  });
</script>

<?php include('footer.php'); ?>
