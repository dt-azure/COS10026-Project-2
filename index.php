<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Home Page for The Pawsome Studio" />
    <meta
      name="keywords"
      content="Tech, Software, Developers, Startup, Career"
    />
    <meta name="author" content="Group: Pawsome" />
    <title>The Pawsome Studio - Home Page</title>

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
      rel="stylesheet"
    />

    <!-- CSS -->
    <link rel="stylesheet" href="./style/style.css" />

    <!-- FontAwesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
      integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>

  <body>
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

    <section class="banner">
      <!-- Stock photo. Source: https://www.pexels.com/photo/office-team-having-a-meeting-at-the-table-7654396/ -->
      <div class="banner-text">
        <p>Unlock Full Potential</p>
        <h2>Let's Grow <span>Your</span> Business Together</h2>
        <p>
          We empower businesses with the most cutting edge technology. Transform
          your vision into reality with our
          <span>SmartPlatform<sup>TM</sup></span> and more.
        </p>
        <div>
          <button class="main-btn" aria-label="Learn More">Learn More</button>
          <button class="main-btn get-started" aria-label="Get Started">
            Get Started
          </button>
        </div>
      </div>
    </section>

    <section class="intro">
      <div class="container">
        <div class="section-content">
          <h2 class="section-header">
            We Bring <span>Cutting Edge</span> Technology <br />
            To Your Business
          </h2>

          <div class="intro-card-field">
            <div class="intro-card">
              <div class="intro-logo">
                <i class="fa-solid fa-clipboard-check"></i>
              </div>
              <h3>Client Values</h3>
              <div class="intro-details">
                <p>
                  <span>We are driven by your success.</span> <br />
                  Our team of experienced engineers and consultants are
                  passionate about solving your business problems and help your
                  business stay at the forefront of the industry.
                </p>
              </div>
            </div>

            <div class="intro-card">
              <div class="intro-logo">
                <i class="fa-solid fa-arrows-to-circle"></i>
              </div>
              <h3>One-Stop Solution</h3>
              <div class="intro-details">
                <p>
                  <span>We are all you need.</span>
                  <br />
                  We handle everything from frontend to backend, cloud services,
                  customer support... with the highest quality of deliverables.
                </p>
              </div>
            </div>

            <div class="intro-card">
              <div class="intro-logo">
                <i class="fa-solid fa-chart-line"></i>
              </div>
              <h3>Scalable Growth</h3>
              <div class="intro-details">
                <p>
                  <span>We build with the future in mind.</span>
                  <br />
                  Our solutions are scalable and highly adaptable to your future
                  growth.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="products">
      <div class="container">
        <div class="section-content">
          <h2 class="section-header">Our Software <span>Solutions</span></h2>

          <div class="product-field">
            <div class="product-card product-1">
              <!-- Stock photo - Source: https://www.pexels.com/photo/close-up-photo-of-programming-of-codes-546819/ -->
              <h3>
                Industry-leading <br />
                Applications
              </h3>

              <p class="product-details">
                Cutting-edge software solutions designed for maximum
                performance, efficiency, and user experience
              </p>
            </div>

            <div class="product-card product-2">
              <!-- Stock photo - Source: https://www.pexels.com/photo/patch-cables-plugged-in-patch-panel-4682189/ -->
              <h3>
                Robust Data <br />
                Management
              </h3>

              <p class="product-details">
                Secure, scalable, and intuitive tools to organize, analyze, and
                protect your data.
              </p>
            </div>

            <div class="product-card product-3">
              <!-- Stock photo - Source: https://unsplash.com/photos/laptop-computer-on-glass-top-table-hpjSkU2UYSU -->
              <h3>
                Smart
                <br />
                Assistants
              </h3>

              <p class="product-details">
                Intelligent AI-driven assistants that enhance productivity,
                automate tasks, and provide real-time insights.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="partners">
      <div class="container">
        <div class="section-content">
          <h2 class="section-header">Our <span>Partners</span></h2>

          <div class="partner-field">
            <img
              src="./images/logo/unilever-logo.png"
              alt="Unilever logo"
              class="company-logo"
            />
            <img
              src="./images/logo/nestle-logo.png"
              alt="Nestle logo"
              class="company-logo"
            />
            <img
              src="./images/logo/groupm-logo.png"
              alt="GroupM logo"
              class="company-logo"
            />
            <img
              src="./images/logo/dentsu-logo.png"
              alt="Dentsu logo"
              class="company-logo"
            />
            <img
              src="./images/logo/hsbc-logo.png"
              alt="HSBC logo"
              class="company-logo"
            />
          </div>
        </div>
      </div>
    </section>

    <section class="testimony">
      <div class="container">
        <div class="section-content">
          <h2 class="section-header">What People Say About <span>Us</span></h2>

          <div class="testimony-content">
            <!-- Background: Stock photo - Source: https://www.pexels.com/photo/people-discuss-about-graphs-and-rates-3184292/ -->
            <div class="profile">
              <!-- Stock photo - Source: https://www.pexels.com/photo/woman-wearing-white-shirt-1181690/ -->
              <div class="profile-photo">
                <!-- <img src="./img/partner_profile_1.jpg" alt="partner-profile-picture"> -->
              </div>

              <div class="testimony-text">
                <div>
                  <i class="fa-solid fa-quote-left"></i>
                  <p>
                    Our experience with Pawsome has been exceptional. Their
                    industry-leading applications, advanced AI-driven
                    assistants, and robust data management capabilities have
                    significantly enhanced our efficiency and workflow.
                  </p>
                  <p class="alt-testimony">
                    Our experience with Pawsome has been exceptional. They have
                    significantly enhanced our efficiency and workflow.
                  </p>
                  <i class="fa-solid fa-quote-right"></i>
                </div>
                <p>Jane Doe</p>
                <p>Marketing Director</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="contact">
      <div class="container">
        <div class="section-content">
          <div class="cta-text">
            <p>Industry-leading <span>Solutions</span></p>
            <p>Enhance your Business</p>
          </div>
          <div>
            <p>
              <i class="fa-solid fa-phone-volume"></i>
              +1 (234) 567 89
            </p>
            <button class="main-btn" aria-label="Call Us">Call Us Now</button>
          </div>
        </div>
      </div>
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
              <li>
                <a href="https://www.youtube.com/watch?v=mN3498thVL4"
                  >Video Demo</a
                >
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
