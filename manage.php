<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION["user_access"])) {
  header("Location: login.php");
  exit();
}

// Log out automatically after 2 hours
if (isset($_SESSION["last_login_attempt_time"]) && (time() - $_SESSION["last_login_attempt_time"] >= 7200)) {
  header("Location: logout.php");
  exit();
}



require_once('settings.php');
require_once('db_actions.php');
$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
  die("Database connection failed: " . mysqli_connect_error());
}

function sanitize($data)
{
  return htmlspecialchars(trim($data));
}

// Handle POST (delete or update)
$notice_msg = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['delete_job'])) {
    $job_ref = sanitize($_POST['delete_job']);
    $query = "DELETE FROM eoi WHERE job_ref_num = ?";
    // $stmt = mysqli_prepare($conn, $query);
    // mysqli_stmt_bind_param($stmt, "s", $job_ref);
    // mysqli_stmt_execute($stmt);
    update_eoi_status_by_job_ref($conn, $job_ref, "Archived");
    $notice_msg = "Deleted all EOIs for Job Ref: $job_ref";
  }

  if (isset($_POST['update_status_btn'])) {
    $eoi_num = intval($_POST['eoi_num']);
    $new_status = sanitize($_POST['new_status']);
    // $query = "UPDATE eoi SET status = ? WHERE eoi_num = ?";
    // $stmt = mysqli_prepare($conn, $query);
    // mysqli_stmt_bind_param($stmt, "si", $new_status, $eoi_num);
    // mysqli_stmt_execute($stmt);
    update_eoi_status_by_id($conn, $eoi_num, $new_status);
    $notice_msg = "Status updated for EOI #$eoi_num";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Job Application Form - Pawsome Studio">
  <title>Manage EOIs</title>

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
        <a href="index.html" class="logo">
          <img
            src="./images/logo/company-logo-black.png"
            alt="Company logo"
            class="company-logo" />
          <h1>The <span>Pawsome</span> Studio</h1>
        </a>

        <div class="navbar">
          <ul class="menu">
            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="jobs.html">Careers</a></li>
            <li><a href="apply.html">Apply</a></li>
            <li>
              <a href="https://www.youtube.com/watch?v=mN3498thVL4">Video Demo</a>
            </li>
            <li><a href="enhancements.html">Enhancements</a></li>
          </ul>

          <button class="main-btn contact-btn" onclick="window.location.href='logout.php'">
            Log Out
          </button>

        </div>
      </div>
    </div>
  </header>

  <body>
    <!-- HR Manager Header Section -->
    <div class="banner-section">
      <div class="banner-text">
        <h1>HR Manager Queries</h1>
        <p>View, update and manage all Expressions of Interest (EOIs)</p>
      </div>
    </div>

    <div class="manage-container">
      <?php if ($notice_msg): ?>
        <div class="notice"><?= $notice_msg ?></div>
      <?php endif; ?>


      <div class="search-box">
        <h2 class="section-heading">Applicant Search</h2>
        <form method="get" class="styled-search-form">
          <label for="job_ref">Job Reference:</label>
          <input type="text" name="job_ref" id="job_ref">

          <label for="first_name">Applicant First Name:</label>
          <input type="text" name="first_name" id="first_name">

          <label for="last_name">Applicant Last Name:</label>
          <input type="text" name="last_name" id="last_name">

          <div class="center-btn">
            <input type="submit" value="Search">
          </div>
        </form>
      </div>



      <?php
      // Handle search
      $where = "1";
      $params = [];
      $types = "";

      if (!empty($_GET['job_ref'])) {
        $where .= " AND e.job_ref_num = ?";
        $params[] = sanitize($_GET['job_ref']);
        $types .= "s";
      }
      if (!empty($_GET['first_name'])) {
        $where .= " AND a.first_name LIKE ?";
        $params[] = "%" . sanitize($_GET['first_name']) . "%";
        $types .= "s";
      }
      if (!empty($_GET['last_name'])) {
        $where .= " AND a.last_name LIKE ?";
        $params[] = "%" . sanitize($_GET['last_name']) . "%";
        $types .= "s";
      }

      $query = "SELECT e.eoi_num, e.status AS eoi_status, e.job_ref_num,
						 a.first_name, a.last_name, a.email, a.phone, j.title
				  FROM eoi e
				  JOIN applicants a ON e.applicant_id = a.id
				  JOIN jobs j ON e.job_ref_num = j.job_ref_num
				  WHERE $where";

      $stmt = mysqli_prepare($conn, $query);
      if ($types !== "") {
        function refValues($arr)
        {
          if (strnatcmp(phpversion(), '5.3') >= 0) {
            $refs = [];
            foreach ($arr as $key => $value) {
              $refs[$key] = &$arr[$key];
            }
            return $refs;
          }
          return $arr;
        }
        $stmt_bind = array_merge([$stmt, $types], $params);
        call_user_func_array('mysqli_stmt_bind_param', refValues($stmt_bind));
      }

      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      if (mysqli_num_rows($result) > 0) {
        echo "<table class='manage-table'>";
        echo "<tr><th>EOI #</th><th>Name</th><th>Email</th><th>Phone</th><th>Job Ref</th><th>Job Title</th><th>Status</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
          if ($row['eoi_status'] != "Archived") {
            echo "<tr>
              <td>{$row['eoi_num']}</td>
              <td>{$row['first_name']} {$row['last_name']}</td>
              <td>{$row['email']}</td>
              <td>{$row['phone']}</td>
              <td>{$row['job_ref_num']}</td>
              <td>{$row['title']}</td>
              <td>{$row['eoi_status']}</td>
              </tr>";
          }
        }
        echo "</table>";
      } else {
        echo "<div class='notice'>No results found.</div>";
      }
      ?>

      <h2>Delete EOIs by Job Reference</h2>
      <form method="post" class="manage-form">
        Job Reference: <input type="text" name="delete_job" required>
        <input type="submit" value="Delete">
      </form>

      <h2>Update EOI Status</h2>
      <form method="post" class="manage-form">
        EOI Number: <input type="number" name="eoi_num" required>
        New Status:
        <select name="new_status">
          <option value="New">New</option>
          <option value="Current">Current</option>
          <option value="Final">Final</option>
          <option value="Archived">Archived</option>
        </select>
        <input type="submit" name="update_status_btn" value="Update">
      </form>
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
              <li><a href="manage.php">Manage</a></li>
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