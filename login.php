<?php
session_start();
require_once "db_actions.php";
require_once "settings.php";

// Redirect if user already logged in
if (isset($_SESSION["user_access"])) {
	header("Location: manage.php");
	exit();
}

// Reset lockdown after 30 minutes
if (isset($_SESSION["login_attempts"], $_SESSION["last_login_attempt_time"]) && (time() - $_SESSION["last_login_attempt_time"] >= 1800)) {
	$_SESSION["login_attempts"] = 0;
}

$login_error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$username = isset($_POST['username']) ? trim($_POST['username']) : '';
	$password = isset($_POST['password']) ? trim($_POST['password']) : '';


	try {
		// Block user for 30 mins after 3 failed attempts and the last attempt was less than 30 minutes ago
		if (isset($_SESSION["login_attempts"], $_SESSION["last_login_attempt_time"]) && $_SESSION["login_attempts"] > 3 && (time() - $_SESSION["last_login_attempt_time"] < 1800)) {
			throw new Exception("Too many failed attempts. Please try again later.");
		}

		$dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);
		$logged_in_user = login($dbconn, $username, $password);
		if (!is_null($logged_in_user)) {
			$_SESSION["user_access"] = $logged_in_user["user_access"];
			// Reset on successful attempt
			$_SESSION["login_attempts"] = 0;
			$_SESSION["last_login_attempt_time"] = time();
			header("Location: manage.php");
			exit();
		} else {
			process_login_attempt();

			if ($_SESSION["login_attempts"] == 3) {
				$login_error = "Too many failed attempts. Please try again later.";
			} else {
				$login_error = "Invalid username or password.";
			}
		}
	} catch (Exception $e) {
		process_login_attempt();
		$login_error = $e->getMessage();
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Login - Pawsome Studio">
	<title>Login</title>

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
		rel="stylesheet">

	<!-- CSS -->
	<link rel="stylesheet" href="./style/style.css" />

	<!-- FontAwesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
		integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />

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
				<?php
				if (!isset($_SESSION["login_attempts"]) || $_SESSION["login_attempts"] < 3) {
					echo "<button type=\"submit\">Login</button>";
				}
				?>
				<a href="index.php" class="back-home">← Back to Home</a>
			</form>
		</div>
	</div>

</body>

</html>

<?php
function process_login_attempt()
{

	if (!isset($_SESSION["login_attempts"])) {
		$_SESSION["login_attempts"] = 1;
	} else {
		$_SESSION["login_attempts"] += 1;
	}

	$_SESSION["last_login_attempt_time"] = time();
}
?>