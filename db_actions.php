<?php
function add_user($dbconn, $username, $password, $email, $user_access)
{
    $hashed_password = password_hash($password, PASSWORD_ARGON2I);
    $query = "INSERT INTO users (username, password, email, user_access) VALUES (\"$username\", \"$hashed_password\", \"$email\", \"$user_access\")";
    mysqli_query($dbconn, $query);
}

function authenticate_user($dbconn, $username, $password) {
    // Check if user exists in the db
    $query = "SELECT username, password FROM users WHERE username = \"$username\"";

    try {
        $user = mysqli_query($dbconn, $query)->fetch_all();
    } catch (mysqli_sql_exception $e) {
        throw new Exception("An error has occured.");
    }


    if (count($user) == 0) {
        throw new Exception("User does not exist.");
    }

    $user_password = $user[0][1];

    if (password_verify($password, $user_password)) {
        return true;
    }

    return false;
}
