<?php
function check_db($dbconn)
{
    // This function will check if necessary tables exist
    // Create them if not

    // applicants table
    // Dummy query to check if table exists
    // Try - catch block to catch the error
    // 1146 is the error code for missing table,
    try {
        mysqli_query($dbconn, "SELECT 1 FROM applicants LIMIT 1");
    } catch (mysqli_sql_exception $e) {
        if (mysqli_errno($dbconn) == "1146") {
            mysqli_query($dbconn, "CREATE TABLE applicants (id INT NOT NULL AUTO_INCREMENT, first_name VARCHAR(50) NOT NULL, last_name VARCHAR(50) NOT NULL, dob VARCHAR(10) NOT NULL, gender VARCHAR(20) NOT NULL, street VARCHAR(100) NOT NULL, town VARCHAR(50), 
        state VARCHAR(5) NOT NULL, postcode VARCHAR(10) NOT NULL, email VARCHAR(100) NOT NULL, phone VARCHAR(15) NOT NULL, skills LONGTEXT COLLATE utf8mb4_bin NOT NULL, 
        other_skills TEXT DEFAULT NULL, status ENUM('Pending', 'Withdrawn', 'Approved', 'Archived') NOT NULL DEFAULT 'Pending', PRIMARY KEY (id), UNIQUE(email));");
        }
    }

    // eoi table
    try {
        mysqli_query($dbconn, "SELECT 1 FROM eoi LIMIT 1");
    } catch (mysqli_sql_exception $e) {
        if (mysqli_errno($dbconn) == "1146") {
            mysqli_query($dbconn, "CREATE TABLE eoi (eoi_num INT NOT NULL AUTO_INCREMENT, job_ref_num VARCHAR(10) NOT NULL, applicant_id INT NOT NULL, interview_date VARCHAR(10) NOT NULL, interview_time VARCHAR(20) NOT NULL, status ENUM('New', 'Current', 'Final', 'Archived') NOT NULL DEFAULT 'New', PRIMARY KEY (eoi_num));");
        }
    }

    // jobs table
    try {
        mysqli_query($dbconn, "SELECT 1 FROM jobs LIMIT 1");
    } catch (mysqli_sql_exception $e) {
        if (mysqli_errno($dbconn) == "1146") {
            mysqli_query($dbconn, "CREATE TABLE jobs (job_ref_num VARCHAR(10) NOT NULL, title VARCHAR(100) NOT NULL, report_to VARCHAR(20) DEFAULT NULL, salary VARCHAR(50) DEFAULT NULL, brief_description TEXT, description TEXT NOT NULL, qualifications LONGTEXT COLLATE utf8mb4_bin NOT NULL, status ENUM('Ongoing', 'Archived') NOT NULL DEFAULT 'Ongoing', PRIMARY KEY(job_ref_num));");
        }
    }

    // Create foreign keys
    mysqli_query($dbconn, "ALTER TABLE eoi ADD FOREIGN KEY (applicant_id) REFERENCES applicants (id);");
    
    mysqli_query($dbconn, "ALTER TABLE eoi ADD FOREIGN KEY (job_ref_num) REFERENCES jobs (job_ref_num);");

    return;
}

function add_user($dbconn, $username, $password, $email, $user_access)
{
    $hashed_password = password_hash($password, PASSWORD_ARGON2I);
    $query = "INSERT INTO users (username, password, email, user_access) VALUES (\"$username\", \"$hashed_password\", \"$email\", \"$user_access\")";
    mysqli_query($dbconn, $query);
}

function authenticate_user($dbconn, $username, $password)
{
    // Check if user exists in the db
    $query = "SELECT * FROM users WHERE username = \"$username\"";

    try {
        $user = mysqli_query($dbconn, $query)->fetch_assoc();
    } catch (mysqli_sql_exception $e) {
        throw new Exception("An error has occured.");
    }


    if (!$user) {
        throw new Exception("User does not exist.");
    }

    if (password_verify($password, $user["password"])) {
        return ["username"=>$user["username"], "user_access"=>$user["user_access"]];
    }

    return null;
}

function login($dbconn, $username, $password)
{
    $user_exists = authenticate_user($dbconn, $username, $password);

    if (!is_null($user_exists)) {
        return $user_exists;
    } else {
        return null;
    }
}

function update_eoi_status_by_job_ref($dbconn, $job_ref_num, $status) {
    $query = "UPDATE eoi SET status = ? WHERE job_ref_num = ?";
    $stmt = mysqli_prepare($dbconn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $status, $job_ref_num);
    mysqli_stmt_execute($stmt);
}

function update_eoi_status_by_id($dbconn, $eoi_num, $status) {
    $query = "UPDATE eoi SET status = ? WHERE eoi_num = ?";
    $stmt = mysqli_prepare($dbconn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $status, $eoi_num);
    mysqli_stmt_execute($stmt);
}