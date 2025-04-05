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
  <?php include("./components/header.inc") ?>

  <section class="enhancements">
    <div class="container">
      <div class="section-content">
        <h2 class="section-header">PHP Enhancements For the Website</h2>

        <table>
          <thead>
            <tr>
              <th>#</th>
              <th>PHP Enhancement</th>
              <th>Details</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>1</td>
              <td>User Authentication & Authorization</td>
              <td>
                <p>Users are required to log in to access the admin page.</p>
                <img src="./images/php_example_1.png" alt="Example 1">
                <img src="./images/php_example_2.png" alt="Example 2">
                <p>Passwords are hashed before being stored in the database. The function verify_password will be used to validate user input.</p>
                <img src="./images/php_example_3.png" alt="Example 3">
                <p>When a user tries to log in, their total number of attempts are updated and the current time recorded and then stored in session.</p>
                <img src="./images/php_example_4.png" alt="Example 4">
                <p>If the user has more than 3 failed attempts within 30 minutes they will be locked out of further attempts. This will reset after 30 minutes.</p>
                <img src="./images/php_example_5.png" alt="Example 5">
                <p>Records of number of attempts and time of last attempt will be reset on a successful login or when 30 minutes have passed.</p>
                <img src="./images/php_example_6.png" alt="Example 6">
                <img src="./images/php_example_7.png" alt="Example 7">
                <p>On successful login the database will return some user information including their access level. These will then be stored in session.</p>
                <p>User's access level will be checked whenever they initiate any action on the admin page (such as changing EOI details). Users without appropriate access level will have the action blocked.</p>
                <img src="./images/php_example_8.png" alt="Example 8">
                <p>Users will also be automatically logged out after 2 hours.</p>
                <img src="./images/php_example_9.png" alt="Example 9">
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <?php include("./components/footer.inc") ?>
</body>

</html>