<?php
session_start();
require_once "db_actions.php";
require_once "settings.php";

// Redirect if user already logged in
if (isset($_SESSION["user_access"])) {
	header("Location: manage.php");
	exit();
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
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="style/style.css">
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
	// Record current time if it's the first failed attempt
	// Reset records if there is a previous attempt more than 30 minutes ago
	if (!isset($_SESSION["login_attempts"]) || (time() - $_SESSION["last_login_attempt_time"] > 1800)) {
		$_SESSION["last_login_attempt_time"] = time();
		$_SESSION["login_attempts"] = 1;
	} else {
		$_SESSION["login_attempts"] += 1;
	}
}
?>