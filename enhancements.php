<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Home Page for The Pawsome Studio" />
  <meta name="author" content="Group: Pawsome" />
  <title>Enhancments</title>

  <!-- Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet" />

  <!-- CSS -->
  <link rel="stylesheet" href="./style/style.css" />

  <!-- FontAwesome -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />
</head>

<body>
  <header>
    <div class="container">
      <div class="header-content">
        <a href="index.php" class="logo">
          <img
            src="./images/logo/company-logo-black.png"
            alt="Company logo"
            class="company-logo" />
          <h1>The <span>Pawsome</span> Studio</h1>
        </a>

        <div class="navbar">
          <ul class="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="jobs.php">Careers</a></li>
            <li><a href="apply.php">Apply</a></li>
            <li><a href="manage.php">Manage</a></li>
            <li>
              <a href="https://www.youtube.com/watch?v=mN3498thVL4">Video Demo</a>
            </li>
            <li><a href="enhancements.php">Enhancements</a></li>
          </ul>

          <button
            class="main-btn contact-btn"
            type="button"
            aria-label="Contact Us"
            onclick="window.location.href='mailto:105508266@student.swin.edu.au'">
            Contact
          </button>
        </div>
      </div>
    </div>
  </header>

  <section class="enhancements">
    <div class="container">
      <div class="section-content">
        <h2 class="section-header">Enhancements For the Website</h2>

        <table>
          <thead>
            <tr>
              <th>#</th>
              <th>Enhancement</th>
              <th>Details</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>1</td>
              <td>Responsiveness</td>
              <td>
                <p>Utilizing flexbox and grid to adjust layout for different screen sizes.</p>
                <p>Example: <a href="index.html#footer">Footer</a> of the homepage</p>
                <p>Large screen size:</p>
                <img src="./images/example_1.png" alt="Example 1">
                <p>Small screen size:</p>
                <img src="./images/example_2.png" alt="Example 2">
                <p>With grid we can easily decide the layout of the content. Here for medium screen size we have the first 2 items on the first row of the grid, and the last item to take up the whole second row:</p>
                <img src="./images/example_3.png" alt="Example 3">
                <p>Then for small screen size we can have only one item each row:</p>
                <img src="./images/example_4.png" alt="Example 4">
                <p>3 different screen sizes in comparison:</p>
                <img src="./images/example_5.png" alt="Example 5">
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <footer id="footer">
    <div class="container">
      <div class="footer-content">
        <div class="social-links">
          <a href="index.php" class="logo">
            <!-- <img src="./img/logo/company-logo-blue.png" alt="company-logo" class="company-logo"> -->
            <h1>
              The <br />
              <span>Pawsome</span> Studio
            </h1>
          </a>

          <ul class="socials">
            <li>
              <a href="facebook.com"><img
                  src="./images/logo/facebook-white.png"
                  alt="Facebook logo" /></a>
            </li>
            <li>
              <a href="instagram.com"><img
                  src="./images/logo/instagram-white.png"
                  alt="Instagram logo" /></a>
            </li>
            <li>
              <a href="linkedin.com"><img
                  src="./images/logo/linkedin-white.png"
                  alt="Linkedin logo" /></a>
            </li>
            <li>
              <a href="github.com"><img src="./images/logo/github-white.png" alt="Github logo" /></a>
            </li>
          </ul>
        </div>

        <div>
          <h3 class="footer-header">Links</h3>
          <ul class="footer-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="jobs.php">Careers</a></li>
            <li><a href="enhancements.php">Enhancements</a></li>
            <li><a href="apply.php">Apply</a></li>
            <li>
              <a href="https://www.youtube.com/watch?v=mN3498thVL4">Video Demo</a>
            </li>
          </ul>
        </div>

        <div class="newsletter">
          <h3 class="footer-header">Newsletter</h3>
          <div class="email-input">
            <input type="text" placeholder="Email Address" />
            <button aria-label="Subscribe to Newsletter">
              <i class="fa-solid fa-paper-plane"></i>
            </button>
          </div>
          <p>
            Subscribe to our newsletter for the latest update on the industry
          </p>
        </div>
      </div>
      <p class="copyright">
        © 2025 The Pawsome Studio. All rights reserved | Designed by The
        Pawsome Studio
      </p>
    </div>
  </footer>
</body>

</html>