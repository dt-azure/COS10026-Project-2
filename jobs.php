<?php
session_start();
require_once "settings.php";
// Create connection
$conn = new mysqli($host, $user, $pwd, $sql_db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare a secure SQL statement
$sql = "SELECT job_ref_num, title, report_to, salary, brief_description, description, qualifications FROM jobs WHERE status = ?";
$stmt = $conn->prepare($sql);
$status = 'Up';
$stmt->bind_param("s", $status); // "s" = string type parameter

// Execute query
$stmt->execute();
$result = $stmt->get_result();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Job Opportunities - Pawsome Studio">
    <title>Pawsome Studio - Job Opportunities</title>

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
</head>

<body>
    <!-- Header -->
    <header>
        <div class="container">
          <div class="header-content">
            <a href="index.html" class="logo">
              <img
                src="./images/logo/company-logo-black.png"
                alt="Company logo"
                class="company-logo"
              />
              <h1>The <span>Pawsome</span> Studio</h1>
            </a>
  
            <div class="navbar">
              <ul class="menu">
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="jobs.html">Careers</a></li>
                <li><a href="apply.html">Apply</a></li>
                <li>
                  <a href="https://www.youtube.com/watch?v=mN3498thVL4"
                    >Video Demo</a
                  >
                </li>
                <li><a href="enhancements.html">Enhancements</a></li>
              </ul>
  
              <button
                class="main-btn contact-btn"
                type="button"
                aria-label="Contact Us"
                onclick="window.location.href='mailto:105508266@student.swin.edu.au'"
              >
                Contact
              </button>
            </div>
          </div>
        </div>
      </header>

    <div class="job-description">
        <main>
            <div class="left-side">
                <h1>IT Job Positions</h1>
                <?php 
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<section><details>
                                <summary>" . htmlspecialchars($row['title']) . "</summary>
                                <p><strong>Reference Number:</strong> " . htmlspecialchars($row['job_ref_num']) . "</p>
                                <p><strong>Salary Range:</strong> " . htmlspecialchars($row['salary']) . "</p>
                                <p><strong>Reports to:</strong> " . htmlspecialchars($row['report_to']) . "</p>
                                <h2>Job Description</h2>
                                <p>" . nl2br(htmlspecialchars($row['brief_description'])) . "</p>
                                <h3>Responsibilities</h3>
                                <p>" . nl2br(htmlspecialchars($row['description'])) . "</p>";

                        // Decode JSON qualifications
                        $qualifications = json_decode($row['qualifications'], true);
                        if ($qualifications) {
                            echo "<h2>Qualifications</h2>";
                            foreach ($qualifications as $category => $items) {
                                echo "<h3>" . htmlspecialchars($category) . "</h3><ul>";
                                foreach (explode(". ", $items) as $item) {
                                    if (!empty($item)) {
                                        echo "<li>" . htmlspecialchars($item) . "</li>";
                                    }
                                }
                                echo "</ul>";
                            }
                        }

                        echo "</details></section>";
                    }
                } else {
                    echo "<p>No job openings available.</p>";
                }
                ?>
            </div>
            <aside class="right-side">
                <h3>Why Join Us?</h3>
                <p>At our company, we believe in fostering innovation and providing an environment where employees can
                    thrive.</p>

                <h4>💰 Competitive Salaries</h4>
                <p>We ensure that our employees receive industry-leading compensation packages with regular
                    performance-based increments.</p>

                <h4>🕒 Flexible Work Hours</h4>
                <p>We understand work-life balance. Enjoy remote work options and adaptable schedules that suit your
                    lifestyle.</p>

                <h4>🚀 Career Growth</h4>
                <p>Our team members have access to mentorship programs, leadership training, and opportunities to work
                    on
                    exciting, high-impact projects.</p>

                <h4>🏆 Award-Winning Culture</h4>
                <p>We have been recognized for our outstanding company culture and commitment to employee well-being.
                </p>

                <h4>🌱 Learning & Development</h4>
                <p>Gain access to professional courses, certifications, and company-sponsored tech events to advance
                    your
                    skills.</p>
            </aside>
        </main>
    </div>

    <footer id="footer">
        <div class="container">
          <div class="footer-content">
            <div class="social-links">
              <a href="index.html" class="logo">
                <!-- <img src="./img/logo/company-logo-blue.png" alt="company-logo" class="company-logo"> -->
                <h1>
                  The <br />
                  <span>Pawsome</span> Studio
                </h1>
              </a>
  
              <ul class="socials">
                <li>
                  <a href="facebook.com"
                    ><img
                      src="./images/logo/facebook-white.png"
                      alt="Facebook logo"
                  /></a>
                </li>
                <li>
                  <a href="instagram.com"
                    ><img
                      src="./images/logo/instagram-white.png"
                      alt="Instagram logo"
                  /></a>
                </li>
                <li>
                  <a href="linkedin.com"
                    ><img
                      src="./images/logo/linkedin-white.png"
                      alt="Linkedin logo"
                  /></a>
                </li>
                <li>
                  <a href="github.com"
                    ><img src="./images/logo/github-white.png" alt="Github logo"
                  /></a>
                </li>
              </ul>
            </div>
  
            <div>
              <h3 class="footer-header">Links</h3>
              <ul class="footer-links">
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="jobs.html">Careers</a></li>
                <li><a href="enhancements.html">Enhancements</a></li>
                <li><a href="apply.html">Apply</a></li>
                <li><a href="https://www.youtube.com/watch?v=mN3498thVL4">Video Demo</a></li>
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

