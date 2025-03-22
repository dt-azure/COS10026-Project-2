<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Error page">
    <title>Application Submitted</title>


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
                        class="company-logo" />
                    <h1>The <span>Pawsome</span> Studio</h1>
                </a>

                <div class="navbar">
                    <ul class="menu">
                        <li><a href="index.html" class="horizontal-wipe">Home</a></li>
                        <li><a href="about.html" class="horizontal-wipe">About Us</a></li>
                        <li><a href="jobs.html" class="horizontal-wipe">Careers</a></li>
                        <li><a href="apply.html" class="horizontal-wipe">Apply</a></li>
                        <li>
                            <a href="https://www.youtube.com/watch?v=mN3498thVL4" class="horizontal-wipe">Video Demo</a>
                        </li>
                        <li><a href="enhancements.html" class="horizontal-wipe">Enhancements</a></li>
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

    <section class="success-page">
        <div class="container">
            <?php
            ob_start();
            session_start();

            // Prevent user from accessing this page directly without an error occurring
            if (is_null($_SESSION["exit_msg"])) {
                header("Location: index.php");
                exit();
            }


            foreach ($_SESSION["exit_msg"] as $msg) {
                echo $msg;
            }
            
            echo "<p>Click <a href=\"" . $_SESSION["origin"] . "\" class=\"link-style horizontal-wipe\">here</a> to go back to the Home page.</p>";
            ?>
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

<?php
session_unset();
ob_end_flush();
?>