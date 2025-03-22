<?php
session_start();

$login_error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
	$password = isset($_POST['password']) ? trim($_POST['password']) : '';


    if ($username === "admin" && $password === "adminpass") {
        $_SESSION['is_admin'] = true;
        header("Location: manage.php");
        exit();
    } else {
        $login_error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Login</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
  
</head>
<body>

	<div class="login-container">
	  <!-- Left 60% -->
	  <div class="left-panel">
		<img src="images/logo/company-logo-black.png" alt="Pawsome Logo" />
		<h2>Welcome to Pawsome Studio</h2>
		<p>Your HR management platform for managing Expressions of Interest (EOIs)</p>
	  </div>

	  <!-- Right 40% -->
	  <div class="right-panel">
		<form class="login-form" method="post" action="login.php">

		  <h2>Admin Login</h2>

		  <?php if ($login_error): ?>
			<div class="error-message"><?= $login_error ?></div>
		  <?php endif; ?>

		  <input type="text" name="username" placeholder="Username" required />
		  <input type="password" name="password" placeholder="Password" required />
		  <button type="submit">Login</button>
		  <a href="index.php" class="back-home">← Back to Home</a>
		</form>
	  </div>
	</div>

</body>
</html>
