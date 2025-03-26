<?php
require_once "../settings.php";
require_once "../db_actions.php";
$dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);

$username = "johndoe123";
$password = "john123";

if (authenticate_user($dbconn, $username, $password)) {
    echo "<p>Correct</p>";
} else {
    echo "<p>Wrong</p>";
}
