<?php
include "../include/connect.php";

// Print the entire $_POST array for debugging
// print_r($_POST);

// Check if the necessary POST data is set and 'status' is 'Credit'
if (isset($_POST['status']) && $_POST['status'] == 'Credit' &&
    isset($_POST['payment_request_id']) && isset($_POST['payment_id'])) {

    // Create data array
    $data_array = array(
        "order_id" => $_POST['payment_request_id'],
        "payment_id" => $_POST['payment_id'],
        "token" => rand(11111111111111, 99999999999999),
    );
    
    // Make the API call
    $make_call = callAPI1('POST', 'cartPaymentSucessWebhook', $data_array, null);
    
    
    // Decode the API call response
    $response = json_decode($make_call, true);

    // Check if response contains 'cart_id'
    if ($response && isset($response['cart_id'])) {
        session_start(); // Ensure session is started
        $_SESSION['cart_id'] = $response['cart_id'];
        echo "Payment Successfully Received";
        exit; // Ensure script stops execution after redirect
    } else {
        echo "Failed to update session. Please try again later.";
        exit; // Ensure script stops execution after redirect
    }
} else {
    echo "Required parameters are missing or payment status is not 'Credit'.";
}
