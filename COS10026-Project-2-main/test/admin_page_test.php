<?php
// DB setup for testing purposes
require_once "../settings.php";
require_once "../db_actions.php";
$dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);

// Check if users table exists, add one if not
try {
    mysqli_query($dbconn, "SELECT 1 FROM users LIMIT 1");
} catch (mysqli_sql_exception $e) {
    if (mysqli_errno($dbconn) == "1146") {
        mysqli_query($dbconn, "CREATE TABLE users (user_id INT NOT NULL AUTO_INCREMENT, username VARCHAR(50) NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(100) NOT NULL, user_access ENUM('admin', 'read-only') NOT NULL, PRIMARY KEY (user_id), UNIQUE(email));");
    }
}

// Add users
add_user($dbconn, "johndoe123", "john123", "john_doe123@hotmail.com", "admin");
add_user($dbconn, "jane456", "jane456", "mary_jane456@hotmail.com", "read-only");
?>