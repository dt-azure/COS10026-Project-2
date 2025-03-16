<?php
$regex_job_ref_num = `/^[A-Za-z0-9]{5}$/`;
$regex_name = `/^[A-Za-z]{1,20}/`;
$regex_dob = ``;
$regex_gender = ``;
$regex_street = ``;
$regex_town = ``;
$regex_state = ``;
$regex_postcode = ``;
// PHP has built-in filter to sanitize emails: filter_var($str, FILTER_SANITIZE_EMAIL)
// But we'll use regex to keep it consistent with other inputs
$regex_email = ``;
$regex_phone = ``;
$regex_other_skills = ``;

function sanitize_json_array($arr) {
    $sanitized_arr = [];
    foreach ($arr as $i) {
        $i = preg_replace('/[^A-Za-z0-9]/', '', trim($i));
        $sanitized_arr[] = $i;
    }

    return $sanitized_arr;
}

