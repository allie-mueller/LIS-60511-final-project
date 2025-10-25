<!-- Danielle Haight -->

<?php
  include('header.php')
?>

<section id="SurveyResponse">
    <?php
      echo('<b>First Name: </b>');
      echo($_POST['FirstName']);
      echo('<br/>');
      echo('<b>Last Name: </b>');
      echo($_POST['LastName']);
      echo('<br/>');
      echo('<b>Email: </b>');
      echo($_POST['Email']);
      echo('<br/>');
      echo('<b>Comment: </b>');
      echo($_POST['comment_text']);
      echo('<br/>');
    ?>
</section>
<p>Thank you for your feedback! We will respond within 7-10 business weeks</p>
<br>
<button class="buttons" type="button" onclick="history.back()">Return</button>

<?php
  include('footer.php');
?>
