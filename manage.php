<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Redirect user to login page if not logged in
if (!isset($_SESSION["user_access"])) {
  header("Location: login.php");
  exit();
}

// Automatically log users out after 2 hours
if (time() - $_SESSION["last_login_attempt_time"] >= 7200) {
  header("Location: logout.php");
  exit();
}


require_once('settings.php');
require_once('db_actions.php');
require_once('util.php');

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
  if ($_SESSION["user_access"] != "admin") {
    exit_page("err_msg.php", ["Unauthorized Action. Admin Access Required."], "manage.php");
  }

  if (isset($_POST['delete_eoi_num'])) {
    $eoiToDelete = intval($_POST['delete_eoi_num']);
    $stmt = mysqli_prepare($conn, "DELETE FROM eoi WHERE eoi_num = ?");
    mysqli_stmt_bind_param($stmt, "i", $eoiToDelete);
    mysqli_stmt_execute($stmt);
    $notice_msg = "Deleted EOI #$eoiToDelete";
  }

  if (isset($_POST['update_eoi_num']) && isset($_POST['new_status'])) {
    $eoiToUpdate = intval($_POST['update_eoi_num']);
    $newStatus = sanitize($_POST['new_status']);
    $stmt = mysqli_prepare($conn, "UPDATE eoi SET status = ? WHERE eoi_num = ?");
    mysqli_stmt_bind_param($stmt, "si", $newStatus, $eoiToUpdate);
    mysqli_stmt_execute($stmt);
    $notice_msg = "Status updated for EOI #$eoiToUpdate";
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
  <?php include("./components/header.inc") ?>

  <!-- HR Manager Header Section -->
  <div class="banner-section">
    <div class="banner-text">
      <h1>HR Manager Queries</h1>
      <p>View, update and manage all Expressions of Interest (EOIs)</p>
    </div>
  </div>

  <div class="manage-container">
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

    <?php if ($notice_msg): ?>
      <div class="notice"><?= $notice_msg ?></div>
    <?php endif; ?>

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

    echo "<div class=\"table-container\">";
    if (mysqli_num_rows($result) > 0) {
      echo "<table class='manage-table'>";
      echo "<tr><th>EOI #</th><th>Name</th><th>Email</th><th>Phone</th><th>Job Ref</th><th>Job Title</th><th>Status</th><th>Action</th>";
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
          <td>{$row['eoi_num']}</td>
          <td>{$row['first_name']} {$row['last_name']}</td>
          <td>{$row['email']}</td>
          <td>{$row['phone']}</td>
          <td>{$row['job_ref_num']}</td>
          <td>{$row['title']}</td>
          <td>{$row['eoi_status']}</td>
          <td class='table-action'>
            <form method='post' action='manage.php' onsubmit='return confirm(\"Are you sure?\");'>
              <input type='hidden' name='delete_eoi_num' value='{$row['eoi_num']}'>
              <button type='submit' class='main-btn delete-btn'>Delete</button>
            </form>

            <form method='post' action='manage.php'>
              <div class='dropdown'>
                <button class='main-btn toggle-btn'>Change Status</button>
                <div class='dropdown-content'>
                  <div class='dropdown-content-container'>
                    <input type='hidden' name='update_eoi_num' value='{$row['eoi_num']}'>
                    <button type='submit' class='dropdown-btn main-btn' name='new_status' value='New'>New</button>
                    <button type='submit' class='dropdown-btn main-btn' name='new_status' value='Current'>Current</button>
                    <button type='submit' class='dropdown-btn main-btn' name='new_status' value='Final'>Final</button>
                    <button type='submit' class='dropdown-btn main-btn' name='new_status' value='Archived'>Archived</button>     
                  </div>
                </div>
              </div>
            </form>
          </td>
        </tr>";
      }
      echo "</table>";
    } else {
      echo "<div class='notice'>No results found.</div>";
    }
    echo "</div>";
    ?>
  </div>

  <?php include("./components/footer.inc") ?>
</body>

</html>