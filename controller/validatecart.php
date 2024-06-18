<?php
include "../include/connect.php";
session_start();
if($_GET['payment_status']=='Credit'){
    // No Payment for Active Membership User.
    $data_array =  array(
        "order_id" => $_GET['payment_request_id'],
        "payment_id" => $_GET['payment_id'],
        "token" => $_GET['token'],
    );
        $make_call = callAPI1('POST', 'cartPaymentSucess', $data_array,null);
        // print_r($make_call);
        $response = json_decode($make_call, true);
        if($response){
            $_SESSION['cart_id'] = $response['cart_id'];
            echo "<script>alert('Payment Sucessfully Recieved.')
            window.location.href='../enrolled-courses.php';
            </script>";
        }
        

}



?>