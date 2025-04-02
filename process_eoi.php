<?php
session_start();
require_once "settings.php";
require_once "db_actions.php";

// Prevent direct access to this file
if ($_POST["job_ref"] == NULL) {
    header("Location: apply.php");
}

$dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);

if ($dbconn) {
    // preg_replace('/[^A-Za-z0-9]/', '', trim($text)) - sanitize input
    // Email input also includes @ and .
    $job_ref_num = preg_replace('/[^A-Za-z0-9]/', '', trim($_POST["job_ref"]));
    $first_name = preg_replace('/[^A-Za-z0-9]/', '', trim($_POST["first_name"]));
    $last_name = preg_replace('/[^A-Za-z0-9]/', '', trim($_POST["last_name"]));
    $dob = format_date($_POST["dob"]);
    $gender = preg_replace('/[^A-Za-z0-9 ]/', '', trim($_POST["gender"]));
    $street = preg_replace('/[^A-Za-z0-9]/', '', trim($_POST["street_address"]));
    $town = preg_replace('/[^A-Za-z0-9]/', '', trim($_POST["suburb_town"]));
    $state = strtoupper(trim($_POST["state"]));
	echo "<p>Submitted state: '$state'</p>";

    $postcode = preg_replace('/[^A-Za-z0-9]/', '', trim($_POST["postcode"]));
    $interview_date = format_date($_POST["interview-date"]);
    $interview_time = preg_replace('/[^A-Za-z0-9: ]/', '', trim($_POST["interview-time"]));
    $email = preg_replace('/[^A-Za-z0-9@._-]/', '', trim($_POST["email"]));
    $phone = preg_replace('/[^A-Za-z0-9 ]/', '', trim($_POST["phone"]));
    // Convert array to JSON
    $skills = isset($_POST["skills"]) ? json_encode(sanitize_json_array($_POST["skills"])) : json_encode([]);
    $other_skills = preg_replace('/[^A-Za-z0-9]/', '', trim($_POST["other_skills"]));

  
    // Validate input
    $err_msg = validate_input($job_ref_num, $first_name, $last_name, $dob, $street, $town, $state, $postcode, $email, $phone);

    if (count($err_msg) > 0) {
        $_SESSION["exit_msg"] = $err_msg;
        $_SESSION["origin"] = "apply.php";
        header("Location: err_msg.php");
        // exit() to stop the rest of the script running
        mysqli_close($dbconn);
        exit();
    }

    // Check db
    check_db($dbconn);

    // Check if email already registered
    // If not add applicant to db first before eoi
    $applicant = mysqli_query($dbconn, "SELECT * FROM applicants WHERE email = \"$email\" LIMIT 1");


    if (count($applicant->fetch_all()) == 0) {
        // Insert new applicant
        try {
            $query = "INSERT INTO applicants (first_name, last_name, dob, gender, street, town, state, postcode, email, phone, skills, other_skills) VALUES (\"$first_name\", \"$last_name\", \"$dob\", \"$gender\", \"$street\", \"$town\", \"$state\", \"$postcode\", \"$email\", \"$phone\", '$skills', \"$other_skills\")";
            mysqli_query($dbconn, $query);
        } catch (mysqli_sql_exception $e) {
            exit_page(["<p>An error has occurred. Please try again.</p>"], "apply.php", $dbconn);
        }
    }

    // Insert eoi
	
    // Get applicant ID via email
    $query = "SELECT id FROM applicants WHERE email = \"$email\"";
    
    // mysqli_query($dbconn, $query)->fetch_all() returns an array of rows, each row is an array
    $applicant_id = mysqli_query($dbconn, $query)->fetch_all()[0][0];

    try {
        $query = "INSERT INTO eoi (job_ref_num, applicant_id, interview_date, interview_time) VALUES (\"$job_ref_num\", \"$applicant_id\", \"$interview_date\", \"$interview_time\");";
        
		mysqli_query($dbconn, $query);      
    } catch (mysqli_sql_exception $e) {
        exit_page("err_msg.php", ["<p>An error has occurred. Please try again.</p>"], "apply.php", $dbconn);
    }

    exit_page("success_msg.php", ["<p>Your application has been recorded. Please wait to hear from us.</p>"], "index.php");
} else {
    exit_page("err_msg.php", ["<p>Unable to connect to the database. Please try again.</p>"], "apply.php");
}
