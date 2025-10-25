<!-- Danielle Haight -->

<?php include('header.php'); ?>

<section id="Contact">
  <h1>Contact Form</h1>
  <p>Thank you for shopping with Books Unlimited! We’re always looking for ways to make your reading and shopping experience even better. Please use this contact form to share your thoughts, questions, or concerns with us.
  </p>
  <form action="submit.php" method="post">
    <div class="survey-items">
      <label class="survey-label-text">First Name:</label>
      <input type="text" name="FirstName" maxlength="100" required/><br/>
    </div>
    <div class="survey-items">
      <label class="survey-label-text">Last Name:</label>
      <input type="text" name="LastName" maxlength="100" required/><br/>
    </div>
    <div class="survey-items">
      <label class="survey-label-text">E-mail Address:</label>
      <input type="text" name="Email" maxlength="100" required/><br/>
    </div>
    <br />
    <label for="comment_text">Comments or questions:</label><br>
    <textarea id="comment_text" name="comment_text" rows="5" cols="70" maxlength="250"></textarea>
    <br><br>

    <input class="buttons" type="submit" value="Submit Feedback">
    <input class="buttons" type="reset" value="Reset">

  </form>

</section>

<?php include('footer.php'); ?>
