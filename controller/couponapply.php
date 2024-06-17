<?php
session_start();
include "../include/connect.php";
if(isset($_POST['coupon_code'])&&isset($_SESSION['cart_id'])){
    // No Payment for Active Membership User.
    $data_array =  array(
        "token" => $_SESSION['token'],
        "cart_id" => $_SESSION['cart_id'],
        "coupon_code" => $_POST['coupon_code'],
    );
        $make_call = callAPI1('POST', 'addItemCartCoupon', $data_array,null);
        $response = json_decode($make_call, true);
        if($response['status'] == true) {
            echo "<script>alert('".$response['message']."');
            window.history.back();
            </script>";
        }else{
            echo "<script>alert('".$response['message']."');
            window.history.back();
            </script>";
        }
}else{
    echo "<script>alert('Please Login');
            window.history.back();
            </script>";
}

