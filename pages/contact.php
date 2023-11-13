<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact</title>
</head>
<body>
  
<!-- /* --------- Section Map Start ------------- */ -->

<section class="inner-wrapper">
  

  <div class="col span_1_of_2">
    <div class="container">
      <form action="action_page.php" method="post">
        <label for="organization">Name of Organization</label>
        <input type="text" id="organization" name="organization" placeholder="Organization..">

        <label for="purpose">Purpose</label>
        <input type="text" id="purpose" name="purpose" placeholder="Purpose..">

        <label for="country">Country</label>
        <select id="country" name="country">
          <option value="australia">Australia</option>
          <option value="uk">UK</option>
          <option value="usa">USA</option>
        </select>

        <label for="shortInfo">Short Info</label>
        <textarea id="shortInfo" name="shortInfo" placeholder="Write something.." style="height:200px"></textarea>

        <input type="submit" value="Submit">
      </form>
    </div>
  </div>

  <!-- /* --------- Section Contact Details Start ------------- */ -->

  <section class="contact-details">
    <div class="container">
      <h2>Contact Details</h2>
      <p>Email: info@example.com</p>
      <p>Phone: +1 234 567 890</p>
      <p>Address: 123 Main Street, Cityville</p>
    </div>
  </section>

  <!-- /* --------- Section Additional Info Start ------------- */ -->

  <section class="additional-info">
    <div class="container">
      <h2>Additional Information</h2>
      <p>Feel free to reach out to us for any inquiries or assistance. Our team is here to help!</p>
    </div>
  </section>

  <div class="map">
    <div id="googleMap" style="width:100%;">
      <h3>Map</h3>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d53016.254649256334!2d151.04266220085657!3d-33.850592606580285!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b12a4b4f9065e99%3A0xac72f4392e6ad6c!2sSydney%20Olympic%20Park%20Aquatic%20Centre!5e0!3m2!1sen!2sau!4v1694817660937!5m2!1sen!2sau" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>
</section>

</body>
</html>
