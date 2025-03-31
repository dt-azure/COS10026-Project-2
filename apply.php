<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Job Application Form - Pawsome Studio">
  <title>Pawsome Studio - Application Form</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">

  <!-- CSS -->
  <link rel="stylesheet" href="style/style.css">

  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Flatpickr -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>

<body>

  <!-- Header -->
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


  <!-- Sub-header -->
  <div class="sub-header">
    <h2>Job Application Form</h2>
    <p>Please fill out the form below to submit your job application.</p>
  </div>

  <main class="form-container">
    <form action="job_apply.php" method="post" novalidate="novalidate">


      <!-- Job Reference-->
      <div class="form-group">
        <label for="job-ref">Job Reference Number <span>*</span></label>
        <input type="text" id="job-ref" name="job_ref" pattern="[A-Za-z0-9]{5}" placeholder="AB000" required>
      </div>

      <!-- Name -->
      <div class="form-group">
        <label for="first-name">Name <span>*</span></label>
        <div class="name-fields">
          <input type="text" id="first-name" name="first_name" placeholder="First Name" required>
          <input type="text" id="last-name" name="last_name" placeholder="Last Name" required>
        </div>
      </div>


      <!-- Date of Birth & Gender in one row -->
      <div class="form-group-row">
        <!-- Date of Birth -->
        <div class="form-group half-width">
          <label for="dob">Date of Birth <span>*</span></label>
          <input type="text" id="dob" name="dob" required>
        </div>

        <!-- Gender Selection -->
        <div class="form-group half-width">
          <label for="gender">Gender <span>*</span></label>
          <select id="gender" name="gender" required>
            <option value="" disabled selected>Select your gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
            <option value="Prefer not to say">Prefer not to say</option>
          </select>
        </div>
      </div>

      <!-- Email & Phone -->
      <div class="form-group">
        <label for="email">E-mail <span>*</span></label>
        <input type="email" id="email" name="email" placeholder="ex: myname@example.com" required>
      </div>

      <div class="form-group">
        <label for="phone">Phone Number <span>*</span></label>
        <input type="tel" id="phone" name="phone" placeholder="000 000 0000" required>
      </div>

      <!-- Address Information -->
      <div class="form-group">
        <label for="street-address">Street Address <span>*</span></label>
        <input type="text" id="street-address" name="street_address" maxlength="40" placeholder="Enter your street address" required>
      </div>

      <div class="form-group">
        <label for="suburb-town">Suburb/Town <span>*</span></label>
        <input type="text" id="suburb-town" name="suburb_town" maxlength="40" placeholder="Enter your suburb/town" required>
      </div>

      <!-- State & Postcode -->
      <div class="form-group-row">
        <!-- State Selection -->
        <div class="form-group half-width">
          <label for="state">State <span>*</span></label>
          <select id="state" name="state" required>
            <option value="" disabled selected>Select your state</option>
            <option value="VIC">VIC</option>
            <option value="NSW">NSW</option>
            <option value="QLD">QLD</option>
            <option value="NT">NT</option>
            <option value="WA">WA</option>
            <option value="SA">SA</option>
            <option value="TAS">TAS</option>
            <option value="ACT">ACT</option>
          </select>
        </div>

        <!-- Postcode -->
        <div class="form-group half-width">
          <label for="postcode">Postcode <span>*</span></label>
          <input type="text" id="postcode" name="postcode" pattern="\d{4}" maxlength="4" placeholder="4-digit postcode" required>
        </div>
      </div>


      <!-- Applied Position -->
      <div class="form-group">
        <label for="position">Applied Position</label>
        <select id="position" name="position">
          <option value="Web Developer">Web Developer</option>
          <option value="Research Scientist">Research Scientist</option>
          <option value="Data Analyst">Data Analyst</option>
          <option value="UX/UI Designer">UX/UI Designer</option>
          <option value="DevOps Engineer">DevOps Engineer</option>
          <option value="Cybersecurity Analyst">Cybersecurity Analyst</option>
          <option value="Cloud Architect">Cloud Architect</option>
          <option value="IT Support Specialist">IT Support Specialist</option>
        </select>
      </div>

      <!-- Preferred Interview Date -->
      <div class="form-group">
        <label for="interview-date">Preferred Interview Date</label>
        <input type="date" id="interview-date" name="interview-date" required>
      </div>

      <!-- Preferred Interview Time -->
      <div class="form-group">
        <label>Preferred Interview Time</label>
        <div class="time-slots">
          <input type="radio" id="time-1" name="interview-time" class="time-radio">
          <label for="time-1" class="time-button">8:30 AM</label>

          <input type="radio" id="time-2" name="interview-time" class="time-radio">
          <label for="time-2" class="time-button">11:30 AM</label>

          <input type="radio" id="time-3" name="interview-time" class="time-radio">
          <label for="time-3" class="time-button">14:00 PM</label>

          <input type="radio" id="time-4" name="interview-time" class="time-radio">
          <label for="time-4" class="time-button">16:00 PM</label>
        </div>
      </div>


      <!-- Skill List in Table -->
      <div class="form-group">
        <label>Skill List <span>*</span></label>
        <table class="skill-table">
          <tr>
            <td><label for="skill-frontend">Front-end Programming</label></td>
            <td><input type="checkbox" id="skill-frontend" name="skills[]" value="Front-end Programming"></td>
          </tr>
          <tr>
            <td><label for="skill-backend">Back-end Programming</label></td>
            <td><input type="checkbox" id="skill-backend" name="skills[]" value="Back-end Programming"></td>
          </tr>
          <tr>
            <td><label for="skill-ml">Machine Learning/ Deep Learning</label></td>
            <td><input type="checkbox" id="skill-ml" name="skills[]" value="Machine Learning/ Deep Learning"></td>
          </tr>
          <tr>
            <td><label for="skill-data">Data Analysis</label></td>
            <td><input type="checkbox" id="skill-data" name="skills[]" value="Data Analysis"></td>
          </tr>
          <tr>
            <td><label for="skill-ux">UX/UI Design</label></td>
            <td><input type="checkbox" id="skill-ux" name="skills[]" value="UX/UI Design"></td>
          </tr>
          <tr>
            <td><label for="skill-ci">Continuous integration and continuous delivery (CI/CD)</label></td>
            <td><input type="checkbox" id="skill-ci" name="skills[]" value="CI/CD"></td>
          </tr>
          <tr>
            <td><label for="skill-cyber">Cybersecurity</label></td>
            <td><input type="checkbox" id="skill-cyber" name="skills[]" value="Cybersecurity"></td>
          </tr>
          <tr>
            <td><label for="skill-cloud">Cloud Computing</label></td>
            <td><input type="checkbox" id="skill-cloud" name="skills[]" value="Cloud Computing"></td>
          </tr>
          <tr>
            <td><label for="skill-troubleshooting">Hardware and Software Troubleshooting</label></td>
            <td><input type="checkbox" id="skill-troubleshooting" name="skills[]" value="Hardware and Software Troubleshooting"></td>
          </tr>
        </table>
      </div>

      <!-- Other skills -->
      <div class="form-group">
        <label for="other-skills">Other skills</label>
        <textarea id="other-skills" name="other_skills" placeholder="List your addition skills here..."></textarea>
      </div>

      <!-- Resume Upload -->
      <div class="form-group">
        <label for="resume">Upload Resume <span>*</span></label>
        <input type="file" id="resume" name="resume" aria-label="Upload Resume">
      </div>

      <!-- Additional Documents -->
      <div class="form-group">
        <label for="additional-docs">Any Other Documents</label>
        <input type="file" id="additional-docs" name="additional_docs">
      </div>

      <!-- Submit Button -->
      <button type="submit" class="apply-button">Apply</button>

    </form>
  </main>

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

  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script>
    flatpickr("#dob", {
      dateFormat: "d/m/Y", // Ex:"10-Jul-2020"
      allowInput: true,
      altInput: true, // Alt input will be displayed, while the original input will be submitted with the form
      altFormat: "d-M-y"
    });

    flatpickr("#interview-date", {
      dateFormat: "d/m/Y", // Ex:"10-Jul-2020"
      allowInput: true,
      altInput: true,
      altFormat: "d-M-y"
    });
  </script>
</body>

</html>