<?php
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