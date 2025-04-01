<header>
      <div class="container">
        <div class="header-content">
          <a href="index.php" class="logo">
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
              <li><a href="about.php">About Us</a></li>
              <li><a href="jobs.php">Careers</a></li>
              <li><a href="apply.php">Apply</a></li>
              <li><a href="manage.php">Manage</a></li>
              <li>
                <a href="https://www.youtube.com/watch?v=mN3498thVL4"
                  >Video Demo</a
                >
              </li>
              <li><a href="enhancements.php">Enhancements</a></li>
            </ul>

            <?php if (isset($page) && $page === 'manage'): ?>
              <button
                class="main-btn contact-btn"
                type="button"
                aria-label="Log Out"
                onclick="window.location.href='logout.php'"
              >
                Log Out
              </button>
            <?php else: ?>
              <button
                class="main-btn contact-btn"
                type="button"
                aria-label="Contact Us"
                onclick="window.location.href='mailto:105508266@student.swin.edu.au'"
              >
                Contact
              </button>
            <?php endif; ?>

          </div>
        </div>
      </div>
    </header>
