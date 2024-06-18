<?php
include "../include/connect.php";
// session_start();
if ($_GET['payment_status'] == 'Credit') {
    // No Payment for Active Membership User.
    $data_array = array(
        "order_id" => $_GET['payment_request_id'],
        "payment_id" => $_GET['payment_id'],
        "token" => $_GET['token'],
    );

    $make_call = callAPI1('POST', 'cartPaymentSucess', $data_array, null);
    // print_r($make_call);
    $response = json_decode($make_call, true);

    // Check if $response is valid and contains 'cart_id'
    if ($response && isset($response['cart'])) {
        session_start(); // Ensure session is started
        $_SESSION['cart_id'] = $response['cart'];
        echo "<script>alert('Payment Successfully Received.');
        window.location.href = '../enrolled-courses.php';
        </script>";
        exit; // Ensure script stops execution after redirect
    } else if($response['status']==false) {
        session_start(); // Ensure session is started
        $_SESSION['cart_id'] = $response['cart'];
        echo "<script>alert('Workshop Already Added into your account.');
        window.location.href = '../enrolled-courses.php';
        </script>";
        exit; // Ensure script stops execution after redirect
    }else{
        echo "<script>alert('Something Went Wrong Please Login Again.');
        window.location.href = '../logout.php';
        </script>";
        exit;

    }
}
