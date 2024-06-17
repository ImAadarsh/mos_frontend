<?php
include "../include/connect.php";


if($_GET['status']=='Credit'){
    // No Payment for Active Membership User.
    $data_array =  array(
        "order_id" => $_POST['payment_request_id'],
        "payment_id" => $_POST['payment_id'],
        "token" => rand(11111111111111,99999999999999),
    );
        $make_call = callAPI1('POST', 'cartPaymentSucessWebhook', $data_array,null);
        print_r($make_call);
    
}
?>
