<!-- Danielle Haight -->

<?php include('header.php'); ?>

<section id="Browse">
  <h1>Browse our full catalog</h1>
  <table id="Books">
    <thead>
      <tr id="book-header-row">
        <th>Title</th>
        <th>Author</th>
        <th>Publication Year</th>
        <th>Pages</th>
        <th>Publisher</th>
        <th>Genre</th>
      </tr>
    </thead>
    <tbody></tbody>
  </table>
</section>

<script>
  $(document).ready(function () {
    $.get('data/catalog.json', function (json) {
      var data = json;

      console.log(data.catalog.length + ' books found.');

      $.each(data.catalog, function (index, book) {
        var bookHtml = '';
        bookHtml += '<tr class="book-row" onClick="location.href=\'book.php?isbn=' + book.isbn + '\'">';

        bookHtml += '<td>' + book.title + '</td>';
        bookHtml += '<td>' + book.author + '</td>';
        bookHtml += '<td>' + book.publication_year + '</td>';
        bookHtml += '<td>' + book.pages + '</td>';
        bookHtml += '<td>' + book.publisher + '</td>';
        bookHtml += '<td>' + book.genre + '</td>';

        bookHtml += '</tr>';

        $('#Books tbody').append(bookHtml);
      });
    });
  });
</script>

<?php include('footer.php'); ?>
