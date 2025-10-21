<!-- Add your name here: Astute Student -->

<?php include('header.php'); ?>

<!-- TASK 2: COMBINE DATA MASHUPS (JSON DATA) -->
<!-- FOLLOW THE EXAMPLES BELOW, AND MODIFY THIS PAGE TO DISPLAY ADDITIONAL DATA FROM THE CATALOG.JSON FILE -->

<!-- STEP 1: EDIT DATA/CATALOG.JSON BY ADDING ADDITIONAL ATTRIBUTES AND RECORDS -->

<section id="Browse">
  <h1>[ADD HEADER TEXT]</h1>
  <table id="Books">
    <thead>
      <tr>
        <th>Title</th>
        <th>Author</th>
        <!--STEP 2: ADD MORE COLUMNS TO THE TABLE, USE THE LINES BELOW AS A GUIDE-->
        <!--<th>YOUR_ATTRIBUTE1</th>-->
        <!--<th>YOUR_ATTRIBUTE2</th>-->
        <!--<th>YOUR_ATTRIBUTE3</th>-->
      </tr>
    </thead>
    <tbody></tbody>
  </table>
</section>

<script>
  $(document).ready(function () {
    $.get('data/catalog.json', function (json) {
      var data = json;

      $.each(data.catalog, function (index, book) {
        var bookHtml = '';
        bookHtml += '<tr>';
        bookHtml += '<td><a href="book.php?isbn=' + book.isbn + '">' + book.title + '</a></td>';
        bookHtml += '<td>' + book.author + '</td>';

        //STEP 3: DISPLAY MORE DATA, USE THE LINES BELOW AS A GUIDE
        //bookHtml += '<td>' + book.YOUR_ATTRIBUTE1 + '</td>';
        //bookHtml += '<td>' + book.YOUR_ATTRIBUTE2 + '</td>';
        //bookHtml += '<td>' + book.YOUR_ATTRIBUTE3 + '</td>';

        bookHtml += '</tr>';

        $('#Books tbody').append(bookHtml);
      });
    });
  });
</script>

<?php include('footer.php'); ?>
