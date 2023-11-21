<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact</title>

</head>

<body>

  <!-- /* --------- Section Map Start ------------- */ -->
  <?php include_once "../includes/header.php"; ?>
  <section class="inner-wrapper header-offset ">
    <div class="container">
      <div class="row text-center">
        <div class="col-lg-6">
          <img src="../images/extra_img/contact.jpg" alt="Contact page" class="img-fluid contact-img">
          <div class="left-align">
            <h3>Address</h3>
            <p>8 Australia Ave, Sydney Olympic Park NSW 2127</p>
            <h4>Additional Information</h4>
            <p >Feel free to reach out to us for any inquiries or assistance. Our team is here to help!</p>
          </div>
        </div>
        <div class="col-lg-6 contact-f-center  text-center">
          <form class="form-contact shadow-style" action="" method="post">
            <div class="form-group">
              <label for="name">Your Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Your name..">
            </div>
            <div class="form-group">
              <label for="email">Your Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Your email..">
            </div>
            <div class="form-group">
              <label for="subject">Subject</label>
              <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject..">
            </div>
            <div class="form-group">
              <label for="message">Your Message</label>
              <textarea class="form-control" id="message" name="message" placeholder="Write something.." style="height:200px"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- /* --------- Section Contact Details Start ------------- */ -->

  <section class="contact-details">
    <div class="container">
      <div class="row">
        <div class="map">
          <h3>Map</h3>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d53016.254649256334!2d151.04266220085657!3d-33.850592606580285!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b12a4b4f9065e99%3A0xac72f4392e6ad6c!2sSydney%20Olympic%20Park%20Aquatic%20Centre!5e0!3m2!1sen!2sau!4v1694817660937!5m2!1sen!2sau" style="border:0; width:100%; height:100%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>



      </div>
  </section>


  </section>
  <?php include_once "../includes/footer.php"; ?>
</body>

</html>