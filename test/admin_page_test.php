<?php
// DB setup for testing purposes
require_once "../settings.php";

$dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);
add_user($dbconn, "johndoe123", "john123", "john_doe123@hotmail.com", "admin");
add_user($dbconn, "jane456", "jane456", "mary_jane456@hotmail.com", "read-only");