<?php
session_start();
require_once "settings.php";
require_once "util.php";

// Prevent direct access to this file
if ($_POST["job_ref"] == NULL) {
    header("Location: apply.html");
}

$dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);

if ($dbconn) {
    // preg_replace('/[^A-Za-z0-9]/', '', trim($text)) - sanitize input
    // Email input also includes @ and .
    $job_ref_num = preg_replace('/[^A-Za-z0-9]/', '', trim($_POST["job_ref"]));
    $first_name = preg_replace('/[^A-Za-z0-9]/', '', trim($_POST["first_name"]));
    $last_name = preg_replace('/[^A-Za-z0-9]/', '', trim($_POST["last_name"]));
    $dob = preg_replace('/[^A-Za-z0-9]/', '', trim($_POST["dob"]));
    $gender = preg_replace('/[^A-Za-z0-9]/', '', trim($_POST["gender"]));
    $street = preg_replace('/[^A-Za-z0-9]/', '', trim($_POST["street_address"]));
    $town = preg_replace('/[^A-Za-z0-9]/', '', trim($_POST["suburb_town"]));
    $state = preg_replace('/[^A-Za-z0-9]/', '', trim($_POST["state"]));
    $postcode = preg_replace('/[^A-Za-z0-9]/', '', trim($_POST["postcode"]));
    $email = preg_replace('/[^A-Za-z0-9]/', '', trim($_POST["email"]));
    $phone = preg_replace('/[^A-Za-z0-9]/', '', trim($_POST["phone"]));
    // Convert array to JSON
    $skills = isset($_POST["skills"]) ? json_encode(sanitize_json_array($_POST["skills"])) : json_encode([]);
    $other_skills = preg_replace('/[^A-Za-z0-9]/', '', trim($_POST["other_skills"]));

    // Dummy query to check if table exists
    // Try - catch block to catch the error
    // 1146 is the error code for missing table
    try {
        mysqli_query($dbconn, "SELECT 1 FROM eoi LIMIT 1");
    } catch (mysqli_sql_exception) {
        if (mysqli_errno($dbconn) == "1146") {
            mysqli_query($dbconn, "CREATE TABLE eoi (eoi_number INT(11) NOT NULL AUTO_INCREMENT, job_ref_num VARCHAR(10) DEFAULT NULL, 
        first_name VARCHAR(50) DEFAULT NULL, last_name VARCHAR(50) DEFAULT NULL, street VARCHAR(100) DEFAULT NULL, town VARCHAR(50) DEFAULT NULL, 
        state VARCHAR(50) DEFAULT NULL, postcode VARCHAR(10) DEFAULT NULL, email VARCHAR(100) DEFAULT NULL, phone VARCHAR(20) DEFAULT NULL, skills LONGTEXT COLLATE utf8mb4_bin DEFAULT NULL, 
        other_skills TEXT DEFAULT NULL, status ENUM('New', 'Current', 'Final', '') NOT NULL DEFAULT \"New\", PRIMARY KEY (eoi_number));");
        }

        echo "<p>Table created.</p>";
    }


    $query = "INSERT INTO eoi (job_ref_num, first_name, last_name, street, town, state, postcode, email, phone, skills, other_skills) VALUES (\"$job_ref_num\", \"$first_name\", \"$last_name\", \"$street\", \"$town\", \"$state\", \"$postcode\", \"$email\", \"$phone\", '$skills', \"$other_skills\")";
    // echo "<p>$query</p>";
    $result = mysqli_query($dbconn, $query);

    if (!$result) {
        echo "<p>An error has occurred. Please try again.</p>";
    } else {
        echo "<p>Data added successfully.</p>";
    }

    mysqli_close($dbconn);
} else {
    echo "<p>Unable to connect to the database. Please try again.</p>";
}
