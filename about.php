<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Company Introduction - Pawsome Studio">
    <title>Pawsome Studio - About Us</title>

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
                <li><a href="index.php">Home</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="jobs.html">Careers</a></li>
                <li><a href="apply.html">Apply</a></li>
                <li><a href="manage.php">Manage</a></li>
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
  

    <!-- About Section -->
    <section class="about-section">
        <h1>About Us</h1>
        <p>We are a team of passionate developers working on innovative projects.</p>
    </section>

    <!-- Group Info -->
    <section class="group-info">
        <div class="group-card">
            <h2>Group Details</h2>
            <p><strong>Group Name:</strong>The Pawsome Studio</p>
            <p><strong>Tutor’s Name:</strong> Mr. Trung Nguyen</p>
        </div>
    </section>
    
    <!-- Members Contribution -->
    <section class="team-section">
        <div class="about-container">
            <h2>Members Contribution</h2>
            <div class="team-container">
                <div class="team-member">
                    <a href="#member1">
                        <img src="images/phu.jpg" alt="Portrait of Truong Gia Phu">
                        <h2>Truong Gia Phu</h2>
                    </a>
                    <p class="title">Design and optimize the apply.html and about.html section</p>
                </div>
                <div class="team-member">
                    <a href="#member2">
                        <img src="images/trung.jpg" alt="Portrait of Nguyen Duc Trung">
                        <h2>Nguyen Duc Trung</h2>
                    </a>
                    <p class="title">Design and optimize the index.html section</p>
                </div>
                <div class="team-member">
                    <a href="#member3">
                        <img src="images/thai.jpg" alt="Portrait of Nguyen Xuan Thai">
                        <h2>Nguyen Xuan Thai</h2>
                    </a>
                    <p class="title">Design and optimize the jobs.html section</p>
                </div>
            </div>
        </div>
    </section>

    <!-- POPUP MODALS -->
    <div class="popup" id="member1">
        <div class="popup-content">
            <a href="#" class="close-area"></a>
            <h2>Truong Gia Phu</h2>
            <p><b>School:</b> Swinburne University of Technology</p>
            <p><b>Major:</b> Data Science</p>
            <p><b>Strengths:</b> Power BI, Excel, SQL</p>
            <p><b>Hobby:</b> Play sport, listen to music</p>
        </div>
    </div>

    <div class="popup" id="member2">
        <div class="popup-content">
            <a href="#" class="close-area"></a>
            <h2>Nguyen Duc Trung</h2>
            <p><b>School:</b> Swinburne University of Technology</p>
            <p><b>Major:</b> Software Development</p>
            <p><b>Strengths:</b> Python, machine learning</p>
            <p><b>Hobby:</b> Play video games</p>
        </div>
    </div>

    <div class="popup" id="member3">
        <div class="popup-content">
            <a href="#" class="close-area"></a>
            <h2>Nguyen Xuan Thai</h2>
            <p><b>School:</b> Swinburne University of Technology</p>
            <p><b>Major:</b> Cyber Security</p>
            <p><b>Strengths:</b> Network Security, Risk Assessment</p>
            <p><b>Hobby:</b> Running, swimming</p>
        </div>
    </div>


    <!-- Studio Campus -->
    <section class="photo-section">
        <div class="photo-text">
            <h2>Location</h2>
            <p>
                Our team is based at Swinburne University of Technology, a leading institution known for innovation 
                and research excellence. This location provides us with access to cutting-edge resources, 
                a vibrant learning environment, and collaboration opportunities with industry experts. 
                The university's modern campus fosters creativity and teamwork, allowing us to develop 
                groundbreaking projects in software development, cybersecurity, and artificial intelligence.
            </p>
        </div>
        
        <div class="photo-container">
            <figure>
                <img src="images/swb.jpg" alt="Our Team's Location">
            </figure>
        </div>
    </section>
    
    
    

    <!-- Timetable -->
    <section class="timetable-section">
        <div class="about-container">
            <h2>Group Timetable</h2>
            <table>
                <tr>
                    <th>Day</th>
                    <th>Time</th>
                    <th>Activity</th>
                </tr>
                <tr>
                    <td>Monday</td>
                    <td>10:00 AM - 12:00 PM</td>
                    <td>Team Meeting</td>
                </tr>
                <tr>
                    <td>Wednesday</td>
                    <td>2:00 PM - 4:00 PM</td>
                    <td>Development Session</td>
                </tr>
                <tr>
                    <td>Friday</td>
                    <td>3:00 PM - 5:00 PM</td>
                    <td>Project Review</td>
                </tr>
            </table>
        </div>
    </section>


    <!-- Footer -->
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
