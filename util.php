<?php

const REGEX_JOB_REF_NUM = "/^[A-Za-z0-9]{5}$/";
const REGEX_NAME = "/^[A-Za-z]{1,20}$/";
// Basic regex, will not catch invalid dates like 30 Feb
const REGEX_DOB = "/^(0[1-9]|[1-2][0-9]|3[0-1])\/(0[1-9]|1[0-2])\/(\d{4})$/";
// $regex_gender = ``;
const REGEX_STREET = "/^.{1,40}$/";
// $regex_town = ``;
const VALID_STATES = ['VIC', 'NSW', 'QLD', 'NT', 'WA', 'SA', 'TAS', 'ACT'];
const REGEX_POSTCODE = "/^[0-9]{4}$/";
// PHP has built-in filter to sanitize emails: filter_var($str, FILTER_SANITIZE_EMAIL)
// But we'll use regex to keep it consistent with other inputs
// Max length is 100 cause it's defined that way in the db
const REGEX_EMAIL = "/^(?=.{1,100}$)([\w]+)@([\w.]+\.[\w.]+)$/";
const REGEX_PHONE = "/^[0-9 ]{8,12}$/";
// $regex_other_skills = ``;

function sanitize_json_array($arr)
{
    $sanitized_arr = [];
    foreach ($arr as $i) {
        $i = preg_replace('/[^A-Za-z0-9]/', '', trim($i));
        $sanitized_arr[] = $i;
    }

    return $sanitized_arr;
}

function validate_input($job_ref_num, $first_name, $last_name, $dob, $street, $town, $state, $postcode, $email, $phone)
{
    $err_msg = [];

    if (!preg_match(REGEX_JOB_REF_NUM, $job_ref_num)) {
        $err_msg[] = "<p class=\"err-msg\">Invalid Job Reference Number.</p>";
    }

    if (!preg_match(REGEX_NAME, $first_name)) {
        $err_msg[] = "<p class=\"err-msg\">Invalid First Name.</p>";
    }

    if (!preg_match(REGEX_NAME, $last_name)) {
        $err_msg[] = "<p class=\"err-msg\">Invalid Last Name.</p>";
    }

    $dob_ts = strtotime($dob);
    if (!preg_match(REGEX_DOB, $dob)) {
        $err_msg[] = "<p class=\"err-msg\">Invalid Date of Birth format. $dob</p>";
    }


    $age = (int)((time() - $dob_ts) / (365.25 * 24 * 60 * 60));
    if ($age < 15 || $age > 80) {
        $err_msg[] = "<p class=\"err-msg\">Invalid Date of Birth: must be 15–80 years old. </p>";
    }


    if (!preg_match(REGEX_STREET, $street)) {
        $err_msg[] = "<p class=\"err-msg\">Invalid Street Address.</p>";
    }

    if (!preg_match(REGEX_STREET, $town)) {
        $err_msg[] = "<p class=\"err-msg\">Invalid Suburb/Town Address.</p>";
    }

    // User cannot change this input but it's applied validation just in case
    global $VALID_STATES;
    if (!in_array($state, $VALID_STATES)) {
        $err_msg[] = "<p class=\"err-msg\">Invalid State.</p>";
    }


    if (!preg_match(REGEX_POSTCODE, $postcode)) {
        $err_msg[] = "<p class=\"err-msg\">Invalid Postcode.</p>";
    } else {
        $postcode_int = intval($postcode);

        // Postcode ranges taken from wikipedia
        // Using switch statement for cleaner code
        switch ($state) {
            case "NSW":
                $postcode_ranges = [[1000, 1999], [2000, 2599], [2619, 2899], [2921, 2999]];
                break;
            case "ACT":
                $postcode_ranges = [[200, 299], [2600, 2618], [2900, 2920]];
                break;
            case "VIC":
                $postcode_ranges = [[3000, 3996], [8000, 8999]];
                break;
            case "QLD":
                $postcode_ranges = [[4000, 4999], [9000, 9999]];
                break;
            case "SA":
                $postcode_ranges = [[5000, 5799], [5800, 5999]];
                break;
            case "WA":
                $postcode_ranges = [[6000, 6797], [6800, 6999]];
                break;
            case "TAS":
                $postcode_ranges = [[7000, 7799], [7800, 7999]];
                break;
            case "NT":
                $postcode_ranges = [[800, 899], [900, 999]];
                break;
        }

        $postcode_valid = false;
        foreach ($postcode_ranges as $range) {
            $min = $range[0];
            $max = $range[1];

            if ($postcode_int >= $min && $postcode_int <= $max) {
                $postcode_valid = true;
                break;
            }
        }

        if (!$postcode_valid) {
            $err_msg[] = "<p class=\"err-msg\">Invalid Postcode.</p>";
        }
    }

    if (!preg_match(REGEX_EMAIL, $email)) {
        $err_msg[] = "<p class=\"err-msg\">Invalid Email.</p>";
    }

    if (!preg_match(REGEX_PHONE, $phone)) {
        $err_msg[] = "<p class=\"err-msg\">Invalid Phone Number.</p>";
    }

    // As the form does not require applicant to specify if they would want to add other skills validation will be skipped

    return $err_msg;
}

function exit_page($dest, $msg, $origin, $dbconn = null)
// Session must be started before calling this function
// $msg must be an array
{
    if ($dbconn) {
        mysqli_close($dbconn);
    }

    $_SESSION["exit_msg"] = $msg;
    $_SESSION["origin"] = $origin;
    header("Location: $dest");
    exit();
}

function format_date($date)
{
    //If 01-Mar-05 or 01-Mar-2005
    if (preg_match('/^\d{1,2}-[A-Za-z]{3}-\d{2,4}$/', $date)) {
        $ts = strtotime($date);
        return date('d/m/Y', $ts);
    }

    // yyyy-mm-dd
    if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
        $parts = explode('-', $date);
        return $parts[2] . '/' . $parts[1] . '/' . $parts[0];
    }


    return $date;
}

function reset_session_with_exception()
{
    $keys_to_keep = ["user_access", "last_login_attempt_time"];
    $_SESSION = array_intersect_key($_SESSION, array_flip($keys_to_keep));
}
