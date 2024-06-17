<?php
session_start();
include '../include/connect.php';

// Ensure the callAPI function is included from your included file
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $token = $_POST['token'];

    $data_array = array(
        "email" => $email,
        "remember_token" => $token
    );

    $make_call = callAPI('POST', 'emailverification', json_encode($data_array), NULL);
    $response = json_decode($make_call, true);
    if ($response['status'] == "true") {
        $_SESSION['is_email'] = 1;
    }
    // Return the response to the AJAX call
    return json_encode($response);
}
